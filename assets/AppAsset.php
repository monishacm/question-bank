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
        'css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css',
        'css/custom.css'
    ];
    public $js = [
        'js/bootstrap.min.js',
		'js/fastclick.js',
		'js/nprogress.js',
		'js/jquery.smartWizard.js',
		'js/custom.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
