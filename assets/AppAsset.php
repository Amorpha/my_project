<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'public/css/bootstrap.css',
        'public/css/bootstrap-datetimepicker.css',
        'public/css/font-awesome.css',
        'public/css/style.css',
    ];
    public $js = [
	    'public/js/moment-with-locales.js',
        'public/js/bootstrap.js',
        'public/js/bootstrap-datetimepicker.min.js',
        'public/js/bootstrap.file-input.js',
        'public/js/ajaxupload.js',
		'public/js/index.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
