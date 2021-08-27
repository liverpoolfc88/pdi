<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDefectsSearch */
/* @var $form yii\widgets\ActiveForm */
//var_dump($model2); die();
?>
<style>
    .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        /*width: 100%;*/

        -webkit-box-shadow: 2px 2px 15px 0px #02010F;
        box-shadow: 2px 2px 15px 0px #02010F;

    }

    .customers td, .customers th {
        /*border: 1px solid #ddd;*/
        border: 1px #96B4D8 solid;
        padding: 1px 8px;

    }

    #customers tr:nth-child(even) {
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
                <div class="col-md-3">
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
                <div class="col-md-3">
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

                <div class="col-md-6">
                    <div class="col-md-3">
                        <?= DatePicker::widget([
                            'options' => ['placeholder' => 'Sana',
                                'class' => 'inputform',
                            ],
                            'name' => 'dates',
                            'value' => ($value['dates']) ? $value['dates'] : '',
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]); ?>
                    </div>
                    <div class="col-md-9">
                        <input <?= ($value['def']) ? 'checked' : '' ?> name="def" type="checkbox">
                        <label> Defektlar </label>
                        <input <?= ($value['model']) ? 'checked' : '' ?> name="model" type="checkbox">
                        <label> Modellar </label>
                        <input <?= ($value['l1']) ? 'checked' : '' ?> name="l1" type="checkbox">
                        <label> Level 1 </label>
                        <input <?= ($value['l2']) ? 'checked' : '' ?> name="l2" type="checkbox">
                        <label> Level 2 </label>
                        <input <?= ($value['l3']) ? 'checked' : '' ?> name="l3" type="checkbox">
                        <label> Level 3 </label>
                    </div>


                </div>

            </div>
            <div class="col-md-12">
                <div class="col-md-2">
                    <?
                    $v_shops = ($value['sh_name']) ? [$value['sh_name'] => $value['sh_name']] : ['0' => '<--Tsexni tanlang-->'];
                    $items = $activities = $v_shops + ['0' => '<--Tsexni tanlang-->'] + ArrayHelper::map(\app\models\Shops::find()->all(), 'name', 'name');
                    ?>
                    <? $options = ['class' => 'inputform form form-control'] ?>
                    <?= Html::dropDownList('sh_name', null, $items, $options) ?>
                </div>
                <div class="col-md-2">
                    <?
                    $v_models = ($value['model_name']) ? [$value['model_name'] => $value['model_name']] : ['0' => '<--Modelni tanlang-->'];
                    $items = $activities = $v_models + ['0' => '<--Modelni tanlang-->'] + ArrayHelper::map(\app\models\Models::find()->all(), 'model_name', 'model_name');
                    ?>
                    <? $options = ['class' => 'inputform form form-control'] ?>
                    <?= Html::dropDownList('model_name', null, $items, $options) ?>
                </div>
                <div class="col-md-2">
                    <?
                    $v_def = ($value['defect_name']) ? [$value['defect_name'] => $value['defect_name']] : ['0' => '<--Defekt tanlang-->'];
                    $items = $activities = $v_def + ['0' => '<--Defekt tanlang-->'] + ArrayHelper::map(\app\models\DefectList::find()->all(), 'defect_name', 'defect_name');
                    ?>
                    <? $options = ['class' => 'inputform form form-control'] ?>
                    <?= Html::dropDownList('defect_name', null, $items, $options) ?>
                </div>
                <div class="col-md-2">
                    <?= Html::submitButton('Qidirish', ['class' => 'btn btn-primary form']) ?>
                    <?= Html::a('Reset', ['/site/defcount', 'res' => 'res'], ['class' => 'btn btn-default form']) ?>
                </div>
                <div class="col-md-2">
                    <!--                    <a id="sasa" class=" btn btn-danger">EXELGA KO'CHIRISH</a>-->
                    <input class="form btn btn-danger" type="button" onclick=" tableToExcel('resultTable','one', 'Hisobot.xls')" value="Export to Excel">
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="">
                <div style="text-align: -webkit-center;">
                    <? if (isset($value)) : ?>
                        <table id="resultTable" class="customers">
                            <thead>
                            <tr>
                                <th style="text-align: center"><a>T/r</a></th>
                                <th><a class="ahref " href="<?= Url::to(['/site/defcount', 'sort' => 'sh_name']) ?>">Tsexlar
                                </th>
                                <!--                                <th>-->
                                <? //= Html::submitButton('Qidirish',['/site/defcount','sort' => 'defect_name'], ['class' => 'ahref']) ?><!--</th>-->

                                <? if ($value['model']) : ?>
                                    <th><a class="ahref "
                                           href="<?= Url::to(['/site/defcount', 'sort' => 'm.model_name']) ?>">Model
                                    </th>
                                <? endif; ?>
                                <? if ($value['l1']) : ?>
                                    <th><a class="ahref " href="<?= Url::to(['/site/defcount', 'sort' => 'level1']) ?>">Level
                                            1</th>
                                <? endif; ?>
                                <? if ($value['l2']) : ?>
                                    <th><a class="ahref " href="<?= Url::to(['/site/defcount', 'sort' => 'level2']) ?>">Level
                                            2</th>
                                <? endif; ?>
                                <? if ($value['l3']) : ?>
                                    <th><a class="ahref " href="<?= Url::to(['/site/defcount', 'sort' => 'level3']) ?>">Level
                                            3</th>
                                <? endif; ?>
                                <? if ($value['def']) : ?>
                                    <th><a class="ahref "
                                           href="<?= Url::to(['/site/defcount', 'sort' => 'defect_name']) ?>">Defektlar
                                            nomi</th>
                                <? endif; ?>
                                <th style="text-align: center"><a class="ahref "
                                                                  href="<?= Url::to(['/site/defcount', 'sort' => 'count']) ?>">Defektlar
                                        soni</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
                            foreach ($model as $key => $m):
                                ?>
                                <tr>
                                    <td style="text-align: center"><?= $key + 1 ?></td>
                                    <td><?= $m['sh_name'] ?></td>
                                    <? if ($value['model']) : ?>
                                        <td><?= $m['model_name'] ?></td>
                                    <? endif; ?>
                                    <? if ($value['l1']) : ?>
                                        <td><?= $m['level1'] ?></td>
                                    <? endif; ?>
                                    <? if ($value['l2']) : ?>
                                        <td><?= $m['level2'] ?></td>
                                    <? endif; ?>
                                    <? if ($value['l3']) : ?>
                                        <td><?= $m['level3'] ?></td>
                                    <? endif; ?>
                                    <? if ($value['def']) : ?>
                                        <td><?= $m['defect_name'] ?></td>
                                    <? endif; ?>
                                    <td style="text-align: center"><?= $m['count'] ?></td>
                                </tr>
                            <? endforeach; ?>
                            </tbody>
                        </table>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

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