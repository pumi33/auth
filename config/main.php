<?php


$params = array_merge(
    require(__DIR__ . '/../../yii/common/config/params.php'),
    require(__DIR__ . '/../../yii/common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);


return [
    'id' => 'app-pumi',
    'basePath' => dirname(__DIR__),
	 // 'vendorPath' => dirname(dirname(__DIR__)) . '../../yii/advanced/vendor',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'pumi\controllers',

    'components' => [

        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '196402503549-eqdg43902ssk1lt0855fp9t5sbkk2uuk.apps.googleusercontent.com',
                    'clientSecret' => 'LJn5n8VMsFFenz1MnXcAlCH0',
                ],
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '562541384089223',
                    'clientSecret' => '72bbd35e53a7b54b7dec81f99272c800',
                ],
                // etc.
            ],
        ],

        'request' => [
            'csrfParam' => '_csrf-pumi',
            'cookieValidationKey' => 'bUfkjxxxxfYGFL:"L046',
        ],
        'user' => [
            'identityClass' => 'pumi\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-pumi', 'httpOnly' => true],
            'loginUrl'=>['/my/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-pumi',
        ],






		 'db' => require(__DIR__ . '/db.php'),
        //  'db2' => require(__DIR__ . '/db2.php'),
        
    ],
	 
    'params' => $params,
	
	
	
];
