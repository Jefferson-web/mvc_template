<?php

class HomeController extends Controller{

    function __construct(){
        $this->loadModel('home');
    }

    public function index(){
        View::render('home/index');
    }

}