<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.02.2018
 * Time: 20:30
 */

namespace engine\classes;


class DB
{
    private static $HOST = 'localhost';
    private static $USER = 'root';
    private static $PASS = '';
    private static $DB = 'nikmarket';

    private static $connection;

    private function __construct()
    {
    }

    /**
     * @param $sql
     * @param array $params - array(array('s', String), array('i', Integer), array('d', Double), ...)
     * @return null
     */
    public static function insert($sql, $params = []) {
        self::open();
        if ($stmt = self::$connection->prepare($sql)) {
            $types = '';
            $new_params = [];
            foreach ($params as $param) {
                $types .= $param[0];
                $new_params[] = &$param[1];
            }
            call_user_func_array([$stmt, "bind_param"], array_merge([$types], $new_params));
            $stmt->execute();
            $id = $stmt->insert_id;
            $stmt->close();
            return $id;
        }
        return null;
    }

    /**
     * @param $sql
     * @param array $params - array(array('s', String), array('i', Integer), array('d', Double), ...)
     * @return array
     */
    public static function select($sql, $params = []) {
        self::open();
        $array = [];
        if ($stmt = self::$connection->prepare($sql)) {
            foreach ($params as $param) {
                $stmt->bind_param($param[0], $param[1]);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $array[] = $row;
            }
            $stmt->close();
        }
        return $array;
    }

    private static function open() {
        if (self::$connection instanceof \mysqli) {
            return self::$connection;
        }
        return self::$connection = new \mysqli(self::$HOST, self::$USER, self::$PASS, self::$DB);
    }

    public static function close() {
        if (self::$connection instanceof \mysqli) {
            self::$connection->close();
            self::$connection = null;
        }
    }
}