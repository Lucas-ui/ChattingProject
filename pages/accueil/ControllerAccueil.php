<?php

class ControllerAccueil
{
    public static function includeView()
    {
        include("pages/accueil/accueil.php");
    }

    function __construct()
    {
        ControllerAccueil::includeView();
    }

}

