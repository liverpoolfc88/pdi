<?php

namespace app\modules\admin\controllers;

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
        if ((Yii::$app->user->isGuest) || (\Yii::$app->user->identity->role != 'admin')) {
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
        $searchModel = new VehicleDefectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionUpdate_shop($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax('update_shop', [
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

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_by = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
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
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
    public function actionDelete($id)
    {
//        $this->findModel($id)->delete();
        $model = VehicleDefects::find()->where(['id'=>$id])->one();

        $model->deleted_at = date('Y-m-d H:i:s');
        $model->deleted_by = Yii::$app->user->identity->id;
        $model->save();


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
