<?php
ini_set("memory_limit","500M");
set_time_limit(55555);
ini_set('max_execution_time', 0);

define('YII_DEBUG', true);
define('YII_ENV', 'prod');

require(__DIR__ . '/../../yii/vendor/autoload.php');
require(__DIR__ . '/../../yii/vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../yii/common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../yii/common/config/main.php'),
    require(__DIR__ . '/../../yii/common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php')
);

(new yii\web\Application($config))->run();
