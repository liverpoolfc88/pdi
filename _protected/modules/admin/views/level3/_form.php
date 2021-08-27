<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Level2;
use app\models\Level1;

/* @var $this yii\web\View */
/* @var $model app\models\Level3 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="level3-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'level2_id')->textInput() ?>

<!---->
<!--    --><?//=     $form->field($model, 'le_dp_id')->widget(Select2::classname(), [
//        'data' => ArrayHelper::map(Departments::find()->where(['dp_active' => 1])->all(),'dp_id','dp_name'),
//        'language' => 'ru',
//        'options' => ['placeholder' => 'танланг ...','style' => 'margin-top: -4px;',
//            'multiple' => true,
//            'onchange' =>'
//                    $.post("'.Yii::$app->urlManager->createUrl('letters/list_location?id=').'"+$(this).val(),
//                    function(data){
//                        $("select#le_loc_id").html(data); console.log(data)
//                    });'
//        ],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ]);
//    ?>

<!--    --><?//= $form->field($model, 'level1_id')->dropDownList(ArrayHelper::map(Level1::find()->all(), 'id', 'name'),['prompt'=>'Танланг']) ?>

    <?= $form->field($model, 'level2_id')->dropDownList(ArrayHelper::map(Level2::find()->all(), 'id', 'name'),['prompt'=>'Танланг']) ?>

    <?= $form->field($model, 'side')->dropDownList(['R' => 'R','L'=>'L'],['prompt'=>'o`ng/chap']) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
