<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Level1 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Level1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card level1-view">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('O`zgartirish', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('O`chirish', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'O`chirishni xoxlaysizmi?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>

        </div>
    </div>
    <div class="col-md-3"></div>
</div>
