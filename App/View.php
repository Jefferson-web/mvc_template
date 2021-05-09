<?php

    class View {

        public static function render($view, $data = null){
            $data = self::toObject($data);
            $path = ROOT.DS.'views'.DS.$view.'.php';
            if(file_exists($path)){
                require_once $path;
            } else {
                die("El archivo $view no existe");
            }
        }

        static function toObject($data){
            return json_decode(json_encode($data));
        }

    }