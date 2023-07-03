<?php

class ControllerConnexion
{
    function __construct()
    {
        if (!empty($_POST['email']) && !empty($_POST['pass'])) {
            $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
            $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
            if ($this->authenticate($email, $pass)) {
                $this->redirectUser();
            }
        } else if (isset($_GET['action']) && $_GET['action'] == "deco") {
            $this->deconnexion();
        }
        $this->includeView();
    }

    public static function includeView()
    {
        include("pages/connexion/connexion.php");
    }

    public static function authenticate($email, $password)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("SELECT * FROM users WHERE email=? AND pass=SHA2(?,256)");
        $state->execute(array($email, $password));
        $result = $state->fetchAll();
        foreach ($result as $lineResultats) {
            if ($state->rowCount() === 1) {
                $_SESSION['idUser'] = $lineResultats['idUser'];
                $_SESSION['isAdmin'] = $lineResultats['isAdmin'];
                return true;
            } else {
                return false;
            }
        }
    }


    public static function redirectUser()
    {
        header('Location: index.php?page=accueil');
        exit;
    }

    public function deconnexion()
    {
        session_unset();
        session_destroy();
        header('Location: index.php?page=accueil');
    }

}