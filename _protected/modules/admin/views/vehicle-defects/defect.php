<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleDefectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle Defects';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="/themes/sardor_css/ToggleSwitch.css">
<section style="margin-top: 50px">
    <div class="card">


        <div class="row">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-3">
                <?= $form->field($model, 'pono')->textinput()->label('P/O raqamini kiriting'); ?>
            </div>
            <div style="display: flex" class="col-md-3">
                <button style="margin-top: 24px" class='myButton btn btn-primary'>So'rovni yuborish</button>
                <a href="<?= Url::to(['/vehicle-defects/defect']) ?>" type="button" style="margin: 24px 0 0 10px; "
                   class='btn btn-primary'>Refresh</a>
            </div>
            <?php ActiveForm::end(); ?>
            <!--            --><? // var_dump($_GET['pono']); die(); ?>
            <? if (isset($_GET['pono'])): ?>
                <div class="col-md-6">
                    <?
                    $api = "http://web.uzautomotors.com/empc/getVehicleInfo/" . $_GET['pono'];
                    $opts = [
                        "http" => [
                            "method" => "GET",
                            "header" => "slip_token: ZmYwFWzbf9\r\n" .
                                "Accept: application/json\r\n"
                        ]
                    ];
                    $context = stream_context_create($opts);
                    $sFile = file_get_contents($api, false, $context);
                    $ready = json_decode($sFile);
                    $m = $ready->data; ?>
                    <div style="margin-top: 15px;" class="alert alert-info" role="alert">
                        <? foreach ($m as $item): ?>
                            <p>
                                <span style="color: red"> &nbsp Pono:</span><b id="pono"><?= $item->pono ?></b>
                                <span style="color: red"> &nbsp Model:</span><b id="model"><?= $item->model ?></b>
                                <span style="color: red"> &nbsp Vin:</span><b id="vinno"><?= $item->vinno ?></b>
                            </p>
                        <? endforeach; ?>
                        <? $arr = json_encode($m); ?>
                    </div>
                </div>
            <? endif; ?>
        </div>
    </div>
</section>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
      integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />


<? if (isset($_GET['pono'])): ?>
    <section id="mySection" style="margin-top: 50px; display: none">
        <div class="card">
            <div class="row">
                <form id="target" action="" >
                <div class="col-md-6">
                    <label>1-levelni tanlang</label>
                    <select id="levelfirth" style="margin-bottom: 10px" required class="change1 form-control">
                        <option value="">--Tanlang--</option>
                        <? foreach ($level1 as $key => $l1): ?>
                            <option value="<?= $l1['id'] ?>"><?= $l1['name'] ?></option>
                        <? endforeach; ?>
                    </select>
                    <label>2-levelni tanlang</label>
                    <select id="levelsecond" required style="margin-bottom: 10px" class="change2 form-control">
                        <option value="">--Tanlang--</option>
                    </select>
                    <label>3-levelni tanlang</label>
                    <select id="levelthree"  style="margin-bottom: 10px" class="change3 form-control">
                        <option value="">--Tanlang--</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label> Tsexni tanlang</label>
                    <select id="tsex" required style="margin-bottom: 10px" class="form-control">
                        <option value="">--Tanlang--</option>
                        <? foreach ($shops as $key => $shop): ?>
                            <option value="<?= $shop['id'] ?>"><?= $shop['name'] ?></option>
                        <? endforeach; ?>
                    </select>
                    <label> Defectni tanlang</label>
                    <select id="defect" onkeyup="filterFunction()" required style="margin-bottom: 10px" class="form-control">
                        <option value="">--Tanlang--</option>
                        <? foreach ($defect as $key => $def): ?>
                            <option value="<?= $def['id'] ?>"><?= $def['defect_code'].' '.$def['defect_name'] ?></option>
                        <? endforeach; ?>
                    </select>

                    <div style="padding: 25px 0 0 5px; " class="col-md-4">
<!--                        <input id="myButtonOk"  class="btn btn-success"  value="Saqlash">-->
                        <a id="myButtonOk" type="button" class="btn btn-success">Saqlash</a>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </section>
<? endif; ?>


