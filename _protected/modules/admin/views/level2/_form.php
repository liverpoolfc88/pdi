<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Level1;

/* @var $this yii\web\View */
/* @var $model app\models\Level2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="level2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'level1_id')->textInput() ?>

    <?= $form->field($model, 'level1_id')->dropDownList(ArrayHelper::map(Level1::find()->all(), 'id', 'name'),['prompt'=>'Танланг']) ?>

    <?= $form->field($model, 'side')->dropDownList(['R' => 'R','L'=>'L'],['prompt'=>'o`ng/chap']) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
