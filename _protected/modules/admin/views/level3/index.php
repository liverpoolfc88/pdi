<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Level3Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Level 3';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level3-index card">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Level 3 qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
//            'level2_id',
            'level2.name',
            'side',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
