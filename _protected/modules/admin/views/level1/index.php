<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Level1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Level 1';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card level1-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Level 1 qo`shish', ['create'], ['class' => 'btn btn-success ']) ?>
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
            'created_at',
            'updated_at',
            [
                    'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>


</div>
<!--<script src='/themes/AdminLTE-2.4.18/bower_components/jquery/dist/jquery.min.js'></script>-->