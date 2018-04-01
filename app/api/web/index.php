<?php
$_SERVER['REQUEST_ID'] = hash('sha256', json_encode($_SERVER));

require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '/../../../env.php';

$dotEnv = new Dotenv\Dotenv(__DIR__ . '/../../../');
if (getenv('YII_ENV') !== 'prod') {
    $dotEnv->load();
}

defined('YII_DEBUG') or define('YII_DEBUG', (bool)env('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', env('YII_ENV'));

require __DIR__ . '/../../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../../common/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/etc/config/main.php',
    require __DIR__ . '/../etc/config/main.php'
);

(new yii\web\Application($config))->run();
