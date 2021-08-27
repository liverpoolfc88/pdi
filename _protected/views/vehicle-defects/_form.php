<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDefects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-defects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vehicle_id')->textInput() ?>

    <?= $form->field($model, 'shop_id')->textInput() ?>

    <?= $form->field($model, 'level1_id')->textInput() ?>

    <?= $form->field($model, 'level2_id')->textInput() ?>

    <?= $form->field($model, 'level3_id')->textInput() ?>

    <?= $form->field($model, 'defect_id')->textInput() ?>

    <?= $form->field($model, 'defect_count')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
