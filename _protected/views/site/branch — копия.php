<?php

use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = Yii::t('app', Yii::$app->name);
//var_dump($shopsum_array); die();
?>
<link rel="stylesheet" href="/themes/AdminLTE-2.4.18/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/themes/AdminLTE-2.4.18/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="/themes/AdminLTE-2.4.18/dist/css/AdminLTE.min.css">

<section style="height: 100vh;" class=" card content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= ($def_array[0]['d_count']) ? $def_array[0]['d_count'] : 0 ?></h3>

                    <p><?= ($def_array[0]['defect_name']) ? $def_array[0]['defect_name'] : 0 ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">PDI <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= ($def_array[1]['d_count']) ? $def_array[1]['d_count'] : 0 ?></h3>

                    <p><?= ($def_array[1]['defect_name']) ? $def_array[1]['defect_name'] : 0 ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">PDI <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= ($def_array[2]['d_count']) ? $def_array[2]['d_count'] : 0 ?></h3>

                    <p><?= ($def_array[2]['defect_name']) ? $def_array[2]['defect_name'] : 0 ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    <!--                    <span class="iconify" data-icon="ion:arrow-undo-circle" data-inline="false"></span>-->
                </div>
                <a href="#" class="small-box-footer">PDI <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?= ($def_array[3]['d_count']) ? $def_array[3]['d_count'] : 0 ?></h3>

                    <p><?= ($def_array[3]['defect_name']) ? $def_array[3]['defect_name'] : 0 ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">PDI <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
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
                            'value' => (isset($vstartDT)) ? $vstartDT : '',
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]); ?>
                    </div>
                    <div  class="col-md-3">
                        <?= DatePicker::widget([
                            'options' => ['placeholder' => 'Gacha',
                                'class' => 'inputform',
                            ],
                            'name' => 'endDT',
                            'value' => (isset($vendDT)) ? $vendDT : '',
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]); ?>
                    </div>
                    <div class="col-md-3">
                        <?= Html::submitButton('Qidirish', ['class' => 'btn btn-primary form']) ?>
<!--                        --><?//= Html::a('Reset', ['/site/branch'], ['class' => 'btn btn-default form']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>

            </div>
        </div>
    </section>

    <hr>
    <div class="row">
        <div class="col-md-6">
            <? if (!empty($shopsum_array)) { ?>
                <div id="chartContainer" style="height: 500px; width: 100%;">
                </div>
            <? } ?>
        </div>
        <div class="col-md-6">
            <? if (!empty($shop_array)) { ?>
                <div id="chartContainer1" style="height: 500px; width: 100%;">
                </div>
            <? } ?>
        </div>
    </div>
