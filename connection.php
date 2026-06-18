<?php

class Database
{
    public static $connection;

    public static function setUpConnection()
    {
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost", "root", "06dracilla28?", "campushub", "3306");
        }
    }

    public static function iud($q) {  //Insert,Update,Delete

        Database::setUpConnection();
        Database::$connection->query($q);
        if (Database::$connection->error) {
            error_log(Database::$connection->error);
            echo Database::$connection->error;
        }
        return Database::$connection->affected_rows > 0;
    }

    public static function search($q) {  //Search
        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}
