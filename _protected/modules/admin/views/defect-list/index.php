<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DefectListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Defektlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="defect-list-index card">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Defekt qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'defect_name',
            'defect_code',
            'cost',
            'created_at',
            'updated_at',
//            'deleted_at',
//            'created_by',
//            'updated_by',
//            'deleted_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
