<?php

class Connection
{
    
    /**
     * 
     * @var PDO
     */
    private static $_dbInstance;

    /**
     * Constructeur
     */
    protected function __construct()
    {
        if ( is_null(self::$_dbInstance) ) {
            self::$_dbInstance = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }
    }

    /**
     * Appel static au connecteur PDO par  Manager::getInstance()
     * @return PDO
     */
    public static function getInstance() {        
        if ( is_null(self::$_dbInstance) ) {
            new Connection();   
        }
        return self::$_dbInstance;
    }
}

