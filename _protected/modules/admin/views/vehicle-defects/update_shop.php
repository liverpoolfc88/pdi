<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDefects */

$this->title = 'Statusni yopish: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Defects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-defects-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form_shop', [
        'model' => $model,
    ]) ?>

</div>
