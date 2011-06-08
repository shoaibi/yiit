<?php

/**
 * Development configuration
 * Usage:
 * - Local website
 * - Local DB
 * - Show all details on each error.
 * - Gii module enabled
 */


// Set yiiPath (add extra ../../)
//$yiiPath = dirname(__FILE__) . '/../../../yii/framework/yii.php';

// Set YII_DEBUG and YII_TRACE_LEVEL flags
$debug = true;
$traceLevel = 3;


// Set specific config
$configSpecific = array(

    // Modules
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'password',
        ),
    ),

    // Application components
    'components' => array(

        // Main Database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=example',
            'username' => 'root',
            'password' => '',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ),
        
        /*
         // Auth Database
        'authDb' => array(
            'connectionString' => 'mysql:host=localhost;dbname=example',
            'username' => 'root',
            'password' => '',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ),
         */ 
        
        /*
         // Session Database
        'sessionDb' => array(
            'connectionString' => 'mysql:host=localhost;dbname=example',
            'username' => 'root',
            'password' => '',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ),
         */
         


        // Application Log
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                // Save log messages on file
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning, trace, info',
                ),
                // Show log messages on web pages
                array(
                    'class' => 'CWebLogRoute',
                    //'categories' => 'system.db.CDbCommand',
                    'levels' => 'error, warning, trace, info',
                    //'showInFireBug' => true,
                ),
            ),
        ),

    ),

);
