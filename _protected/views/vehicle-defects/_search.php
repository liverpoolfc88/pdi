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
    <div class="col-md-3">
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
    <div class="col-md-3">
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
    <div class="col-md-6">
        <div class="form-group">

            <?= Html::submitButton('Qidirish', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Tozalash', ['/vehicle-defects/index', 'remove'=>1 ], ['class' => 'btn btn-default form']) ?>
            <?
            if (Yii::$app->user->identity->role == 'production') { ?>
            <?= Html::a('Fayl biriktirish', ['/site/deffile' ], ['class' => 'btn btn-success form', 'style'=> 'margin-left: 100px']) ?>
            <?}?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>


</div>
