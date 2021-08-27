<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vehicles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vin_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
