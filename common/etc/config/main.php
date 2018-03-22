<?php

$basePath = dirname(__DIR__, 3);

Yii::setAlias('Api', $basePath.'/api');
Yii::setAlias('Admin', $basePath.'/admin');
Yii::setAlias('Common', $basePath.'/common');
Yii::setAlias('Console', $basePath.'/console');

return [
    'container'  => require __DIR__.'/container.php',
    'bootstrap'  => ['log'],
    'vendorPath' => dirname(__DIR__).'/vendor',
    'components' => [
        'db' => [
            'class'    => yii\db\Connection::class,
            'dsn'      => env('DB_DSN'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset'  => env('DB_CHARSET'),
        ],
        'user' => [
            'identityClass' => \yii\web\User::class,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params'     => [],
];
