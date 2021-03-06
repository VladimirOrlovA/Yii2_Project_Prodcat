<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        // Добавляем виджет adminLTE
//        'view' => [
//         'theme' => [
//             'pathMap' => [
//                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
//             ],
//            ],
//        ],
        ////////////////////////////////
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        // Для более удобного отображения пути в адресной строке
        // без r=
        // было - http://admin.prodcat.com/index.php?r=product%2Findex
        // стало - http://admin.prodcat.com/index.php/product/index
        'urlManager' => [
            'enablePrettyUrl' => true, // false - r=
            'showScriptName' => false, // false то без  index.php
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
