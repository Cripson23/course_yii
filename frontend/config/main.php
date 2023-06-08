<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'home/index',
    'language' => 'ru',
    'name' => 'Grocery Store a Ecommerce Online Shopping',
    'layout' => 'grocery',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
            'layout' => 'admin',
            'defaultRoute' => 'main/index'
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'loginUrl' => '/admin/auth/login',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                'category/<id:\d+>/page/<page:\d+>' => 'category/view',
                'category/<id:\d+>' => 'category/view',
                'product/<id:\d+>' => 'product/view',
                'search' => 'category/search',
                'cart/add/<id:\d+>' => 'cart/add'
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,   // не опубликовывать комплект
                    'js' => [
                        'js/jquery-1.11.1.min.js',
                    ]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[
                        '@frontend/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js',
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => ['css/bootstrap461.css'],
                ],
            ],
        ],
        'formatter' => [
            'datetimeFormat' => 'php:d-m-Y H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'RU',
        ],
    ],
    'params' => $params,
];
