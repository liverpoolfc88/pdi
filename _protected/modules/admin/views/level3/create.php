<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Level3 */

$this->title = 'Level 3 qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Level3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="level3-create card">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
<div class="col-md-3"></div>
