<?php

class database
{
    private static $hostname = 'localhost';
    private static $db_name = 'msst';
    private static $username = 'root';
    private static $password = '';
    private static $connection;

    public static function connect()
    {
        if (self::$connection == null) {
            try {
                self::$connection = new PDO("mysql:host=" . self::$hostname . ";dbname=" . self::$db_name, self::$username, self::$password);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }

    public static function disconnect()
    {
        self::$connection = null;
    }
    
}