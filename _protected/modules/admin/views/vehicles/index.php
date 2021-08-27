<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiclesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avtomobil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-top: 50px" class="vehicles-index card">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Avtomobil qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'pono',
            'vin_number',
//            'model.model_name',
            [
                'attribute' => 'model_id',
                'value' => 'model.model_name',
                'header' => 'Model nomi',
                'filter' => ArrayHelper::map(\app\models\Models::find()->all(), 'id', 'model_name'),
            ],
//            'model_id',
            'created_at',
            'updated_at',

        ],
    ]); ?>


</div>
