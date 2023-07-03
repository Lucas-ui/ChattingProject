<?php
class userDAO {
    
    public static function getUsers() {
        $usersArray = array();

        $connex = DatabaseLinker::getConnexion();

        $state = $connex->prepare("SELECT * FROM Users");
        $state->execute();

        $resultats = $state->fetchAll();

        foreach ($resultats as $result) {
            $user = new userDTO();
            $user->setIdUser($result["idUser"]);
            $user->setPseudo($result["pseudo"]);
            $user->setEmail($result["email"]);
            $user->setPass($result["pass"]);
            $user->setPhoto($result["photo"]);
            $user->setBirthdate($result["birthdate"]);
            $user->setStatus($result["status"]);
            $user->setDescription($result["description"]);
            $user->setIsAdmin($result["isAdmin"]);
            $user->setCreatedAt($result["createdAt"]);
            $usersArray[] = $user;
        }

        return $usersArray;
    }

    public static function getUserById($idUser) {
        $user = null;

        $connex = DatabaseLinker::getConnexion();
        
        $state = $connex->prepare("SELECT * FROM Users WHERE idUser = ?");
        $state->execute(array($idUser));
        $result = $state->fetch();

        if ($result) {
            $user = new userDTO();
            $user->setIdUser($idUser);
            $user->setPseudo($result["pseudo"]);
            $user->setEmail($result["email"]);
            $user->setPass($result["pass"]);
            $user->setPhoto($result["photo"]);
            $user->setBirthdate($result["birthdate"]);
            $user->setStatus($result["status"]);
            $user->setDescription($result["description"]);
            $user->setIsAdmin($result["isAdmin"]);
            $user->setCreatedAt($result["createdAt"]);
        }

        return $user;
    }
}
?>