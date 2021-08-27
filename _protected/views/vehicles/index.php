<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiclesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avtomobil';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="container">
    <div style="margin-top: 30px" class="vehicles-index card">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Avtomobil qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

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
                'model_id',
                'created_at',
                'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</section>
