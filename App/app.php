<?php

class App
{

    private $url = null;

    function __construct()
    {
        $this->init_session();
        $this->init_autoloader();
        $this->filterUrl();
    }

    function init_session()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    function init_autoloader()
    {
        require_once './App/Autoloader.php';
        Autoloader::init();
    }

    function filterUrl()
    {
        /* Limpiando y extrayendo la url */
        $this->url = $_GET["uri"];
        $this->url = rtrim($this->url, "/");
        $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
        $this->url = explode('/', $this->url);
        /* Cargar controlador */
        if (!empty($this->url[0])) {
            $controller = $this->url[0];
        } else {
            $controller = DEFAULT_CONTROLLER;
        }
        $class_controller = $controller . 'Controller';
        if (!class_exists($class_controller)) {
            $controller = DEFAULT_ERROR_CONTROLLER;
            $class_controller = $controller . 'Controller';
        }
        if (!empty($this->url[1])) {
            $method = $this->url[1];
            if (!method_exists($class_controller, $method)) {
                $controller = DEFAULT_ERROR_CONTROLLER;
                $class_controller = $controller . 'Controller';
                $method = DEFAULT_METHOD;
            }
        } else {
            $method = DEFAULT_METHOD;
        }
        $objC = new $class_controller();
        if (!empty($this->url[2])) {
            $params = array_slice($this->url, 2, count($this->url) - 2);
            call_user_func_array([$objC, $method], [$params]);
        } else {
            call_user_func([$objC, $method]);
        }
        return;
    }

    public static function initialize()
    {
        new App();
    }
}
