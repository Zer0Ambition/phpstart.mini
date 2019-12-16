<?php


class Db
{
    public static function getConnection(){
        $paramsPath = ROOT. 'config/db_params.php';
        $params = include($paramsPath);

        $db = PDO("mysql:host={$params['host']},dbname={$params['dbname']}", $params['user'], $params['password']);
        return $db;
    }
}