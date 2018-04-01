<?php

return [
    'id'                  => 'app-api',
    'basePath'            => dirname(__DIR__, 2),
    'bootstrap'           => [],
    'language'            => 'ru-RU',
    'sourceLanguage'      => 'en-US',
    'controllerNamespace' => 'Api\Controller',
    'runtimePath'         => '@Api/runtime',
    'modules'             => [
    ],
    'components'          => [
        'request'      => [
            'enableCsrfValidation' => false,
            'parsers'              => [
                'application/json' => \yii\web\JsonParser::class,
            ],
        ],
        'errorHandler' => [
            'class' => \yii\web\ErrorHandler::class,
        ],
        'urlManager'   => [
            'enablePrettyUrl'     => true,
            'showScriptName'      => false,
            'enableStrictParsing' => true,
            'rules'               => [
                'GET /'      => 'site/index',
                'GET health' => 'site/index',
            ],
        ],
    ],
];
