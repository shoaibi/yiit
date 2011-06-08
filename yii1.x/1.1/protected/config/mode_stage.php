<?php

/**
 * Stage configuration
 * Usage:
 * - Online website
 * - Production DB
 * - All details on error
 */


// Set yiiPath (add extra ../../)
//$yiiPath = dirname(__FILE__) . '/../../../yii/framework/yii.php';

// Set YII_DEBUG and YII_TRACE_LEVEL flags
$debug = true;
$traceLevel = 0;


// Set specific config
$configSpecific = array(

    // Application components
    'components' => array(

        // Database
        'db' => array(
            'connectionString' => 'mysql:host=STAGING_HOST;dbname=STAGING_DBNAME',
            'username' => 'USERNAME',
            'password' => 'PASSWORD',
        ),
        
        /*
         // Auth Database
        'authDb' => array(
            'connectionString' => 'mysql:host=localhost;dbname=example',
            'username' => 'root',
            'password' => '',
        ),
         */
        
        /*
        // Session Database
        'sessionDb' => array(
            'connectionString' => 'mysql:host=localhost;dbname=example',
            'username' => 'root',
            'password' => '',         
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
            ),
        ),

    ),

);
