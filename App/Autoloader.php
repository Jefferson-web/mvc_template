<?php

class Autoloader{

    public static function init(){
        spl_autoload_register([__CLASS__, 'loadClass']);
    }

    static function loadClass($name){
        if(file_exists(ROOT.DS.'controllers'.DS.$name.'.php')){
            require_once ROOT.DS.'controllers'.DS.$name.'.php';
        } else if(file_exists(ROOT.DS.'models'.DS.$name.'.php')){
            require_once ROOT.DS.'models'.DS.$name.'.php';
        }else if (file_exists(ROOT . DS . 'App' . DS . $name . '.php')) {
            require_once ROOT . DS . 'App' . DS . $name . '.php';
        }
    }

}