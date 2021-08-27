<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDefects */

$this->title = 'Create Vehicle Defects';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Defects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-defects-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
