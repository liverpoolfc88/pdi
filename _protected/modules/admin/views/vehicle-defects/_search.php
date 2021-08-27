<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDefectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-defects-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['autocomplete' => 'off'],
    ]); ?>
    <div class="col-md-4">
        <?= $form->field($model, 'startdt')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => '(Dan...)',
                // 'value' => date('Y-m-d')
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'format' =>'yyyy-mm-dd'
            ]
        ])->label(false); ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'enddt')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => '(...gacha)',
                // 'value' => date('Y-m-d')
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'format' =>'yyyy-mm-dd'
            ]
        ])->label(false); ?>
    </div>

    <div class="form-group">

        <?= Html::submitButton('Қидириш', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Тозалаш', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
