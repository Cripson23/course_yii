<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AuthAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/adminlte';
    public $css = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        'plugins/fontawesome-free/css/all.min.css',
        'dist/css/adminlte.min.css',
        'main.css',
    ];
    public $js = [
        'plugins/bootstrap/js/bootstrap.bundle.min.js',
        'dist/js/adminlte.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}