<?php

class messageDAO {

    public static function getMessages() {
        $messagesArray = array();

        $connex = DatabaseLinker::getConnexion();

        $state = $connex->prepare("SELECT * FROM Messages");
        $state->execute();

        $resultats = $state->fetchAll();

        foreach ($resultats as $result) {
            $messages = new messageDTO();
            $messages->setIdMessage($result["idMessage"]);
            $messages->setContent($result["content"]);
            $messages->setPhoto($result["photo"]);
            $messages->setDateMessage($result["dateMessage"]);
            $messages->setIdUser($result["idUser"]);
            $messages->setIdPost($result["idPost"]);
            $messagesArray[] = $messages;
        }

        return $messagesArray;
    }

    public static function getMessageById($idMessage) {
        $message = null;

        $connex = DatabaseLinker::getConnexion();
        
        $state = $connex->prepare("SELECT * FROM Messages WHERE idMessage = ?");
        $state->execute(array($idMessage));
        $result = $state->fetch();

        if ($result) {
            $message = new messageDTO();
            $message->setIdMessage($idMessage);
            $message->setContent($result["content"]);
            $message->setPhoto($result["photo"]);
            $message->setDateMessage($result["dateMessage"]);
            $message->setIdUser($result["idUser"]);
            $message->setIdPost($result["idPost"]);
        }

        return $message;
    }
}

?>