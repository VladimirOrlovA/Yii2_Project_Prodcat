<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../../yii2_prodcat/vendor/autoload.php';
require __DIR__ . '/../../yii2_prodcat/vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../../yii2_prodcat/common/config/bootstrap.php';
require __DIR__ . '/../../yii2_prodcat/backend/config/bootstrap.php';


$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../yii2_prodcat/common/config/main.php',
    require __DIR__ . '/../../yii2_prodcat/common/config/main-local.php',
    require __DIR__ . '/../../yii2_prodcat/backend/config/main.php',
    require __DIR__ . '/../../yii2_prodcat/backend/config/main-local.php'
);

(new yii\web\Application($config))->run();
