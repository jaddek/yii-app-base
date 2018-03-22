<?php

if (PHP_SAPI != 'cli') {
    exit('Bootstrap file should be started only from CLI');
}

define('YII_DEBUG', true);
define('YII_ENV', 'test');

require __DIR__ . '/../webserver.php';

runWebServer();

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../env.php';

$dotEnv = new Dotenv\Dotenv(__DIR__ . '/../../');
if (getenv('YII_ENV') !== 'prod') {
    $dotEnv->load();
}

require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../../common/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/etc/config/main.php',
    require __DIR__ . '/../../api/etc/config/main.php',
    require __DIR__ . '/../../console/etc/config/main.php',
    require __DIR__ . '/../../common/etc/config/tests.php'
);

new yii\web\Application($config);
