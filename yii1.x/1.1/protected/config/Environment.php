<?php

/**
 * Simple class used to set configuration and debugging depending on environment.
 * This allows for a custom Yii path, debugging vars, and config array.
 *
 * Environment is determined by $_SERVER[YII_ENVIRONMENT], created
 * by Apache's SetEnv directive
 * This can be done in the httpd.conf or in a .htaccess file for ease of use.
 * See: http://httpd.apache.org/docs/1.3/mod/mod_env.html#setenv
 *
 *******************************************************************************
 *
 * Index.php usage example:
 *
 * // set environment
 * require_once(dirname(__FILE__) . '/protected/config/Environment.php');
 * $env = new Environment();
 * //$env = new Environment('PRODUCTION'); //override
 *
 * // set debug and trace level
 * defined('YII_DEBUG') or define('YII_DEBUG', $env->getDebug());
 * defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', $env->getTraceLevel());
 *
 * // run Yii app
 * require_once($env->getYiiPath());
 * Yii::createWebApplication($env->getConfig())->run();
 *
 *******************************************************************************
 *
 * Modify your config/main.php like this:
 *
 * // Set yiiPath (add extra ../../)
 * $yiiPath = dirname(__FILE__) . '/../../../yii/framework/yii.php';
 *
 * // Set YII_DEBUG and YII_TRACE_LEVEL flags
 * $debug = true;
 * $traceLevel = 0;
 *
 * // Set config array
 * $config = array(
 *
 *******************************************************************************
 *
 * Create config/mode_<mode>.php files for the different modes
 * These will override or merge attributes
 *
 * // Set yiiPath (add extra ../../)
 * //$yiiPath = dirname(__FILE__) . '/../../../yii/framework/yii.php';
 *
 * // Set YII_DEBUG and YII_TRACE_LEVEL flags
 * $debug = false;
 * $traceLevel = 0;
 *
 * // Set specific config
 * $configSpecific = array(
 *
 *******************************************************************************
 *
 * Usage example for checking environment in code:
 *
 * // Compare if the current environment is lower than production
 * $currentEnvironment = Yii::app()->getParams()->environment; //gets integer
 * if ($currentEnvironment < Environment::PRODUCTION) {
 *     //do this
 * } else {
 *     //do that
 * }
 *
 *******************************************************************************
 *
 * Original sources: http://www.yiiframework.com/doc/cookbook/73/
 *
 * @name Environment
 * @author Marco van 't Wout | Tremani
 * @version 1.0
 * @property string mode the current environment mode
 * @property boolean debug the debug flag
 * @property integer traceLevel the trace level
 * @property string yiiPath path to the Yii framework
 * @property string config the merged config array
 *
 */
class Environment
{

    // $_SERVER[SERVER_VAR]
    const SERVER_VAR = 'YII_ENVIRONMENT';
    const MAIN_CONFIG = 'main.php';

    // Modes
    const DEVELOPMENT = 100;
    const TEST = 200;
    const STAGE = 300;
    const PRODUCTION = 400;
    

    // Current mode
    private $_mode;

    // Environment properties
    private $_debug;
    private $_traceLevel;
    private $_yiiPath;
    private $_config;

    /**
     * Initilizes the Environment class with the given mode
     * @param constant $mode
     */
    function __construct($mode = null)
    {
        $this->_mode = $this->getMode($mode);
        $this->setEnvironment();
    }

    /**
     * Get current environment mode depending on environment variable
     * @param <type> $mode
     * @return <type>
     */
    private function getMode($mode = null)
    {
        // If not overriden
        if (!isset($mode))
        {
            // Return mode based on Apache server var
            if (isset($_SERVER[self::SERVER_VAR]))
                $mode = $_SERVER[self::SERVER_VAR];
            else
                throw new Exception('SetEnv YII_ENVIRONMENT <mode> not defined in Apache config.');
        }

        // Check if mode is valid
        if (!defined('self::' . $mode))
            throw new Exception('Invalid Environment mode');

        return $mode;
    }

    /**
     * Sets the environment and configuration for the chosen mode
     * @param constant $mode
     */
    private function setEnvironment()
    {
        // Load main config
        $configMainFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . self::MAIN_CONFIG;
        if (!file_exists($configMainFile))
            throw new Exception('Cannot find config file "' . $configMainFile . '".');
        require($configMainFile);

        // Load specific config
        $configFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mode_' . strtolower($this->_mode) . '.php';
        if (!file_exists($configFile))
            throw new Exception('Cannot find config file "' . $configFile . '".');
        require($configFile);

        // Merge config arrays into one
        $this->_config = array_merge_recursive($config, $configSpecific);

        // Set other environment vars
        $this->_yiiPath = $yiiPath;
        $this->_debug = $debug;
        $this->_traceLevel = $traceLevel;
        $this->_config['params']['environment'] = constant('self::' . $this->_mode);
    }

    /**
     * Returns the path to the Yii framework
     * @return string
     */
    public function getYiiPath()
    {
        return $this->_yiiPath;
    }

    /**
     * Returns the debug mode for YII_DEBUG
     * @return Bool
     */
    public function getDebug()
    {
        return $this->_debug;
    }

    /**
     * Returns the trace level for YII_TRACE_LEVEL
     * @return int
     */
    public function getTraceLevel()
    {
        return $this->_traceLevel;
    }

    /**
     * Returns the configuration array
     * @return array
     */
    public function getConfig()
    {
        return $this->_config;
    }

}

