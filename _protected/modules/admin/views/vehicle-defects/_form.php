<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDefects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-defects-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'vehicle_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'shop_id')->textInput() ?>

    <?= $form->field($model, 'shop_id')->dropDownList(ArrayHelper::map(\app\models\Shops::find()->all(), 'id', 'name'),['prompt'=>'Танланг']) ?>
    <?= $form->field($model, 'level1_id')->dropDownList(ArrayHelper::map(\app\models\Level1::find()->all(), 'id', 'name'),['prompt'=>'Танланг']) ?>
    <?= $form->field($model, 'level2_id')->dropDownList(ArrayHelper::map(\app\models\Level2::find()->all(), 'id', 'name'),['prompt'=>'Танланг']) ?>
    <?= $form->field($model, 'level3_id')->dropDownList(ArrayHelper::map(\app\models\Level3::find()->all(), 'id', 'name'),['prompt'=>'Танланг']) ?>
<!--    --><?//= $form->field($model, 'defect_id')->dropDownList(ArrayHelper::map(\app\models\DefectList::find()->all(), 'id', 'defect_name'),['prompt'=>'Танланг']) ?>
    <?= $form->field($model, 'defect_id')->dropDownList(ArrayHelper::map(\app\models\DefectList::find()->all(), 'id', 'defect_name'),['prompt'=>'Танланг']) ?>

<!--    --><?//= $form->field($model, 'level1_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'level2_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'level3_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'defect_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'side')->textInput() ?>

    <?= $form->field($model, 'side')->dropDownList(['1' => 'Tashqi','2'=>'Ichki'],['prompt'=>'xolat']) ?>

<!--    --><?//= $form->field($model, 'defect_count')->textInput() ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