</section>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
    window.onload = function () {
        var chart1 = new CanvasJS.Chart("chartContainer1",
            {
                title: {
                    text: "Tsexlar bo'yicha summasi"
                },
                data: [
                    {
                        type: "doughnut",
                        dataPoints: [
                            {
                                y: <?=($shopsum_array[0]['count'] == null) ? 0 : $shopsum_array[0]['count']?>,
                                indexLabel: "<?=$shopsum_array[0]['name']?> sum:<?=($shopsum_array[0]['summ'] == null) ? 0 : $shopsum_array[0]['summ']?>"
                            },
                            {
                                y: <?=($shopsum_array[1]['count'] == null) ? 0 : $shopsum_array[1]['count']?>,
                                indexLabel: "<?=$shopsum_array[1]['name']?> sum:<?=($shopsum_array[1]['summ'] == null) ? 0 : $shopsum_array[1]['summ']?>"
                            },
                            {
                                y: <?=($shopsum_array[2]['count'] == null) ? 0 : $shopsum_array[2]['count']?>,
                                indexLabel: "<?=$shopsum_array[2]['name']?> sum:<?=($shopsum_array[2]['summ'] == null) ? 0 : $shopsum_array[2]['summ']?>"
                            },
                            {
                                y: <?=($shopsum_array[3]['count'] == null) ? 0 : $shopsum_array[3]['count']?>,
                                indexLabel: "<?=$shopsum_array[3]['name']?> sum:<?=($shopsum_array[3]['summ'] == null) ? 0 : $shopsum_array[3]['summ']?>"
                            },
                            {
                                y: <?=($shopsum_array[4]['count'] == null) ? 0 : $shopsum_array[4]['count']?>,
                                indexLabel: "<?=$shopsum_array[4]['name']?> sum:<?=($shopsum_array[4]['summ'] == null) ? 0 : $shopsum_array[4]['summ']?>"
                            },
                            {
                                y: <?=($shopsum_array[5]['count'] == null) ? 0 : $shopsum_array[5]['count']?>,
                                indexLabel: "<?=$shopsum_array[5]['name']?> sum:<?=($shopsum_array[5]['summ'] == null) ? 0 : $shopsum_array[5]['summ']?>"
                            },
                            {
                                y: <?=($shopsum_array[6]['count'] == null) ? 0 : $shopsum_array[6]['count']?>,
                                indexLabel: "<?=$shopsum_array[6]['name']?> sum:<?=($shopsum_array[6]['summ'] == null) ? 0 : $shopsum_array[6]['summ']?>"
                            },
                            {
                                y: <?=($shopsum_array[7]['count'] == null) ? 0 : $shopsum_array[7]['count']?>,
                                indexLabel: "<?=$shopsum_array[7]['name']?> sum:<?=($shopsum_array[7]['summ'] == null) ? 0 : $shopsum_array[7]['summ']?>"
                            },
                            {
                                y: <?=($shopsum_array[8]['count'] == null) ? 0 : $shopsum_array[8]['count']?>,
                                indexLabel: "<?=$shopsum_array[8]['name']?> sum:<?=($shopsum_array[8]['summ'] == null) ? 0 : $shopsum_array[8]['summ']?>"
                            },
                            {
                                y: <?=($shopsum_array[9]['count'] == null) ? 0 : $shopsum_array[9]['count']?>,
                                indexLabel: "<?=$shopsum_array[9]['name']?> sum:<?=($shopsum_array[9]['summ'] == null) ? 0 : $shopsum_array[9]['summ']?>"
                            },
                            {
                                y: <?=($shopsum_array[10]['count'] == null) ? 0 : $shopsum_array[10]['count']?>,
                                indexLabel: "<?=$shopsum_array[10]['name']?> sum:<?=($shopsum_array[10]['summ'] == null) ? 0 : $shopsum_array[10]['summ']?>"
                            },
                        ]
                    }
                ]
            });

        chart1.render();
        var chart = new CanvasJS.Chart("chartContainer",
            {
                title: {
                    text: "Tsexlar bo'yicha defektlar soni"
                },
                data: [

                    {
                        dataPoints: [
                            {
                                x: 1,
                                y: <?=($shop_array[0]['counts'] == null) ? 0 : $shop_array[0]['counts']?>,
                                label: "<?=$shop_array[0]['name']?>"
                            },
                            {
                                x: 2,
                                y: <?=($shop_array[1]['counts'] == null) ? 0 : $shop_array[1]['counts']?>,
                                label: "<?=$shop_array[1]['name']?>"
                            },
                            {
                                x: 3,
                                y: <?=($shop_array[2]['counts'] == null) ? 0 : $shop_array[2]['counts']?>,
                                label: "<?=$shop_array[2]['name']?>"
                            },
                            {
                                x: 4,
                                y: <?=($shop_array[3]['counts'] == null) ? 0 : $shop_array[3]['counts']?>,
                                label: "<?=$shop_array[3]['name']?>"
                            },
                            {
                                x: 5,
                                y: <?=($shop_array[4]['counts'] == null) ? 0 : $shop_array[4]['counts']?>,
                                label: "<?=$shop_array[4]['name']?>"
                            },
                            {
                                x: 6,
                                y: <?=($shop_array[5]['counts'] == null) ? 0 : $shop_array[5]['counts']?>,
                                label: "<?=$shop_array[5]['name']?>"
                            },
                            {
                                x: 7,
                                y: <?=($shop_array[6]['counts'] == null) ? 0 : $shop_array[6]['counts']?>,
                                label: "<?=$shop_array[6]['name']?>"
                            },
                            {
                                x: 8,
                                y: <?=($shop_array[7]['counts'] == null) ? 0 : $shop_array[7]['counts']?>,
                                label: "<?=$shop_array[7]['name']?>"
                            },
                            {
                                x: 9,
                                y: <?=($shop_array[8]['counts'] == null) ? 0 : $shop_array[8]['counts']?>,
                                label: "<?=$shop_array[8]['name']?>"
                            },
                            {
                                x: 10,
                                y: <?=($shop_array[9]['counts'] == null) ? 0 : $shop_array[9]['counts']?>,
                                label: "<?=$shop_array[9]['name']?>"
                            },
                            {
                                x: 11,
                                y: <?=($shop_array[10]['counts'] == null) ? 0 : $shop_array[10]['counts']?>,
                                label: "<?=$shop_array[10]['name']?>"
                            },


                        ]
                    }
                ]
            });

        chart.render();
    }
</script>

