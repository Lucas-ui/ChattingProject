<?php

class DatabaseLinker
{
    private static $connex = 'mysql:host=localhost; dbname=chatting_project; charset=utf8';
    private static $user = "root";
    private static $mdp = "";
    private static $connect;

    public static function getConnexion()
    {
        if (DatabaseLinker::$connect === null) {
            DatabaseLinker::$connect = new PDO(DatabaseLinker::$connex, DatabaseLinker::$user, DatabaseLinker::$mdp);
            return DatabaseLinker::$connect;
        }
        return DatabaseLinker::$connect;
    }
}