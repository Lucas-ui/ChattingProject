<?php

class ControllerAccueil
{
    public static function controlURL() {
        if (!isset($_SESSION['idUser'])) {
            header('Location: index.php?page=connexion');
            exit;
        }
    }
    public static function includeView()
    {
        include("pages/accueil/accueil.php");
    }

    function __construct()
    {
        ControllerAccueil::includeView();
    }

}

