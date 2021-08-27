<?php
/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);

$controlleraction = Yii::$app->controller->action->id;
$action = Yii::$app->controller->id;
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!--    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>-->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--<div style="background-color: #e5e5e5 " class="wrap">-->
<div style="background-color: #e5e5e5 " class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('app', Yii::$app->name) . '-' . Yii::$app->user->identity->branchuser->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    // everyone can see Home page
    $menuItems[] = ['label' => Yii::t('app', 'Asosiy'), 'url' => ['/site/index']];
    if (!Yii::$app->user->isGuest) {
    $menuItems[] = [
        'label' => 'Menu',
        'items' => [
            [
                'label' => Yii::t('app', 'Hisobot'),
                'url' => ['/site/defcount']
//                'visible' => Yii::$app->user->can(\modules\rbac\models\Permission::PERMISSION_VIEW_ADMIN_PAGE),
            ],
            [
                'label' => Yii::t('app', 'Ko`rsatkich'),
                'url' => ['/site/host']
//                'visible' => Yii::$app->user->can(\modules\rbac\models\Permission::PERMISSION_VIEW_ADMIN_PAGE),
            ],
            [
                'label' => Yii::t('app', 'Sum'),
                'url' => ['/site/sum']
//                'visible' => Yii::$app->user->can(\modules\rbac\models\Permission::PERMISSION_VIEW_ADMIN_PAGE),
            ],
            [
                'label' => Yii::t('app', 'Umumiy defektlar'),
                'url' => ['/vehicle-defects/index']
//                'visible' => Yii::$app->user->can(\modules\rbac\models\Permission::PERMISSION_VIEW_ADMIN_PAGE),
            ],
        ]
    ];
    }


    // we do not need to display About and Contact pages to employee+ roles
    if (!Yii::$app->user->can('employee')) {
//        $menuItems[] = ['label' => Yii::t('app', 'Vehicles'), 'url' => ['/vehicles/index']];
//        if (!Yii::$app->user->isGuest) {
//            $menuItems[] = [
//                'label' => Yii::t('app', 'Umumiy defektlar'), 'url' => ['/vehicle-defects/index']
//            ];
//            $menuItems[] = ['label' => Yii::t('app', 'Hisobot'), 'url' => ['/site/defcount']];
//            $menuItems[] = ['label' => Yii::t('app', 'Ko`rsatkich'), 'url' => ['/site/host']];
//            $menuItems[] = ['label' => Yii::t('app', 'Sum'), 'url' => ['/site/sum']];
//        $menuItems[] = ['label' => Yii::t('app', 'Ko`rsatkich'), 'url' => ['/site/host']];
//        }
//        if ((Yii::$app->user->identity->role == 'admin') || (Yii::$app->user->identity->role == 'controller')) {
        if ((Yii::$app->user->identity->role == 'admin') || (Yii::$app->user->identity->role == 'controller')) {
            if ((Yii::$app->user->identity->branch_id == 1) || (Yii::$app->user->identity->role == 'admin')) {

                $menuItems[] = ['label' => Yii::t('app', 'Defekt kiritish(Asaka)'), 'url' => ['/vehicle-defects/defect']];

            }
            if ((Yii::$app->user->identity->branch_id == 3) || (Yii::$app->user->identity->role == 'admin')) {

                $menuItems[] = ['label' => Yii::t('app', 'Defekt kiritish(Xorazm)'), 'url' => ['/vehicle-defects/defectxorazm']];
            }
            if ((Yii::$app->user->identity->branch_id == 2) || (Yii::$app->user->identity->role == 'admin') ) {

                $menuItems[] = ['label' => Yii::t('app', 'Defekt kiritish(Angren)'), 'url' => ['/vehicle-defects/defmanual']];
            }
        }

//        $menuItems[] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']];
    }

    // display Users to admin+ roles
    //    if (Yii::$app->user->can('admin')){
    if (Yii::$app->user->identity->role == 'admin') {
//        $menuItems[] = ['label' => Yii::t('app', 'Users'), 'url' => ['/user/index']];
        $menuItems[] = ['label' => Yii::t('app', 'Admin'), 'url' => ['/admin/vehicle-defects']];
    }

    // display Logout to logged in users
    if (!Yii::$app->user->isGuest) {
        $menuItems[] = [
            'label' => Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }

    // display Signup and Login pages to guests of the site
    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
        $menuItems[] = ['label' => Yii::t('app', 'Kirish'), 'url' => ['/site/login']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
    <!--    <div style="padding: 70px 20px 0 20px" class="-->
    <? //=($action == 'vehicle-defects' && $controlleraction == 'index')? 'container-fluid': 'container'?><!--">-->
    <div style="padding: 70px 20px 0 20px" class="container-fluid">
        <!--        --><? //= Breadcrumbs::widget([
        //            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        //        ]) ?>
        <!--        --><? //= Alert::widget() ?>
        <!--        --><? //=Yii::$app->controller->renderPartial("//layouts/header")?>
        <?= $content ?>
    </div>
</div>

<!--<footer class="footer">-->
<!--    <div class="container">-->
<!--        <p class="pull-left">&copy; --><? //= Yii::t('app', Yii::$app->name) ?><!-- -->
<? //= date('Y') ?><!--</p>-->
<!--        <p class="pull-right">--><? //= Yii::powered() ?><!--</p>-->
<!--    </div>-->
<!--</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
