<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foydalanuvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Yangi foydalanuvchi qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         
            'fullname',
            'username',
//            'shop_id',
            [
                'attribute' => 'shop_id',
                'value' => function ($data) {
                    return  $data->shopuser->name;
                },
                'filter' => ArrayHelper::map(\app\models\Shops::find()->all(), 'id', 'name'),
            ],
            [
                'attribute' => 'branch_id',
                'value' => function ($data) {
                    return  $data->branchuser->name;
                },
                'filter' => ArrayHelper::map(\app\models\Branch::find()->all(), 'id', 'name'),
            ],
            'role',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}  ',
            ],
        ],
    ]); ?>


</div>
