<?

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<section class="card">
    <div class="row">
        <div>
            <? foreach ($model as $key => $m): ?>
                <div class="col-md-4">
                    <div class="alert alert-success" role="alert">
                        <a class="alert-link"><?= $key + 1 ?> Model: <?= $m->vehicledef->model->model_name ?></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-success" role="alert">
                        <a class="alert-link">Defekt: <?= $m->def->defect_name ?></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-success" role="alert">
                        <a class="alert-link">Pono: <?= $m->vehicledef->pono ?></a>
                    </div>
                </div>
            <? endforeach; ?>
            <div class="col-md-4">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model_new, 'file')->fileInput(['maxlength' => false]) ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</section>