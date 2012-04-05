<?php
define('ZF_PATH', '../../lib/'); // define Zend Framework path

if (realpath(ZF_PATH) === false) {
    throw new Exception("Zend Framework library not found. Wrong path specified");
}

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    ZF_PATH,
    realpath('../'),
    get_include_path(),
)));

require_once 'Zend/Application/Module/Autoloader.php';
$autoloader = new Zend_Application_Module_Autoloader(array(
	'namespace' => '',
	'basePath' => dirname(__FILE__)
));