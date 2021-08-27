<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefectList */

$this->title = 'Create Defect List';
$this->params['breadcrumbs'][] = ['label' => 'Defect Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="defect-list-create card">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>
<div class="col-md-3"></div>
