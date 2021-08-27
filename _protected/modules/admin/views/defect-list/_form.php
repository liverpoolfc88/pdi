<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DefectList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="defect-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'defect_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'defect_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'deleted_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'created_by')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_by')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'deleted_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
