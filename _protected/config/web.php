<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'PDI',
    'timeZone' => 'Asia/Tashkent',
//    'charset'=>'UTF-8',
    'language' => 'en',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'app\components\Aliases'],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'main',
            'defaultRoute' => 'vehicle-defects/index',
        ],
        'gridview' => [
            'class' => 'kartik\grid\Module' ,
            // другие настройки модуля
        ]
    ],
    'components' => [
        'ad' =>[
            'class' => 'Edvlerblog\Adldap2\Adldap2Wrapper',
            'providers' => [
                'default' => [
                    'autoconnect' => true,
                    'config' => [
                        'hosts'    => ['10.142.62.246', '10.142.62.247'],
                        'base_dn'               => 'DC=AD,DC=UZAUTOMOTORS,DC=COM',
                        'username'        => 'bitrix_sync',
                        'password'        => 'Bs123456789',
                        'port'                  => '3268',
                    ]
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fbdbfgbfgbgfnfgnfsgnfgnfgng',
        ],
        // you can set your theme here - template comes with: 'light' and 'dark'
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@webroot/themes/light/views'],
                'baseUrl' => '@web/themes/light',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                // we will use bootstrap css from our theme
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [], // do not use yii default one
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<alias:\w+>' => 'site/<alias>',
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'authTimeout' => 3600,
        ],
//        'user' => [
//            'identityClass' => 'app\models\UserIdentity',
//            'enableAutoLogin' => true,
//        ],
        'session' => [
            'class' => 'yii\web\Session',
            'savePath' => '@app/runtime/session'
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. 
            // You have to set 'useFileTransport' to false and configure a transport for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/translations',
                    'sourceLanguage' => 'en',
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/translations',
                    'sourceLanguage' => 'en'
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = ['class' => 'yii\debug\Module'];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = ['class' => 'yii\gii\Module'];
}

return $config;
