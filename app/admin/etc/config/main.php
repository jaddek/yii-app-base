<?php

return [
    'id'                  => 'app-admin',
    'basePath'            => dirname(__DIR__,2),
    'bootstrap'           => [],
    'language'            => 'ru-RU',
    'sourceLanguage'      => 'en-US',
    'controllerNamespace' => 'Admin\Controller',
    'runtimePath'         => '@Admin/runtime',
    'modules'             => [
    ],
    'components'          => [
        'urlManager'   => [
            'enablePrettyUrl'     => true,
            'showScriptName'      => false,
            'enableStrictParsing' => true,
            'rules'               => [
                '/' => 'site/index',
            ],
        ],
    ],
];
