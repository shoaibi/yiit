<?php

/**
 * Production configuration
 * Usage:
 * - online website
 * - Production DB
 * - Standard production error pages (404,500, etc.)
 */


// Set yiiPath (add extra ../../)
//$yiiPath = dirname(__FILE__) . '/../../../yii/framework/yii.php';

// Set YII_DEBUG and YII_TRACE_LEVEL flags
$debug = false;
$traceLevel = 0;


// Set specific config
$configSpecific = array(
    
    // Preloading 'log' and ids component
    'preload' => array('log', 'ids'),


    // Application components
    'components' => array(

        // Main Database
        'db' => array(
            'connectionString' => 'mysql:host=PRODUCTION_HOST;dbname=PRODUCTION_DBNAME',
            'username' => 'USERNAME',
            'password' => 'PASSWORD',
        ),
        
               
        // Database used for logging
        /*
        'logDb' => array(
            'connectionString' => 'mysql:host=PRODUCTION_HOST;dbname=PRODUCTION_DBNAME',
            'username' => 'USERNAME',
            'password' => 'PASSWORD',
        ),
        */
        
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
        
         'ids'=>array(            
            'class'=>'application.components.ids.CPhpIds',
            'genericMessage'=>'Critical Error!!!',
            'callback'=>create_function('',"echo 'Critical Error!!!'; Yii::app()->end(); return false;"),
            'enable' => true,
            // Or define a function
            //'enable'=>create_function('','return $_GET["r"] != "site/contact";'),
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
                // Send errors via email to the system admin specified in main.php
                array(
                    'class' => 'CEmailLogRoute',
                    'levels' => 'error, warning',
                    'emails' => 'logs@example.com', 
                    // this gives "Fatal error: Class 'Yii' not found" for some reason
                    //'emails' => Yii::app()->params['logsEmail'],
                ),
                //Log errors in a db
                /*
                array(
                    'class' => 'CDbLogRoute',
                    'levels' => 'error, warning',                    
                    'autoCreateLogTable' => true,
                    'connectionID' => 'logDb', 
                    'logTableName' => 'YiiLog',               
                )                  
                */
            ),
        ),

    ),

);
