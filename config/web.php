<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'SIMFAK',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'wsOQz_znLLd9EeeouwsIOjSRIlaEklHv',
            'enableCsrfValidation'=>false,
        ],

        'session' => [
                'class' => 'yii\web\Session',
                'name' => 'simpel',
                'savePath' => dirname(__DIR__,2).'/simpel22/session/'

            ],

        'authManager' => [
                'class' => 'yii\rbac\DbManager', // only support DbManager
            ],

         /**   
        'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
             ],
         ],
    ],     
    **/
  
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
           // 'showScriptName' => false,
            'rules' => [
             '<controller:\w+>/<id:\d+>' => '<controller>/view',            
             '<controller:\w+>/<action:\w+>/<id:\d+>/<usr:\d+>' => '<controller>/<action>', 
        ],
        ], */
        


        // iki tambahan

 ],
 //non aktifkan RBAC  
  'as access' => [
             'class' => '\hscstudio\mimin\components\AccessControl',
             'allowActions' => [
                // add wildcard allowed action here!
                'site/*',
                'kandidat/*',
                'user2/*',
                'pegawai/*',
             //   'site/signup',
               // 'debug/*',
             //   'mimin/',
            //    'gii/*',
            //    'pegawai-dinilai/*',
            //    'penilaian/*',
              //  'penilaian-perawat/*',
             //   'penilaian-umum/*',
              //  'penilaian-kpkl/*',
            //    'mimin/user', // only in dev mode
                
            ],
        ],   


    'modules' => [
          /**/  'mimin' => [
                'class' => '\hscstudio\mimin\Module',
            ], 
            'gridview' =>  [
                'class' => '\kartik\grid\Module'
            ], 
            
        ],
        'as beforeRequest' => [
          'class' => 'yii\filters\AccessControl',
           'rules' => [
                [
                    'allow' => true,
                    'actions' => ['login','signup'],
                ], 
                [
                    'allow' => true,
                    'roles' => ['@'],
                ]     
           ]
        ], 
    'params' => $params,
   // 'defaultRoute' => 'site/index',
   // 'defaultRoute' => 'site/login',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
