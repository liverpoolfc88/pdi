<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Level2 */

$this->title = 'Level 2 qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Level2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="card level2-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
<div class="col-md-3"></div>
