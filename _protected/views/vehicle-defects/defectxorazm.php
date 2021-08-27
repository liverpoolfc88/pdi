<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\Models;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleDefectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle Defects';
$this->params['breadcrumbs'][] = $this->title;
//var_dump($_GET['mssql']); die();
?>

<link rel="stylesheet" href="/themes/sardor_css/ToggleSwitch.css">
<section class="container">

    <section style="margin-top: 50px">
        <div class="card">


            <div class="row">
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-md-3">
                    <?= $form->field($model, 'pono')->textinput()->label('P/O raqamini kiriting'); ?>
                </div>
                <div style="display: flex" class="col-md-3">
                    <button style="margin-top: 24px" class='myButton btn btn-primary'>So'rovni yuborish111</button>
                    <a href="<?= Url::to(['/vehicle-defects/defectxorazm']) ?>" type="button"
                       style="margin: 24px 0 0 10px; "
                       class='btn btn-primary'>Refresh</a>
                </div>
                <?php ActiveForm::end(); ?>
                <!--            --><? // var_dump($_GET['pono']); die(); ?>
                <? if (isset($_GET['mssql'])): ?>
                    <?
                    $mssql = $_GET['mssql'];
                    $mssql[] = [
                        'PONO' => 'Y10047',
                        'VIN' => 'XWB7554567R786986',
                        'ModelCode' => '17Z80'
                    ];
                    ?>
                    <div class="col-md-6">

                        <div style="margin-top: 15px;" class="alert alert-info" role="alert">
                            <? if (isset($_GET['mssql'])) { ?>
                                <? if (count($mssql) > 1) : ?>
                                    <label>Avto modelni tanlang: <?= count($mssql) ?> ta</label>
                                <? else: ?>
                                    <label>Avto model:</label>

                                <? endif; ?>
                                <select required style="margin-bottom: 10px" class="search form-control">
                                    <!--                                    --><? //(count($mssql) > 1) ? '<option value="">--Tanlang--</option>' : '' ?>
                                    <? if (count($mssql) > 1) : ?>
                                        <option value="">--Tanlang--</option>
                                    <? endif; ?>

                                    <? foreach ($mssql as $keyy => $item): ?>
                                        <? $model_name = Models::find()->where(['model_code' => $item['ModelCode']])->one(); ?>
                                        <option value="<?= $keyy ?>">
                                            <p>
                                                <span style="color: red"> &nbsp Pono:</span><b
                                                        id="pono"><?= $item['PONO'] ?></b>
                                                <span style="color: red"> &nbsp Model:</span><b
                                                        id="model"><?= $item['ModelCode'] . "(" . $model_name->model_name . ")" ?></b>
                                                <span style="color: red"> &nbsp Vin:</span><b
                                                        id="vinno"><?= $item['VIN'] ?></b>
                                            </p>
                                        </option>
                                    <? endforeach; ?>
                                </select>

                                <!--                                --><? // foreach ($mssql as $item): ?>
                                <!--                                    <p>-->
                                <!--                                        <span style="color: red"> &nbsp Pono:</span><b-->
                                <!--                                                id="pono">--><? //= $mssql[0]['PONO'] ?><!--</b>-->
                                <!--                                        --><? // $model_name = Models::find()->where(['model_code' => $mssql[0]['ModelCode']])->one(); ?>
                                <!--                                        <span style="color: red"> &nbsp Model:</span><b-->
                                <!--                                                id="model">--><? //= $mssql[0]['ModelCode'] . "(" . $model_name->model_name . ")" ?><!--</b>-->
                                <!--                                        <span style="color: red"> &nbsp Vin:</span><b id="vinno">--><? //= $mssql[0]['VIN'] ?><!--</b>-->
                                <!--                                    </p>-->
                                <!--                                    <p>-->
                                <!--                                        <span style="color: red"> &nbsp Pono:</span><b-->
                                <!--                                                id="pono"></b>-->
                                <!--                                        --><? // $model_name = Models::find()->where(['model_code' => $mssql[0]['ModelCode']])->one(); ?>
                                <!--                                        <span style="color: red"> &nbsp Model:</span><b-->
                                <!--                                                id="model">--><? //= $mssql[0]['ModelCode'] . "(" . $model_name->model_name . ")" ?><!--</b>-->
                                <!--                                        <span style="color: red"> &nbsp Vin:</span><b id="vinno">--><? //= $mssql[0]['VIN'] ?><!--</b>-->
                                <!--                                    </p>-->
                                <!--                                --><? // endforeach; ?>
                            <? } ?>
                            <? $arr = json_encode($mssql); ?>
                        </div>
                    </div>
                <? endif; ?>
            </div>
        </div>
    </section>

