<?php

namespace app\controllers;

use app\models\DefectList;
use app\models\Level1;
use app\models\Models;
use app\models\Shops;
use app\models\Vehicles;
use Yii;
use app\models\VehicleDefects;
use app\models\VehicleDefectsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * VehicleDefectsController implements the CRUD actions for VehicleDefects model.
 */
class VehicleDefectsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if ((Yii::$app->user->isGuest)) {
            return $this->goHome();
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all VehicleDefects models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $m = VehicleDefects::find()->all();
//        var_dump($m[0]->user->username); die();
        $searchModel = new VehicleDefectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    public function actionDefmanual(){


        $model = new Vehicles();

        $shops = Shops::find()->asArray()->all();
        $level1 = Level1::find()->asArray()->all();
        $defect = DefectList::find()->asArray()->all();
        $defectmodel = DefectList::find()->all();
        $avtomodel = Models::find()->asArray()->all();

//        var_dump($avtomodel); die();
        $deflist = [];
        foreach ($defect as $key => $def) {
            $deflist[] = $def['defect_code'] . ' ' . $def['defect_name'];
        }

        return $this->render('defmanual', [

            'model' => $model,
            'avtomodel' => $avtomodel,
            'shops' => $shops,
            'level1' => $level1,
            'defect' => $defect,
            'defectmodel' => $defectmodel
        ]);


    }

    public function actionDefect()
    {

        $model = new Vehicles();
        if ($model->load(Yii::$app->request->post())) {
//            $mo = Models::find()->all();
//            var_dump($model->pono);
//            Yii::$app->session['pono'] = $model->pono;
            return $this->redirect(['defect', 'pono' => $model->pono, ]);
        }

        $shops = Shops::find()->asArray()->all();
        $level1 = Level1::find()->asArray()->all();
        $defect = DefectList::find()->asArray()->all();
        $defectmodel = DefectList::find()->all();
        $deflist = [];
        foreach ($defect as $key => $def) {
            $deflist[] = $def['defect_code'] . ' ' . $def['defect_name'];
//            echo $def; die();
        }
//        var_dump($deflist); die();

//        $searchModel = new VehicleDefectsSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('defect', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
            'model' => $model,
            'shops' => $shops,
            'level1' => $level1,
            'defect' => $defect,
//            'defect'=>json_encode($deflist),
            'defectmodel' => $defectmodel
        ]);

    }

    public function actionVehicles()
    {
        if ($_POST) {
            return 'success';
        }
        return 'oh noo';
    }

    /**
     * Displays a single VehicleDefects model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new VehicleDefects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VehicleDefects();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VehicleDefects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdate_def($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_by = Yii::$app->user->identity->id;
            $model->save();
//            $pono = Yii::$app->session['pono'];
            return $this->redirect(['defect',
//                'pono' => $pono
            ]);
        }

        return $this->render('update_def', [
            'model' => $model,

        ]);
    }

    public function actionUpdate_shop($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->close_status_date = date('Y-m-d H:i:s');
            $sum = ((strtotime($model->close_status_date ) - strtotime($model->created_at)) /60 ) * $model->def->cost ;
            $model->sum = $sum;
//            var_dump($minut); die();
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->renderAjax('update_shop', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VehicleDefects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VehicleDefects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VehicleDefects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VehicleDefects::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
