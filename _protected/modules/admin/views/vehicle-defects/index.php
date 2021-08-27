<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleDefectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle Defects';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    #w1 {
        overflow-x: auto;
    }
</style>
<div class="vehicle-defects-index card">

    <h1><? //= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Create Vehicle Defects', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <!--    --><? // var_dump($_GET); die();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'options' => ['class' => 'table table-striped table-bordered'],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'created_at',
                'value' => 'created_at',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'created_at',
                    'language' => 'ru',
                    'size' => 'ms',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]),

            ],
            'created_at',
            [
                'attribute' => 'vinno',
                'header' => 'Vinno',
                'value' => 'vehicledef.vin_number',
            ],
            [
                'attribute' => 'pono',
                'header' => 'Pono',
                'value' => 'vehicledef.pono',
            ],
            [
                'attribute' => 'model_code',
                'value' => 'vehicledef.model.model_code',
                'header' => 'Model-kod',
                'filter' => ArrayHelper::map(\app\models\Models::find()->all(), 'model_code', 'model_code'),
            ],
            [
                'attribute' => 'model_name',
                'value' => 'vehicledef.model.model_name',
                'header' => 'Model nomi',
                'filter' => ArrayHelper::map(\app\models\Models::find()->all(), 'model_name', 'model_name'),
            ],
            [
                'attribute' => 'shop_id',
                'value' => function ($data) {
                    return $data->shop->name;
                },
                'filter' => ArrayHelper::map(\app\models\Shops::find()->all(), 'id', 'name'),
            ],
            [
                'attribute' => 'side',
                'value' => function ($data) {
                    if ($data->side == 1) {
                        return "OUT";
                    } elseif ($data->side == 2) {
                        return 'IN';
                    } else {
                        return '';
                    }

                },
                'filter' => [2 => 'IN', 1 => 'OUT'],

            ],
            [
                'attribute' => 'level1_id',
                'value' => function ($data) {
                    return $data->level1->name;
                },
                'filter' => ArrayHelper::map(\app\models\Level1::find()->all(), 'id', 'name'),
            ],
            [
                'attribute' => 'level2_id',
                'value' => function ($data) {
                    return $data->level2->name;
                },
                'filter' => !empty($searchModel->level1_id) ?
                    ArrayHelper::map(\app\models\Level2::find()->where(['level1_id' => $searchModel->level1_id])->all(), 'id', 'name') :
                    ArrayHelper::map(\app\models\Level2::find()->all(), 'id', 'name'),
                'contentOptions' => ['style' => 'white-space: break-spaces; vertical-align: middle;'],
            ],
            [
                'attribute' => 'level3_id',
                'value' => function ($data) {
                    return $data->level3->name;
                },
                'filter' => !empty($searchModel->level2_id) ?
                    ArrayHelper::map(\app\models\Level3::find()->where(['level2_id' => $searchModel->level2_id])->all(), 'id', 'name') :
                    ArrayHelper::map(\app\models\Level3::find()->all(), 'id', 'name'),
            ],
            [
                'attribute' => 'comment',
                'value' => function ($data) {
                    return ($data->comment == null) ? 'Izox yozilmagan' : $data->comment;
                },
                'contentOptions' => ['style' => 'white-space: break-spaces; text-align: center;vertical-align: middle;'],
            ],
            [
                'attribute' => 'defect_id',
                'value' => function ($data) {
                    return $data->def->defect_name;
                },
                'filter' => ArrayHelper::map(\app\models\DefectList::find()->all(), 'id', 'defect_name'),
            ],
            [
                'attribute' => 'status',
                'visible' => (Yii::$app->user->identity->role == 'admin') ? true : false,
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(($data->status == 1) ? "ochiq" : "yopiq", [Yii::$app->controller->id . '/update_shop', 'id' => $data->id], ['class' => ' s_modal']);
                },
                'filter' => ['yopiq', 'ochiq'],
            ],
//            'id',
            [
                'class' => 'yii\grid\ActionColumn',
//                'template' => '{update}  {delete}',
            ],

        ],

    ]); ?>


</div>

    <script src="/themes/AdminLTE-2.4.18/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/themes/sardor_css/js.js"></script>

    <script>
        var w = window.innerWidth;
        // var h = window.innerHeight-190;
        var h = window.innerHeight - 155;
        document.getElementById("w1").style.height = h + "px";
    </script>

<?
Modal::begin([
//    'header' => 'Тўлов мақсади',
    'id' => 'modal',
]);
?>
    <div id="modalContent">

    </div>
<?php
Modal::end();
?>