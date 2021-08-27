<?php

/**
 * Created by PhpStorm.
 * User: Farhodjon
 * Date: 29.05.2018
 * Time: 23:34
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this \yii\web\View */

$this->title = 'Login';

?>
<link rel="stylesheet" href="/themes/AdminLTE-2.4.18/bower_components/bootstrap/dist/css/bootstrap.min.css">
<div class="be-wrapper be-login" style="background-image: url('themes/fon.jpg');background-size: 100% 100%;">
    <div class="be-content">

        <div class="main-content container-fluid" style="height: 100vh;  padding-top: 10vh">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="splash-container">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-heading">
                                <!-- <img src="<?=Yii::$app->homeUrl;?>img/login.png" alt="logo" width="122" height="127" class="logo-img"> -->
                                <h3> <span style="font-size: 26px;font-family: impact" class="splash-description"><b>UzautoMotors PDI system</b></span> </h3>
                            </div>
                            <div class="panel-body">
                                <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off']]) ?>
                                <div class="login-form">
                                    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Login (tabel raqami)'])->label(false) ?>
                                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>
                                    <div class="form-group row login-tools">
                                        <div class="col-xs-6 login-remember">

                                        </div>
                                        <!--    <div class="col-xs-6 login-forgot-password">
                                    <a href="<?= Url::to(['users/forgot-password']) ?>">Forgot Password?</a>
                                </div> -->
                                    </div>
                                    <div class="form-group row login-submit">
                                        <!-- <div class="col-xs-6">
                                    <a href="<?= Url::to(['users/signup']) ?>" class="btn btn-default btn-xl">Register</a>
                                </div> -->
                                        <div class="col-xs-6">
                                            <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Kirish</button>
                                        </div>
                                    </div>
                                </div>
                                <?php ActiveForm::end() ?>
<!--                                <a href="--><?//=Url::to(['site/download-file'])?><!--"> <h3 class='text-center'>Foydalanish yo'riqnomasi</h2></a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>

        </div>
    </div>
</div>
