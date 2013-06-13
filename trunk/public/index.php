<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
//echo realpath(dirname(__FILE__) . '/../application');
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

defined('DS')
	|| define('DS', DIRECTORY_SEPARATOR);

defined('PS')
	|| define('PS', PATH_SEPARATOR);

defined('WEB_ROOT')
	|| define('WEB_ROOT', dirname(__FILE__));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
    APPLICATION_PATH.'/models',
)));




/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();
	Zend_Loader::loadClass('Zend_Controller_Front');
	Zend_Loader::loadClass('Zend_Registry');
	Zend_Loader::loadClass('Zend_Layout');
	Zend_Loader::loadClass('Zend_View');	
	Zend_Loader::loadClass('Zend_Config_Ini');
	Zend_Loader::loadClass('Zend_Db');
	Zend_Loader::loadClass('Zend_Db_Table');