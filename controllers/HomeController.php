<?php

class HomeController extends Controller{

    function __construct(){
        $this->loadModel('home');
    }

    public function index(){
        $usuarios = array('Jefferson', 'Ledesma', 'Naupa');
        View::render('home/index', $usuarios);
    }

}