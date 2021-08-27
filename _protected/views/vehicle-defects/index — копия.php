<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleDefectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle Defects';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>-->

<style>
    #w5 {
        overflow-x: auto;
    }
</style>

<div class="vehicle-defects-index card">

    <h1><? //= Html::encode($this->title) ?></h1>

    <p>
        <!--        --><? //= Html::a('Create Vehicle Defects', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
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
            'visible' => (Yii::$app->user->identity->role == 'production') ? true : false,
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a(($data->status == 1) ? "ochiq" : "yopiq", [Yii::$app->controller->id . '/update_shop', 'id' => $data->id], ['class' => ' s_modal']);
            },
            'filter' => ['yopiq', 'ochiq'],
        ],

    ];

    echo 'EXCEL ga ko`chirish ' . ExportMenu:: widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns
        ]);
    ?>
    <!--        --><? // var_dump($_GET); die();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{pager}',
        'options' => ['class' => ''],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'created_at',
//            [
//                'attribute' => 'created_at',
//                'value' => function ($data) {
//                    $time = date('H:i:s', strtotime($data->created_at));
//                    $d = date('Y-m-d', strtotime($data->created_at));
//                    $dd = date('Y-m-d', strtotime($data->created_at. ' - 1 days'));
//                    $date = ($time < '08:00:00')? $dd: $d;
////                    return date('H:i:s', strtotime($data->created_at));
//                    return $date;
//                },
//                'filter' => DatePicker::widget([
//                    'model' => $searchModel,
//                    'attribute' => 'created_at',
//                    'language' => 'ru',
//                    'size' => 'ms',
//                    'pluginOptions' => [
//                        'autoclose' => true,
//                        'format' => 'yyyy-mm-dd',
//                    ]
//                ]),
//            ],
//        'id',
            [
                'attribute' => 'date',
                'value' => 'date',
                'header' => 'Defekt qo`shilgan vaqti',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'date',
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
                'attribute' => 'created_at',
//                'header' => 'Vinno',
                'value' => function ($data) {
                    $d = date('H:i:s', strtotime($data->created_at));
//                    return $data->created_at;
//                    return ( ($d < '08:00:00')) ? 'Kechki' : 'Kunduzgi';
                    return ( ($d > '20:00:00') || ($d < '08:00:00')) ? 'Kechki' : 'Kunduzgi';
                },
                'filter' => ['kechki', 'kunduzgi'],
            ],
            [
                'attribute' => 'vinno',
                'header' => 'Vinno',
                'value' => 'vehicledef.vin_number',
            ],
            [
                'attribute' => 'pono',
                'header' => 'Pono',
                'format' => 'raw',
                'contentOptions' => ['style' => 'text-align: center;vertical-align: middle;'],
//                'value' => 'vehicledef.pono',
                'value' => function ($data) {
                    $file = (!empty($data->file)) ?
                        '<a href="/' . $data->file . '" type="button" class="btn btn-default btn-sm">
                         <i class="glyphicon glyphicon-file" style="color: #0E9A00"></i> 
                         <span class="glyphicon glyphicon-download-alt"></span> Download
                         </a>'
                        : '';
                    $id = ((empty($data->file)) && (Yii::$app->user->identity->role == 'production')) ? $data->id : '';
                    return '<div id=' . $id . ' class="myclass"><a>' . $data->vehicledef->pono . '</a> ' . $file . '  </div>';
//                    return $file;
                },
//                'value' => function($data)
//                {
////                    return Html::a(mb_substr($data->detail_purpose_of_payment,0,20).'...',
////                        [Yii::$app->controller->id.'/views','id'=>$data->id],['class'=>'short bank ']);
//                    return Html::a(' <div class="short">' .$data->detail_purpose_of_payment. '</div>',
//                        [Yii::$app->controller->id.'/views','id'=>$data->id],['class'=>' bank']);
//                }
//                'contentOptions' => [
////                    'class' => function ($data) {
////                        return  'myclass my'.$data->id;
////                    },
//                    'class'=>'myclass'
//                ],
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
//                'visible' => ((Yii::$app->user->identity->role == 'controller') || (Yii::$app->user->identity->role == 'admin')) ? true : false,
                'format' => 'raw',
                'value' => function ($data) {

//                    return Html::a(($data->status == 1) ? "ochiq" : "yopiq", [Yii::$app->controller->id . '/update_shop', 'id' => $data->id], ['class' => ' s_modal']);
                    return ($data->status == 2) ? "yopiq" : ((Yii::$app->user->identity->role == 'controller') ?
                        Html::a( "ochiq", [Yii::$app->controller->id . '/update_shop', 'id' => $data->id], ['class' => ' s_modal']) : 'ochiq');
                },
                'filter' => [2=>'yopiq',1=> 'ochiq'],
            ],
            [
                    'attribute' => 'id',
                'header' => 'Oraliq vaqt',
                    'value' => function ($data) {
                        return  ($data->close_status_date)?(strtotime($data->close_status_date) -  strtotime($data->created_at))/60 .' minut' : '';
                    }
            ],
            [
                'attribute' => 'sum',
                'value' => function ($data) {
                    return  ($data->sum)? $data->sum : '';
                }
            ],
//            'sum'
        ],
    ]); ?>
</div>

<script src="/themes/AdminLTE-2.4.18/bower_components/jquery/dist/jquery.min.js"></script>

<script src="/themes/sardor_css/js.js"></script>

<script>
    $(function () {
        var arr = [];
        $('.myclass').click(function () {
            // e.preventDefault();
            var id = parseInt($(this).attr('id'));
            // var a = parseInt("10")
            // var pono = $(this).html();

            $('#' + id).css("background-color", "yellow");
            // $('#'+id).append( "<strong> +</strong>" );
            // $("p").css("background-color", "yellow");

            arr.push(id);
            console.log(arr);

            // $('#'+id).css('text-color': 'red');
            // $( "p" ).append( "<strong>Hello</strong>" );
            // alert(id);
            $.get("/site/sessfile", {arr: arr}, function (res) {
                console.log(res);
            })
        })
    })
</script>
<script>
    var w = window.innerWidth;
    // var h = window.innerHeight-190;
    var h = window.innerHeight - 195;
    document.getElementById("w5").style.height = h + "px";
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
