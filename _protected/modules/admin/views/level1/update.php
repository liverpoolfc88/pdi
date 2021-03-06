<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Level1 */

$this->title = 'Update Level1: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Level1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

        <div class="card level1-update">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
    <div class="col-md-3"></div>
</div>

