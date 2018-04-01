<?php

use Console\ConsoleTarget;
use omnilight\scheduling\Schedule;
use omnilight\scheduling\ScheduleController;
use yii\faker\FixtureController as FakerFixtureController;
use yii\log\FileTarget;

return [
    'id'                  => 'app-console',
    'basePath'            => dirname(__DIR__, 3),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'Console\Controller',
    'runtimePath'         => '@Console/runtime',
    'controllerMap' => [
        'migrate'  => [
            'class'         => \yii\console\controllers\MigrateController::class,
            'migrationPath' => '@Console/etc/migrations',
        ],
    ],
    'components'          => [
        'log'        => [
            'traceLevel'    => YII_DEBUG ? 3 : 0,
            'flushInterval' => 1,
            'targets'       => [
                [
                    'class'      => ConsoleTarget::class,
                    'levels'     => ['error', 'warning', 'info'],
                ],
            ],
        ],
    ],
];
