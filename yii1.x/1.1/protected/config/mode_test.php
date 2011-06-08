<?php

/**
 * Test configuration
 * Usage:
 * - Local website
 * - Local DB
 * - Standard production error pages (404, 500, etc.)
 */


// Set yiiPath (add extra ../../)
//$yiiPath = dirname(__FILE__) . '/../../../yii/framework/yii.php';

// Set YII_DEBUG and YII_TRACE_LEVEL flags
$debug = false;
$traceLevel = 0;


// Set specific config
$configSpecific = array(

    // Application components
    'components' => array(

        // Database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=example_test',
            'username' => 'root',
            'password' => '',
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

        // Fixture Manager for testing
        'fixture' => array(
            'class' => 'system.test.CDbFixtureManager',
        ),

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
                    'levels' => 'error, warning',
                ),
            ),
        ),

    ),

);
