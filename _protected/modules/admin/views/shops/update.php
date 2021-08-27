<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shops */

$this->title = 'Tsex: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="shops-update card">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
<div class="col-md-3"></div>
