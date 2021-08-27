<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vehicles */

$this->title = 'Avtomobil qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-4"></div>
<div class="col-md-4">

    <div style="margin-top: 50px" class="vehicles-create card">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>
<div class="col-md-4"></div>