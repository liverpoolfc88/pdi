<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shop_id')->dropDownList(ArrayHelper::map(\app\models\Shops::find()->all(), 'id', 'name'),['prompt'=>'Танланг']) ?>

    <?= $form->field($model, 'branch_id')->dropDownList(ArrayHelper::map(\app\models\Branch::find()->all(), 'id', 'name'),['prompt'=>'Танланг']) ?>

    <?= $form->field($model, 'role')->dropDownList(['admin'=>'admin','controller'=>'controller','production'=>'production']) ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
