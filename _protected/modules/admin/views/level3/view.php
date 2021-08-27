<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Level3 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Level3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="level3-view card">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('O`zgartirish', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('O`chirish', ['delete', 'id' => $model->id], [
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
                'name',
                'level2_id',
                'created_at',
                'updated_at',
            ],
        ]) ?>

    </div>

</div>
<div class="col-md-3"></div>