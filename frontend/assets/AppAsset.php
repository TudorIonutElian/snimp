<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/plugins/fontawesome-free/css/all.min.css',
        'css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        'css/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'css/plugins/jqvmap/jqvmap.min.css',
        'css/plugins/adminlte/adminlte.min.css',
        'css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
        'css/plugins/daterangepicker/daterangepicker.css',
    ];
    public $js = [
        'js/plugins/custom/main.js',
        'js/plugins/jquery-ui/jquery-ui.min.js',
        'js/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'js/plugins/jqvmap/jquery.vmap.min.js',
        'js/plugins/adminlte/adminlte.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
}
