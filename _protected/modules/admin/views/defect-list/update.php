<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefectList */

$this->title = 'Update Defect List: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Defect Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="defect-list-update card">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>
<div class="col-md-3"></div>