<!--    --><?// if (isset($_GET['mssql'])): ?>
    <? if (true): ?>
        <section  style="margin-top: 50px; ">
            <div class="card">
                <div class="row">
                    <form id="target" action="">
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
                            <select id="levelthree" style="margin-bottom: 10px" class="change3 form-control">
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
                            <select id="defect" onkeyup="filterFunction()" required style="margin-bottom: 10px"
                                    class="form-control">
                                <option value="">--Tanlang--</option>
                                <? foreach ($defect as $key => $def): ?>
                                    <option value="<?= $def['id'] ?>"><?= $def['defect_code'] . ' ' . $def['defect_name'] ?></option>
                                <? endforeach; ?>
                            </select>
                            <label> Xolatni tanlang</label>
                            <select id="side" class="form-control">
                                <option value="">--Tanlang--</option>
                                <option value="2">In</option>
                                <option value="1">Out</option>
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
                            <th>Holati</th>
                            <th>Defekt</th>
                            <th>Narxi</th>

                            <!--                            <th>O'chirish</th>-->
                        </tr>
                        </thead>
                        <tbody id="tableajax">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

<!--    <style>-->
<!--        .sufkuf {-->
<!--            display: none;-->
<!--        }-->
<!--    </style>-->
</section>
<?
//var_dump($defect); die();
?>

<script src="/themes/AdminLTE-2.4.18/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $(function () {

            // getRealData();

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

                var id = $(this).val();
                $.get("/site/level3", {id: id}, function (res) {
                    var resp = JSON.parse(res);
                    console.log(resp);
                    $('select#levelthree').find('option').remove().end();
                    $('select#levelthree').append('<option >--Tanlang--</option>')
                    $.each(resp, function (key, value) {
                        console.log(value);
                        $('select#levelthree').append('<option value="' + value['id'] + '">' + value['name'] + '</option>')
                    })
                })
            }),

            $('#myButtonOk').click(function () {

                var searchval = $(".search").val();
                var arr = <?=$arr?>;



                $.post("/site/vehiclesxorazm", {
                        pono: arr[searchval]['PONO'],
                        vinno: arr[searchval]['VIN'],
                        model: arr[searchval]['ModelCode'],
                    },
                    function (res) {
                        var pono = arr[searchval]['PONO'];
                        var levelfirth = $("#levelfirth").val();
                        var levelsecond = $("#levelsecond").val();
                        var levelthree = $("#levelthree").val();
                        var tsex = $("#tsex").val();
                        var defect = $("#defect").val();
                        var side = $("#side").val();
                        if (res = 'success') {
                            $.post("/site/createdefman", {
                                    pono: pono,
                                    levelfirth: levelfirth,
                                    levelsecond: levelsecond,
                                    levelthree: levelthree,
                                    tsex: tsex,
                                    defect: defect,
                                    side: side
                                },
                                function (response) {
                                    if (response = 'success') {
                                        getRealData(pono);
                                        // location.reload();
                                        $("#levelfirth").val('');
                                        $("#levelsecond").val('');
                                        $("#levelthree").val('');
                                        $("#tsex").val('');
                                        $("#defect").val('');
                                        $("#side").val('');
                                    }
                                })
                        }
                    })
            })


        function getRealData(pono) {
            //var searchval = $(".search").val();
            //var arr = <?//=$arr?>//;
            //var pono = arr[searchval]['PONO'];
            $.post("/site/defectonly", {pono: pono}, function (res) {
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
                        "<td>" + value.side + '</td>' +
                        "<td style='text-align: left' >" + value.defect + '</td>' +
                        "<td>" + value.cost + '</td>' +
                        // "<td><a  data-id='" + value.id + "' class='update btn btn-danger'>" + 'o`zgartirish' + '</a></td>' +
                        // "<td><a  data-id='" + value.id + "' class='update btn btn-danger'>" + 'o`zgartirish' + '</a></td>' +
                        "</tr>"
                });
                $("#tableajax").html(tab);
                // console.log(table);
            })
        }


    })
</script>
