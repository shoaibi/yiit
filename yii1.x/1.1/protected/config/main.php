<?php

/**
 * Main configuration
 * This file should contain $yiiPath, $debug, $traceLevel and $config
 * These properties can be overridden or merged in mode_<mode>.php files
 */


// Set yiiPath (add extra ../../)
$yiiPath = dirname(__FILE__) . '/../../../../../yii/framework/yii.php';

// YiiLite, for better performance
// If you enable this, make sure to turn PHP-APC,
// more at http://www.php.net/manual/en/book.apc.php
// $yiiPath = dirname(__FILE__) . '/../../../../../yii/framework/yiilite.php';

// Set YII_DEBUG and YII_TRACE_LEVEL flags
$debug = true;
$traceLevel = 0;

// Set config array
$config = array(

    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Application',
    'theme' => 'classic', //override in config/mode_<mode>.php

    // Preloading 'log' component
    'preload' => array('log'),

    // Autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
    ),    
    
    // Application components
    'components' => array(
        
        // Request related configs
        'request'=>array(
            'enableCsrfValidation' => true,
            'enableCookieValidation' => true,
        ), 


        // User
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('site/login'),
        ),

        // uncomment the following to enable URLs in path-format        
          'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        

        // Error handler
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),

        // Main Database
        'db' => array(
            'connectionString' => '', //override in config/mode_<mode>.php
            'emulatePrepare' => true,
            'username' => '', //override in config/mode_<mode>.php
            'password' => '', //override in config/mode_<mode>.php
            'charset' => 'utf8',
            // Used for better performance with Active Records
            // Cache DB Schema for 7 days
            'schemaCachingDuration' => 60*60*24*7,
        ),
        
        /*
        // Auth Database
        'authDb' => array(
            'connectionString' => '', //override in config/mode_<mode>.php
            'emulatePrepare' => true,
            'username' => '', //override in config/mode_<mode>.php
            'password' => '', //override in config/mode_<mode>.php
            'charset' => 'utf8',
            // Used for better performance with Active Records
            // Cache DB Schema for 7 days
            'schemaCachingDuration' => 60*60*24*7,
        ),
        */
                
        
        /*
        // Session Database
        'sessionDb' => array(
            'connectionString' => '', //override in config/mode_<mode>.php
            'emulatePrepare' => true,
            'username' => '', //override in config/mode_<mode>.php
            'password' => '', //override in config/mode_<mode>.php
            'charset' => 'utf8',
            // Used for better performance with Active Records
            // Cache DB Schema for 7 days
            'schemaCachingDuration' => 60*60*24*7,
        ),
        */
        
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            // Use a separate db for auth
            // 'connectionID'=>'authDb',
        ),
        
        
        'cache'=>array(
            // Use dummy cache for now
            'class' => 'CDummyCache',
            /*
            // Enable Memcache
            'class'=>'CMemCache',            
            'servers'=>array(
                array(
                    'host'=>'server1',
                    'port'=>11211,
                    'weight'=>60,
                ),
                array(
                    'host'=>'server2',
                    'port'=>11211,
                    'weight'=>40,
                ),
             */ 
             
            ),

    ),

    // Application-level parameters that can be accessed using Yii::app()->params['paramName']
    'params' => array(
        'adminEmail' => 'admin@example.com',
        'logsEmail' => 'logs@example.com',
        // separate domain to access static content from
        // You can also use the CDN plugin
        'staticContentDomain' => 'http://static.example.com',
    ),

);
