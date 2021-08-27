<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDefects */

$this->title = 'Update Vehicle Defects: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Defects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card vehicle-defects-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
