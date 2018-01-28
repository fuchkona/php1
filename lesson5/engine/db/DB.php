<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 28.01.2018
 * Time: 15:56
 */

namespace db;


class DB
{
    private const HOST = "localhost";
    private const USER = "root";
    private const PASS = "";
    private const DB = "geekbrains";

    private static $connection = null;

    private function __construct()
    {
    }

    public static function getConnection() {
        if (self::$connection) {
            return self::$connection;
        } else {
            return self::$connection = new \mysqli(self::HOST, self::USER, self::PASS, self::DB);
        }
    }

    public static function execute($sql) {
        self::getConnection();
        if ($result = self::$connection->query($sql)) {
            $array_result = [];
            while ($row = $result->fetch_assoc()) {
                $array_result[] = $row;
            }
            $result->close();
            return $array_result;
        }
    }

    public static function insert($sql) {
        self::getConnection();
        self::$connection->query($sql);
    }

    public static function closeConnection() {
        if (self::$connection instanceof \mysqli) {
            self::$connection->close();
            self::$connection = null;
        }
    }
}