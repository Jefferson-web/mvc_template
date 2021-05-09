<?php

    class View {

        public static function render($view){
            $path = ROOT.DS.'views'.DS.$view.'.php';
            if(file_exists($path)){
                require_once $path;
            } else {
                die("El archivo $view no existe");
            }
        }

    }