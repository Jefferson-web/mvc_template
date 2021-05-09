<?php

class DB
{
    private static $objInstance;
    private static $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ];

    public static function getInstance(){
        if(!self::$objInstance){
            try {
                self::$objInstance = new PDO(DB_DSN, DB_USER, DB_PASSWORD, self::$options);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$objInstance;
    }
    
}
