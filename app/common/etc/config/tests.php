<?php

use Common\EventDispatcher;

Yii::setAlias('app/migrations', __DIR__ . '/../../console/migrations');
Yii::setAlias('tests', __DIR__ . '/../../../../fintech/tests');

return [
    'container'  => [
        'definitions' => [

        ],
    ],
    'components' => [
        'dispatcher' => [
            'class'     => EventDispatcher::class,
            'listeners' => [],
        ],
    ],
];
