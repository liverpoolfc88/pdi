<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Nenad Zivkovic <nenad@freetuts.org>
 *
 * @since 2.0
 */
class BaseAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';

    public $css = [
//        'themes\AdminLTE-2.4.18\bower_components\bootstrap\dist\css\',
        '/themes/AdminLTE-2.4.18/bower_components/bootstrap/dist/css/bootstrap.min.css',
        '/themes/sardor_css/css.css',

        'css/style.css',

    ];

    public $js = [
        '/themes/sardor_css/js.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
//https://www.w3schools.com/colors/colors_picker.asp?colorhex=1E90FF