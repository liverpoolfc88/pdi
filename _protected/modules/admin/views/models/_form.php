<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Models */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-6">
        <div class="card models-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'model_code')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'model_name')->textInput(['maxlength' => true]) ?>

            <!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>
</div>
