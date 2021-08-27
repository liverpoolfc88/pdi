<?php

namespace app\modules\admin\controllers;
use Yii;
class IndexController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (!(Yii::$app->user->isGuest) || (\Yii::$app->user->identity->role != 'admin')){

        return $this->render('index');
        }
        return $this->goHome();
    }

}
