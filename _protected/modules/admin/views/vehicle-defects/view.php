<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDefects */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Defects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vehicle-defects-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vehicle_id',
            'shop_id',
            'level1_id',
            'level2_id',
            'level3_id',
            'defect_id',
            'defect_count',
            'created_at',
            'updated_at',
            'status',
        ],
    ]) ?>

</div>
