<?php
/*** configuration *****/
ini_set('display_errors','on');
error_reporting(E_ALL);

class MyAutoload {
    
    public static function start() {

        spl_autoload_register(array(__CLASS__, 'autoload'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('HOST', 'http://'.$host.'/Dev/GestVente/');
        define('ROOT', $root.'/Dev/GestVente/');

        define('CONTROLLER', ROOT.'Controllers/');
        define('VIEW', ROOT.'Views/');
        define('MODEL', ROOT.'Models/');
        define('CLASSES', ROOT.'Classes/');
        define('STORAGE', ROOT.'Storage/');

        define('ASSETS', HOST.'Assets/');
        define('STORAGES', HOST.'Storage/');
    }

    public static function autoload($class) {

        if(file_exists(MODEL.$class.'.php')) {
            include_once(MODEL.$class.'.php');
        }
        else if(file_exists(CONTROLLER.$class.'.php')) {
            include_once(CONTROLLER.$class.'.php');
        }
        else if(file_exists(CLASSES.$class.'.php')) {
            include_once(CLASSES.$class.'.php');
        }
    }
}