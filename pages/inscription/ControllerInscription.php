<?php
Class ControllerInscription {
    public static function includeView() {
        include("pages/inscription/inscription.php");
    }

    function __construct() {
        ControllerInscription::includeView();
    }

    public static function inscription() {
        if (!empty($_POST["email"]) && !empty($_POST["pass"])) {
            $pseudo = htmlspecialchars($_POST["pseudo"], ENT_QUOTES);
            $email = htmlspecialchars($_POST["email"], ENT_QUOTES);
            $birthdate = htmlspecialchars($_POST["birthdate"], ENT_QUOTES);
            $password = htmlspecialchars($_POST["pass"], ENT_QUOTES);
            $createdAt = date('Y-m-d');
            $photo = 'default_image.png';
            $connex = DatabaseLinker::getConnexion();
            $state = $connex->prepare('INSERT INTO users (pseudo, email, photo, birthdate, pass, createdAt) VALUES (?, ?, ?, ?, SHA2(?, 256), ?)');
            $state->execute(array($pseudo, $email, $photo, $birthdate, $password, $createdAt));
            header('Location: index.php?page=connexion');
        }
    }
}

?>