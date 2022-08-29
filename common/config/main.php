<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],

    'as access' => [
     'class' => '\hscstudio\mimin\components\AccessControl',
     'allowActions' => [
        // add wildcard allowed action here!
        'site/*',
        'debug/*',
        'mimin/*', // only in dev mode
            ],
        ],

                'modules' => [
            'mimin' => [
                'class' => '\hscstudio\mimin\Module',
            ],
            
        ],

                'components' => [
            'authManager' => [
                'class' => 'yii\rbac\DbManager', // only support DbManager
            ],
        ],


    
];
