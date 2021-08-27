<?php

namespace app\controllers;

use app\models\DefectList;
use app\models\Level2;
use app\models\Level3;
use app\models\Models;
use app\models\VehicleDefects;
use app\models\Vehicles;
use Yii;
use yii\base\ErrorException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\NotFoundHttpException;
use GuzzleHttp\Promise\all;
use app\models\User;
use app\models\VehicleDefectsSearch;
use yii\web\UploadedFile;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','manageCountry'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionSum($sort = '', $res = '')
    {
        $session = Yii::$app->session;

        if (!empty($sort)) {
            $asc = $sort;
        } else {
            $asc = 'vd.id';
        }
        if ($asc == 'count') {
            $asc = 'count';
        }


        if (!empty($res)) {
            $session->remove('post');
        }

        $b_id = \Yii::$app->user->identity->branch_id;


        if ($_POST) {
            $session->set('post_s', $_POST);
        }
        $post = $session['post_s'];

        $startDT = ($post['startDT']) ? $post['startDT'] : '2021-01-01';
        $endDT = ($post['endDT']) ? $post['endDT'] : date('yy-m-d');
        $dates = ($post['dates']) ? 'and vd.date like"' . $post['dates'] . '%"' : '';


        $sh_name = ($post['sh_name']) ? 'and sh.name = "' . $post['sh_name'] . '"' : '';
        $model_name = ($post['model_name']) ? 'and m.model_name ="' . $post['model_name'] . '"' : '';
        $defect_name = ($post['defect_name']) ? 'and dl.defect_name ="' . $post['defect_name'] . '"' : '';


        $command = Yii::$app->db->createCommand('
        SELECT  vd.id, sh.name sh_name, m.model_name, dl.defect_name defect_name, l1.name as level1, l2.name as level2, l3.name as level3,
        COUNT(vd.id) as count, Sum(vd.sum) as summ, vd.* from vehicle_defects vd
        left join vehicles v on v.id = vd.vehicle_id
        left JOIN models m on m.id = v.model_id
        left join shops sh on sh.id = vd.shop_id
        left JOIN level_1 as l1 on l1.id=vd.level1_id
        left JOIN level_2 as l2 on l2.id=vd.level2_id
        left JOIN level_3 as l3 on l3.id=vd.level3_id
        left join defect_list dl on dl.id = vd.defect_id
        left join users on users.id = vd.created_by
        where users.branch_id = ' . $b_id . '
        ' . $sh_name . ' ' . $model_name . '' . $defect_name . '
        
        and vd.status = 2
        
        ' . $dates . '
       
        and vd.date between \'' . $startDT . '\' and \'' . $endDT . '\'   
        
        GROUP BY vd.shop_id , vd.defect_id , m.id , vd.level1_id, vd.level2_id  , vd.level3_id
        ORDER BY ' . $asc . ' DESC
        ');
        $model = $command
            ->queryAll();
//        var_dump($model);
//        die();
        return $this->render('sum', [
            'model' => $model,
            'value' => $post
        ]);
//        SELECT vd.id, SUM(TIMESTAMPDIFF(MINUTE,vd.created_at,NOW())) FROM vehicle_defects vd


    }
    public function actionMssql(){
        $select = "
        select COUNT(id)  count from QMPAIN
        ";
        $sasa =  Yii::$app->dbms->createCommand($select)->queryOne();
        var_dump($sasa['count']);
//        return $select->queryAll();
    }

    public function actionHost()
    {

        $b_id = \Yii::$app->user->identity->branch_id;

//        echo date('Ymd', strtotime("-1 day")); die();
//        var_dump($_POST); die();

        if ((isset($_POST)) && ($_POST['startDT'] < $_POST['endDT'])) {
            $startDT_H = str_replace("-", "", $_POST['startDT']);
            $endDT_H = str_replace("-", "", $_POST['endDT']);
//            $range = 'and vd.created_at between "' . $_POST['startDT'] . '" and "' . $_POST['endDT'] . '"';
//            $dates_H =  str_replace("-", "", $_POST['dates']);
//            $dates_H =  'and SANA like"' . str_replace("-", "", $_POST['dates']) . '%"' ;
        } else {
//            $startDT_H = date('Ymd', strtotime("-1 day"));
//            $endDT_H = date('Ymd', strtotime("+1 day"));
            $startDT_H = date('Ym01');
            $endDT_H = date('Ymd');
//            $dates_H = date('Ymd', strtotime("+1 day"));
        }
//        if ((isset($_POST)) && ($_POST['startDT'] < $_POST['endDT'])) {
//            $range = 'and vd.created_at between "' . $_POST['startDT'] . '" and "' . $_POST['endDT'] . '"';
//        }

        $startDT = ($_POST['startDT']) ? $_POST['startDT'] : date('Y-m-01');
        $endDT = ($_POST['endDT']) ? $_POST['endDT'] : date('Y-m-d');

//        $dates = ($_POST['dates']) ? 'and vd.created_at like"' . $_POST['dates'] . '%"' : '';

        $command = Yii::$app->db->createCommand('
        SELECT  m.model_code, m.model_name ,  COUNT(vd.id) as count FROM `vehicle_defects` vd
        LEFT JOIN vehicles v on v.id = vd.vehicle_id
        LEFT join models m on m.id = v.model_id
        left join users on users.id = vd.created_by
        where users.branch_id = ' . $b_id . '
        
         and vd.date between \'' . $startDT . '\' and \'' . $endDT . '\'   
       
        GROUP by m.model_code
        ');
        $model = $command
            ->queryAll();


//       ---------- host connect ----------
        date_default_timezone_set('Asia/Tashkent');
        define('AS400IP', '122.212.243.75'); //GMUZ AS/400 tizimining ip-adresi
        define('AS400PORT', '23'); //GMUZ AS/400 tizimining PORT
//        define('DBNAME','QSYS'); //database name old AS400
        define('DBNAME', 'IASP01'); //database name new AS400
        $dsn = "DRIVER={iSeries Access ODBC Driver};SYSTEM=" . AS400IP . ";PORT=" . AS400PORT . ";DATABASE=" . DBNAME . ";PROTOCOL=TCPIP;USERNAME='';PWD='';";

        $connect = odbc_connect($dsn, 'portal', 'latrop123');

        $QueryMashinaSoni = " SELECT MODEL, SUM( SONI ) MashinaSoni FROM OHSLIB.H06_N_A_PF WHERE SANA between $startDT_H AND $endDT_H ";

        $QueryMashinaSoni = $QueryMashinaSoni . "GROUP BY MODEL ORDER BY MODEL";

        $Res_MashinaSoni = odbc_exec($connect, $QueryMashinaSoni);

//------------------test--------------------------

//        $qu = "SELECT * FROM  NEWSLS.SNPD02PONO WHERE NPD02SANA between 20210201 and 20210202";
//        $tab = odbc_exec($connect, $qu);
//        $m = odbc_fetch_row($tab);
//        print_r(odbc_result($tab));die;
//        while (odbc_fetch_row($tab)){
//            print_r(odbc_fetch_array($tab));
//            echo '<hr>';
//        }
//die;
//------------------test--------------------------


        $com = Yii::$app->db->createCommand('
        SELECT sh.name,  m.model_name , m.model_code,  COUNT(vd.id) as count FROM `vehicle_defects` vd
		LEFT join shops sh on sh.id = vd.shop_id
        LEFT JOIN vehicles v on v.id = vd.vehicle_id
        LEFT join models m on m.id = v.model_id
        left join users on users.id = vd.created_by
        where users.branch_id =' . $b_id . '
        
         and vd.date between \'' . $startDT . '\' and \'' . $endDT . '\' 
       
        GROUP by sh.id, m.id
        order by sh.id DESC
        ');
        $tab = $com
            ->queryAll();
//   $s = array_search('GA',$tab);

//   var_dump($tab); die;

        return $this->render('host', [
            'model' => json_encode($model),
            'connect' => $connect,
            'tab' => $tab,
            'tabl' => json_encode($tab),
            'Res_MashinaSoni' => $Res_MashinaSoni

        ]);
    }


    public function actionDate()
    {
        $model = VehicleDefects::find()->where(['status' =>1])->all();

//        $time = date('H:i:s', strtotime($data->created_at));
//        $d = date('Y-m-d', strtotime($data->created_at));
//        $dd = date('Y-m-d', strtotime($data->created_at. ' - 1 days'));
//        $date = ($time < '08:00:00')? $dd: $d;

//        foreach ($model as $key => $m) {

//            $model->close_status_date = date('Y-m-d H:i:s');
//            $sum = ((strtotime($m->close_status_date ) - strtotime($m->created_at)) /60 ) * $m->def->cost ;
//            $m->sum = $sum;
//            $m->status = 2;
//            var_dump($minut); die();
//            $m->save();

//            $time = date('H:i:s', strtotime($m->created_at));
//
//            $d = date('Y-m-d H:i:s', strtotime($m->created_at . ' +3 min'));
//            $dd = date('Y-m-d', strtotime($m->created_at));
//
//            $m->close_status_date = $d ;
//            $m->date = null;


//            $m->save();
//        }

    }

    public function actionDeffile()
    {

        $session = Yii::$app->session;
        $arr_sess = $session['arr'];
//        $count = count($arr_sess);
//        var_dump($count); die();
        $model = VehicleDefects::find()->where(['in', 'id', $arr_sess])->all();
//        var_dump($model); die();
        $model_new = new VehicleDefects();


        if ($model_new->load(Yii::$app->request->post())) {

            $mo = UploadedFile::getInstance($model_new, 'file');

            $filename = uniqid() . '.' . $mo->extension;

            $mo->saveAs('uploads/' . $filename);

            foreach ($model as $key => $m) {

                $m->file = 'uploads/' . $filename;
                $m->save();
            }


            return $this->redirect(['/vehicle-defects/index']);
        }

//        var_dump($model); die();
        return $this->render('deffile', [
            'model' => $model,
            'model_new' => $model_new
        ]);

    }

    public function actionSessfile()
    {

        $arr = $_GET['arr'];

        $session = Yii::$app->session;

        $session->set('arr', $arr);

        return json_encode($arr);

//        return 'sasasa';
    }

    public function actionDefcount($sort = '', $res = '')
    {
//        var_dump($_POST); die();
        $session = Yii::$app->session;

        if (!empty($sort)) {
            $asc = $sort;
        } else {
            $asc = 'vd.id';
        }
        if ($asc == 'count') {
            $asc = 'count';
        }


        if (!empty($res)) {
            $session->remove('post');
        }

        $b_id = \Yii::$app->user->identity->branch_id;


        if ($_POST) {
            $session->set('post', $_POST);
        }
        $post = $session['post'];

        $startDT = ($post['startDT']) ? $post['startDT'] : '2021-01-01';
        $endDT = ($post['endDT']) ? $post['endDT'] : date('yy-m-d');
        $dates = ($post['dates']) ? 'and vd.date like"' . $post['dates'] . '%"' : '';
        $def = ($post['def']) ? ', vd.defect_id' : '';
        $madel = ($post['model']) ? ', m.id' : '';
//        $defect = ','.$_POST['defect'];
        $l1 = ($post['l1']) ? ', vd.level1_id' : '';
        $l2 = ($post['l2']) ? ', vd.level2_id' : '';
        $l3 = ($post['l3']) ? ', vd.level3_id' : '';

        $sh_name = ($post['sh_name']) ? 'and sh.name = "' . $post['sh_name'] . '"' : '';
        $model_name = ($post['model_name']) ? 'and m.model_name ="' . $post['model_name'] . '"' : '';
        $defect_name = ($post['defect_name']) ? 'and dl.defect_name ="' . $post['defect_name'] . '"' : '';


        $command = Yii::$app->db->createCommand('
        SELECT  vd.id, sh.name sh_name, m.model_name, dl.defect_name defect_name, l1.name as level1, l2.name as level2, l3.name as level3,  COUNT(vd.id) as count, vd.* from vehicle_defects vd
        left join vehicles v on v.id = vd.vehicle_id
        left JOIN models m on m.id = v.model_id
        left join shops sh on sh.id = vd.shop_id
        left JOIN level_1 as l1 on l1.id=vd.level1_id
        left JOIN level_2 as l2 on l2.id=vd.level2_id
        left JOIN level_3 as l3 on l3.id=vd.level3_id
        left join defect_list dl on dl.id = vd.defect_id
        left join users on users.id = vd.created_by
        where users.branch_id = ' . $b_id . '
        ' . $sh_name . ' ' . $model_name . '' . $defect_name . '
        
        ' . $dates . '
       
        and vd.date between \'' . $startDT . '\' and \'' . $endDT . '\'   
        GROUP BY vd.shop_id ' . $def . ' ' . $madel . ' ' . $l1 . '' . $l2 . ' ' . $l3 . '
        ORDER BY ' . $asc . ' DESC
        ');
        $model = $command
            ->queryAll();
//        var_dump($_POST); die();

        return $this->render('defcount', [
            'model' => $model,
            'value' => $post
        ]);
    }

    public function actionDefcountt($sort = '')
    {
        if (!empty($sort)) {
            $asc = $sort;
        } else {
            $asc = 'vd.id';
        }

        $b_id = \Yii::$app->user->identity->branch_id;


        $command = Yii::$app->db->createCommand('SELECT  vd.id, m.model_name, sh.name as tsex, l1.name as level1, l2.name as level2, l3.name as level3, dlist.defect_name, COUNT(vd.id) as d_count
        FROM vehicle_defects vd 
        inner join vehicles v on v.id=vd.vehicle_id
        inner join models m on m.id=v.model_id
        left join shops sh on sh.id=vd.shop_id
        left JOIN level_1 as l1 on l1.id=vd.level1_id
        left JOIN level_2 as l2 on l2.id=vd.level2_id
        left JOIN level_3 as l3 on l3.id=vd.level3_id
        left join defect_list as dlist on dlist.id=vd.defect_id
        join users on users.id = vd.created_by
        where users.branch_id = ' . $b_id . ' 
        GROUP BY m.model_name, vd.shop_id, vd.level1_id, vd.level2_id,vd.level3_id,vd.defect_id  
        ORDER BY ' . $asc . ' ASC');

        $model = $command
            ->queryAll();
        return $this->render('defcount', [
            'model' => $model
        ]);
    }


    public function actionBranch($id, $branch)
    {
        $startDT = ($_POST['startDT']) ? $_POST['startDT'] : '2021-01-01';
        $endDT = ($_POST['endDT']) ? $_POST['endDT'] : date('yy-m-d');
        $vstartDT = $_POST['startDT'];
        $vendDT = $_POST['endDT'];

        $command = Yii::$app->db->createCommand('SELECT * FROM defect_list as table1 join (SELECT vehicle_defects.defect_id as d_id,
         count(vehicle_defects.defect_id) as d_count FROM vehicle_defects join users on users.id = vehicle_defects.created_by 
         WHERE users.branch_id = ' . $id . '  group by vehicle_defects.defect_id ) as table2 on table1.id = table2.d_id order by table2.d_count DESC limit 4');

        $def_array = $command
            ->queryAll();
        $co = Yii::$app->db->createCommand('SELECT shops.id, shops.name, vd.counts FROM shops
        left JOIN ( select vehicle_defects.shop_id, count( vehicle_defects.shop_id) as counts from vehicle_defects
            join users on users.id = vehicle_defects.created_by
            where users.branch_id = ' . $id . '
            and vehicle_defects.date between \'' . $startDT . '\' and \'' . $endDT . '\' 
            group by  vehicle_defects.shop_id 
        ) as vd on shops.id = vd.shop_id');
        $shop_array = $co->queryAll();


        $cosum = Yii::$app->db->createCommand('SELECT * from shops

        left join 
        
        (select vehicle_defects.shop_id as shopid, sum(vehicle_defects.sum) as summ, count( vehicle_defects.defect_id) as count from vehicle_defects
        
        left join users on users.id = vehicle_defects.created_by
        
        left join defect_list on defect_list.id = vehicle_defects.defect_id
        
        where users.branch_id = ' . $id . '  
        and vehicle_defects.date between \'' . $startDT . '\' and \'' . $endDT . '\' 
        GROUP by vehicle_defects.shop_id
        ORDER BY `vehicle_defects`.`shop_id` ASC) as costs
        
        on shops.id = costs.shopid');
        $shopsum_array = $cosum->queryAll();

//        $sum = array_reduce($shopsum_array, function($carry, $item)
//        {
//            return $carry + $item['summ'];
//        });

//        var_dump(array_sum($shopsum_array['sum'])); die();
//        var_dump($sum); die();

        return $this->render('branch', [
            'def_array' => $def_array,
            'shop_array' => $shop_array,
            'branch' => $branch,
            'shopsum_array' => $shopsum_array,
            'vstartDT' => $vstartDT,
            'vendDT' => $vendDT
        ]);
    }

    public $enableCsrfValidation = false;

    public function actionDefectonly()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if ($_POST) {
            if ($_POST['array']['pono']) {

                $pono = substr($_POST['array']['pono'], 0, 6);
            } else {

                $pono = ($_POST['pono']);
            }
            $vehicle = Vehicles::find()->where(['pono' => $pono])->one();
            $vehicle_id = $vehicle->id;
            $defectonly = VehicleDefects::find()->where(['vehicle_id' => $vehicle_id])->all();
//            var_dump($_POST['array']['pono']);
            $jadval = [];
            foreach ($defectonly as $key => $def) {
                array_push($jadval, (object)
                [
                    'id' => $def->id,
                    'model' => $def->vehicledef->model->model_name,
                    'shop' => $def->shop->name,
                    'level1' => $def->level1->name,
                    'level2' => $def->level2->name,
                    'level3' => $def->level3->name,
                    'defect' => $def->def->defect_code . ' ' . $def->def->defect_name,
                    'cost' => $def->def->cost,
                    'side' => ($def->side == 1) ? 'OUT' : (($def->side == 2) ? 'IN' : ''),
                ]);
            }
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'jadval' => $jadval,
//                'response' =>'success'
            ];
        }
        return 'damini ol';
    }

//    public function actionUpdatedef($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['index']);
//        }
//
//        return $this->renderAjax('update_shop', [
//            'model' => $model,
//        ]);
//    }

    public function actionCreatedefman()
    {
        if ($_POST){
            $model = new VehicleDefects();
            $pono = $_POST['pono'];
            $vehicle = Vehicles::find()->where(['pono' => $pono])->one();
            $vehicle_id = $vehicle->id;
            $model->vehicle_id = $vehicle_id;
            $model->shop_id = $_POST['tsex'];
            $model->level1_id = $_POST['levelfirth'];
            $model->level2_id = $_POST['levelsecond'];
            $model->level3_id = $_POST['levelthree'];
            $model->defect_id = $_POST['defect'];
            $model->side = $_POST['side'];
            $model->created_by = Yii::$app->user->identity->id;
            $model->save(false);
            return 'success';

        }
        else return 'zzz';
    }


    public function actionCreatedef()
    {
        $model = new VehicleDefects();
        if ($_POST) {

            $pono = substr($_POST['array']['pono'], 0, 6);
            $vehicle = Vehicles::find()->where(['pono' => $pono])->one();
            $vehicle_id = $vehicle->id;
//            var_dump($vehicle->id); die();
//            var_dump($vehicle_id); die();
            $model->vehicle_id = $vehicle_id;
            $model->shop_id = $_POST['tsex'];
            $model->level1_id = $_POST['levelfirth'];
            $model->level2_id = $_POST['levelsecond'];
            $model->level3_id = $_POST['levelthree'];
            $model->defect_id = $_POST['defect'];
            $model->side = $_POST['side'];
            $model->created_by = Yii::$app->user->identity->id;
            $model->save(false);
//            var_dump($_POST); die();
            if ($model->save()) {

                return 'success';
            }
            return 'no save';
        }
        return 'oh noo';
    }

    public function actionVehiclesmanual()
    {
//        \Yii::$app->response->format = Response::FORMAT_JSON;
//        if ($_POST){
        if ($_POST) {
            $vehicles_has = Vehicles::find()->where(['vin_number' => $_POST['vinno']])->one();
            $vehicles = new Vehicles();
            if (!$vehicles_has) {
                $vehicles->pono = $_POST['pono'];
                $vehicles->vin_number = $_POST['vinno'];
                $vehicles->model_id = $_POST['model_id'];
                $vehicles->save(false);
            }
            return 'success';
        }
        return 'foydasi yoo';

    }

    public function actionVehiclesxorazm()
    {
//        \Yii::$app->response->format = Response::FORMAT_JSON;
//        if ($_POST){
        if ($_POST) {
            $model = Models::find()->where(['model_code'=>$_POST['model']])->one();
            $vehicles_has = Vehicles::find()->where(['vin_number' => $_POST['vinno']])->one();
            $vehicles = new Vehicles();
            if (!$vehicles_has) {
                $vehicles->pono = $_POST['pono'];
                $vehicles->vin_number = $_POST['vinno'];
                $vehicles->model_id = $model->id;
                $vehicles->save(false);
            }
            return 'success';
        }
        return 'foydasi yoo';

    }

    public function actionVehicles()
    {
        if ($_POST) {
            $model_has = Models::find()->where(['model_code' => $_POST['array']['model']])->one();
            $model = new Models();
            $vehicles_has = Vehicles::find()->where(['vin_number' => $_POST['array']['vinno']])->one();
            $vehicles = new Vehicles();
            if (!$model_has) {
                $model->model_code = $_POST['array']['model'];
                $model->model_name = $_POST['array']['model'];
                $model->created_at = date('Y-m-d H:i:s');
                $model->save(false);
            }
            if (!$model_has) {
                $id = $model->id;
            } else {
                $id = $model_has->id;
            }
            if (!$vehicles_has) {
                $vehicles->pono = substr($_POST['array']['pono'], 0, 6);
                $vehicles->vin_number = $_POST['array']['vinno'];
                $vehicles->model_id = $id;
                $vehicles->save(false);
            }
            return 'success';
        }
        return 'oh noo';
    }

    public function actionLevel2($id)
    {
        if ($id) {
            $level2 = Level2::find()
                ->where(['level1_id' => $id])
                ->asArray()
                ->all();
//            var_dump($level2); die();
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return json_encode($level2);
        }
        return 'oh no';
    }

    public function actionLevel3($id)
    {
        if ($id) {
            $level2 = Level3::find()
                ->where(['level2_id' => $id])
                ->asArray()
                ->all();
//            var_dump($level2); die();
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return json_encode($level2);
        }
        return 'oh no';
    }

    public function actionLocation($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $this->enableCsrfValidation = false;
        $countdepartment = Level2::find()->where(['level1_id' => $id])->count();
//        var_dump($countdepartment); die();
        $department = Level2::find()->where(['level1_id' => $id])->orderBy('id DESC')->all();
        if ($countdepartment > 0) {
            echo "<option>танланг ...</option>";
            foreach ($department as $result) echo "<option value='" . $result->id . "'>" . $result->name . "</option>";
        } else {
            echo "<option>-</option>";
        }
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        {
            // user is logged in, he doesn't need to login
            $this->layout = "user-login";
            if (!Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            // get setting value for 'Login With Email'
            $lwe = Yii::$app->params['lwe'];

            // if 'lwe' value is 'true' we instantiate LoginForm in 'lwe' scenario
            $model = $lwe ? new LoginForm(['scenario' => 'lwe']) : new LoginForm();

            // monitor login status
            $successfulLogin = true;

            // posting data or login has failed
            if (!$model->load(Yii::$app->request->post()) || !$model->login()) {
                $successfulLogin = false;
            }

            // if user's account is not activated, he will have to activate it first
            if ($model->status === 0 && $successfulLogin === false) {
                Yii::$app->session->setFlash('error', Yii::t('app',
                    'You have to activate your account first. Please check your email.'));
                return $this->refresh();
            }

            // if user is not denied because he is not active, then his credentials are not good
            if ($successfulLogin === false) {
                return $this->render('login', ['model' => $model]);
            }

            // login was successful, let user go wherever he previously wanted
            return $this->goBack();
        }

    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


}
