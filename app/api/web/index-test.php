<?php
$_SERVER['REQUEST_ID'] = hash('sha256', json_encode($_SERVER));

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    exit();
}

require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '/../../../env.php';

(new \Dotenv\Dotenv(__DIR__ . '/../../'))->load();

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require __DIR__ . '/../../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../../common/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/etc/config/main.php',
    require __DIR__ . '/../etc/config/main.php',
    require __DIR__ . '/../../common/etc/config/tests.php'
);

(new yii\web\Application($config))->run();