<section style="margin-top: 50px;">
    <div class="card">
        <div class="row">
            <div class="col-12 text-center justify-content-start align-items-center">
                    <table style="width: 80%" class="styled-table">
                        <thead>
                        <tr>
                            <th>Tr</th>
                            <th>Model</th>
                            <th>Tsex</th>
                            <th>Level1</th>
                            <th>Level2</th>
                            <th>Level3</th>
                            <th>Defekt</th>
                            <th>O'chirish</th>
                        </tr>
                        </thead>
                        <tbody id="tableajax">

                        </tbody>
                    </table>
            </div>

        </div>
    </div>
</section>

<style>
    .sufkuf {
        display: none;
    }
</style>
<?
//var_dump($defect); die();
?>
<script src="/themes/AdminLTE-2.4.18/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $(function () {

        var zzz = <?=$defect?>;
            console.log(zzz);
        // $('#defect').select2({
        //     data:
        // })

        var arr = <?=$arr?>;
        var array = arr['1'];
        console.log(array);
        $.post("/site/vehicles", {array}, function (response) {
            if (response = 'success') {
                $("#mySection").show();
                console.log(response);
            }
        }),
            getRealData();
            // $().on('change', '.change', function () {
            $(".change1").change(function () {
                // alert('sasas');
                var id = $(this).val();
                $.get("/site/level2", {id: id}, function (res) {
                    var resp = JSON.parse(res);
                    console.log(resp);
                    $('select#levelsecond').find('option').remove().end();
                    $('select#levelsecond').append('<option >--Tanlang--</option>')
                    $.each(resp, function (key, value) {
                        console.log(value);
                        $('select#levelsecond').append('<option value="' + value['id'] + '">' + value['name'] + '</option>')
                    })
                })
            }),
            $(".change2").change(function () {
                // alert('sasas');
                var id = $(this).val();
                $.get("/site/level3", {id: id}, function (res) {
                    var resp = JSON.parse(res);
                    console.log(resp);
                    $('select#levelthree').find('option').remove().end();
                    $.each(resp, function (key, value) {
                        console.log(value);
                        $('select#levelthree').append('<option value="' + value['id'] + '">' + value['name'] + '</option>')
                    })
                })
            }),
                $(document).on('click', '.delete', (function (e) {
                    // alert('sasa');
                    var id = $(this).attr('data-id');
                    $.get("/site/delete", {id: id}, function (respo) {
                        console.log(respo);
                    });
                    getRealData();
                }));

            $('#myButtonOk').click(function (e) {
                var levelfirth = $("#levelfirth").val();
                var levelsecond = $("#levelsecond").val();
                var levelthree = $("#levelthree").val();
                var tsex = $("#tsex").val();
                var defect = $("#defect").val();
                // if (levelfirth == "") {
                //     alert('formani to`ldiring!');
                //     if (levelsecond == "") {
                //         alert('formani to`ldiring!');
                //         if (tsex == "") {
                //             alert('formani to`ldiring!');
                //             if (defect == "") {
                //                 alert('formani to`ldiring!');
                //             }
                //         }
                //     }
                // }
                $.post("/site/createdef", {
                    array,
                    levelfirth: levelfirth,
                    levelsecond: levelsecond,
                    levelthree: levelthree,
                    tsex: tsex,
                    defect: defect
                }, function (response) {
                    if (response = 'success') {
                        // $("#mySection").hide();
                        // location.reload();
                        getRealData();
                        $("#levelfirth").val('');
                        $("#levelsecond").val('');
                        $("#levelthree").val('');
                        $("#tsex").val('');
                        $("#defect").val('');
                    }
                    // location.reload();
                    // console.log(response);
                })
                // console.log(array);
            })

        function getRealData() {
            $.post("/site/defectonly", {array}, function (res) {
                var table = res.jadval;
                let tab = '';
                $.each(table, function (key, value) {
                    var num = parseInt(key) + 1;
                    tab += "<tr><td>" + num + "</td>" +
                        "<td>" + value.model + '</td>' +
                        "<td>" + value.shop + '</td>' +
                        "<td>" + value.level1 + '</td>' +
                        "<td>" + value.level2 + '</td>' +
                        "<td>" + value.level3 + '</td>' +
                        "<td>" + value.defect + '</td>' +
                        "<td><a data-id='" + value.id + "' class='delete btn btn-danger'>" + 'o`chirish' + '</a></td>' +
                        "</tr>"
                });
                $("#tableajax").html(tab);
                console.log(table);
            })
        }


    })
</script>