<?php

// set environment
require_once(dirname(__FILE__) . '/protected/config/Environment.php');
$env = new Environment();
//$env = new Environment('PRODUCTION'); //override environment here

// set debug and trace level
defined('YII_DEBUG') or define('YII_DEBUG', $env->getDebug());
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', $env->getTraceLevel());

// run Yii app
require_once($env->getYiiPath());
Yii::createWebApplication($env->getConfig())->run();

