<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDefects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-defects-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 3])->label('Izox') ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['1'=>'ochiq','2'=>'yopiq']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
