<?php

use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$q = 0;
$All_MashinaSoni = 0;

//var_dump(odbc_fetch_row($Res_MashinaSoni)); die();
?>


<style>
    .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 80%;

        -webkit-box-shadow: 2px 2px 15px 0px #02010F;
        box-shadow: 2px 2px 15px 0px #02010F;

    }

    .customers td, .customers th {
        /*border: 1px solid #ddd;*/
        border: 1px #96B4D8 solid;
        padding: 1px 8px;

    }

    .customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .customers tr:hover {
        background-color: #ddd;
    }

    .customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        /*background-color: #96b4d8;*/
        background-color: #CEE2F7;
        color: white;
    }

    /*.ahref {*/
    /*    color: white;*/
    /*}*/
    tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
    }

    thead {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
    }

    .form {
        /*background-image: url('/themes/searchicon.png');*/
        /*background-position: 10px 10px;*/
        /*background-repeat: no-repeat;*/
        /*width: 100%;*/
        /*height: 40px;*/
        /*font-size: 12px;*/
        /*padding: 12px 0 12px 5px;*/
        /*border: 1px solid #ddd;*/
        margin-top: 12px;
    }
</style>
<section style="padding-bottom: 15px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php $form = ActiveForm::begin([
                ]); ?>
                <div style="padding-top: 12px" class="col-md-3">
                    <?= DatePicker::widget([
                        'options' => ['placeholder' => 'Dan ',
                            'class' => 'inputform',
                        ],
                        'name' => 'startDT',
                        'value' => ($value['startDT']) ? $value['startDT'] : '',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]); ?>
                </div>
                <div style="padding-top: 12px" class="col-md-3">
                    <?= DatePicker::widget([
                        'options' => ['placeholder' => 'Gacha',
                            'class' => 'inputform',
                        ],
                        'name' => 'endDT',
                        'value' => ($value['endDT']) ? $value['endDT'] : '',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]); ?>
                </div>
                <!--                <div style="padding-top: 12px" class="col-md-3">-->
                <!--                    --><? //= DatePicker::widget([
                //                        'options' => ['placeholder' => 'Sana',
                //                            'class' => 'inputform',
                //                        ],
                //                        'name' => 'dates',
                //                        'value' => ($value['dates']) ? $value['dates'] : '',
                //                        'pluginOptions' => [
                //                            'autoclose' => true,
                //                            'format' => 'yyyy-mm-dd'
                //                        ]
                //                    ]); ?>
                <!--                </div>-->
                <div class="col-md-3">
                    <?= Html::submitButton('Qidirish', ['class' => 'btn btn-primary form']) ?>
                    <?= Html::a('Reset', ['/site/host', 'res' => 'res'], ['class' => 'btn btn-default form']) ?>
                </div>

                <div style=" display: flex; " class="col-md-2">
                    <!--                    <a id="sasa" class=" btn btn-danger">EXELGA KO'CHIRISH</a>-->
                    <input style="margin-right: 15px" class="form btn btn-danger" type="button" onclick=" tableToExcel('resultTable_m','sum', 'Defekt.xls')" value="Export to Excel (model) ">
                    <input class="form btn btn-danger" type="button" onclick=" tableToExcel('resultTable_t','sum', 'Defekt.xls')" value="Export to Excel (tsex)">
                </div>
                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="col-md-6">
            <table id="resultTable_m" class="customers" style="white-space: nowrap; ">
                <tr>
                    <th style="color: #337ab7">№</th>
                    <th style="color: #337ab7">Model</th>
                    <th style="color: #337ab7">Avtomobillar<br/>soni</th>
                    <th style="color: #337ab7">Defektlar.<br/>soni</th>
                    <th style="color: #337ab7">Defekt<br/> %</th>
                </tr>
                <tbody>
                <? while (odbc_fetch_row($Res_MashinaSoni)) {
                    $q++;
                    ?>
                    <tr <? if ($q % 2) { ?>class="odd" <? } ?>>
                        <td><?= $q ?></td>
                        <?
                        $queryMashinaNomi = "SELECT N99DESC FROM NEWSLS.N99CTPF WHERE N99BIGCD ='C01' and N99SMLCD ='" . trim(odbc_result($Res_MashinaSoni, 'MODEL')) . "'";
                        $Res_MashinaNomi = odbc_exec($connect, $queryMashinaNomi);
                        $ModelNomi = trim(odbc_result($Res_MashinaNomi, 'N99DESC'));
                        $Model_codi = trim(odbc_result($Res_MashinaSoni, 'MODEL'));
                        $MashinaSoni = trim(odbc_result($Res_MashinaSoni, 'MashinaSoni'));
                        $All_MashinaSoni = $All_MashinaSoni + $MashinaSoni;
                        ?>
                        <td id="<?= $Model_codi ?>"> <?= $ModelNomi ?>    </td>
                        <td ><span id="<?= "jsoni_" . $Model_codi ?>"> <? echo $MashinaSoni;
                                $All_MashinaSoni; ?></span></td>
                        <td ><span id="<?= "def_" . $Model_codi; ?>"
                                                             style=" color: red">0</span></td>
                        <td ><span id="<?= "prot_" . $Model_codi; ?>"
                                                             style=" color: BROWN">0</span></td>
                    </tr>
                <? } ?>
                <tr>
                    <td colspan="2" style=" text-align:right; font-weight: bold; letter-spacing: 7px"> Jami:</td>
                    <td style="  font-weight: bold"><strong><span
                                    id="allavtosoni"><?= $All_MashinaSoni; ?></span></strong></td>
                    <td style=" font-weight: bold"><strong><span id="allsoni"
                                                                                   style=" color: red">0</span></strong>
                    </td>
                    <td style="  font-weight: bold"><strong><span id="allprot"
                                                                                   style=" color: BROWN">0</span></strong>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table id="resultTable_t" class="customers" style="white-space: nowrap; ">
                <tr>
                    <th style="color: #337ab7">№</th>
                    <th style="color: #337ab7; width: 30%">Tsex</th>
                    <th style="color: #337ab7">Model</th>
                    <th style="color: #337ab7">Avtomobillar<br/>soni</th>
                    <th style="color: #337ab7">Defektlar<br/>soni</th>
                    <th style="color: #337ab7">Defekt<br/> %</th>
                </tr>
                <tbody>

                <? $q = 1;
                foreach ($tab as $key => $t): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <?
                        $i = 0;
                        if ($t['name'] == $tab[$key + 1]['name']) {
                            $q++;
                            foreach ($tab as $k => $d) {
                                if ($d['name'] == $t['name']) {
                                    $i++;
                                }
                            } ?>
                            <? if (($t['name'] != $tab[$key - 1]['name'])) { ?>
                                <td rowspan="<?= $i ?>"><?= $t['name'] ?></td>
                            <? } else '' ?>
                            <? $a = true; ?>
                        <? } ?>
                        <? if (($t['name'] != $tab[$key - 1]['name']) && ($t['name'] != $tab[$key + 1]['name'])) { ?>
                            <td><?= $t['name'] ?></td>
                        <? } ?>
                        <td><?= $t['model_name'] ?></td>
                        <td id="<?="all".$key?>">0</td>
                        <td id="<?="count".$key?>"><?= $t['count'] ?></td>
                        <td  id="<?="prot".$key?>">0</td>
                    </tr>
                <? endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</section>


