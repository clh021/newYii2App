<?php
defined('DEBUG_HOST') or define('DEBUG_HOST', '127.0.0.1,::1'.','.$_SERVER['REMOTE_ADDR']);//.$_SERVER['REMOTE_ADDR']);
// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], explode(',',DEBUG_HOST))) {
    die($_SERVER['REMOTE_ADDR'].'You are not allowed to access this file.');
}

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');//test
require(dirname(dirname(__DIR__)) . '/advanced/vendor/autoload.php');
require(dirname(dirname(__DIR__)) . '/advanced/vendor/yiisoft/yii2/Yii.php');
require(dirname(__DIR__) . '/config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(dirname(__DIR__) . '/config/main.php'),
    require(dirname(__DIR__) . '/config/main-local.php')
);
//$config = require(dirname(dirname(__DIR__)) . '/advanced/tests/codeception/config/newapp/acceptance.php');

(new yii\web\Application($config))->run();
