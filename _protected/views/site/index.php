<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = Yii::t('app', Yii::$app->name);
?>
<link rel="stylesheet" href="/themes/AdminLTE-2.4.18/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/themes/AdminLTE-2.4.18/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="/themes/AdminLTE-2.4.18/dist/css/AdminLTE.min.css">

<section  class=" card content">
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <div style="background-color: #1E90FF; height: 200px">
                <a href="<?=Url::to(['/site/branch','id' => 1, 'branch' => 'Asaka'])?>">
                <div class="small-box">
                    <div class="inner">
                        <h3 style="color: white">Asaka</h3>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <div style="background-color: #FF00FF; height: 200px">
                <a href="<?=Url::to(['/site/branch','id' => 3, 'branch' => 'Xorazm'])?>">
                <div class="small-box">
                    <div class="inner">
                        <h3 style="color: white">Xorazm</h3>
                    </div>
                </div>
                </a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <div style="background-color: #32CD32; height: 200px">
                <a href="<?=Url::to(['/site/branch','id' => 2, 'branch' => 'Angren'])?>">
                <div class="small-box">
                    <div class="inner">
                        <h3 style="color: white">Angren</h3>
                    </div>
                </div>
                </a>
            </div>
        </div>

    </div>

</section>