<script src="/themes/AdminLTE-2.4.18/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $(function () {
        // 1-tablitsa
        var model = <?=$model?>;
        var tabl = <?=$tabl?>;
        console.log(tabl);
        var defsum = 0;
        $.each(model, function (key, value) {
            var jsoni = $('#jsoni_' + value.model_code).html();
            defsum += parseInt(value.count);
            // console.log((value.count));
            $('#def_' + value.model_code).html(value.count);
            $('#prot_' + value.model_code).html((value.count * 100 / jsoni).toFixed(2) + ' %');
            $.each(tabl, function (ke, val) {
                var count = $('#count'+ke).html();
                if (val.model_code == value.model_code){
                    $('#all'+ke).html(jsoni);
                    $('#prot'+ke).html((count*100/jsoni).toFixed(2) + ' %')
                }
            });

        });
        $('#allsoni').html(defsum);
        var allavtosoni = $('#allavtosoni').html();
        $('#allprot').html((defsum * 100 / allavtosoni).toFixed(2) + ' %')
        // alert( defsum );
        // alert (2.365994489.toFixed(3));

        // 2-tablitsa


    })
</script>
<hr>

<script type="text/javascript">
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) {
            return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; })
        }
            , downloadURI = function(uri, name) {
            var link = document.createElement("a");
            link.download = name;
            link.href = uri;
            link.click();
        }

        return function(table, name, fileName) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            var resuri = uri + base64(format(template, ctx))
            downloadURI(resuri, fileName);
        }
    })();
</script>