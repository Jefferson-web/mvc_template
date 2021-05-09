<?php

class Controller {

    public function loadModel($name){
        $class_model = $name.'Model';
        $this->model = new $class_model();
    }

}