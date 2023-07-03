<?php

class postDAO {

    public static function getPosts() {
        $postsArray = array();

        $connex = DatabaseLinker::getConnexion();

        $state = $connex->prepare("SELECT * FROM Posts");
        $state->execute();

        $resultats = $state->fetchAll();

        foreach ($resultats as $result) {
            $posts = new postDTO();
            $posts->setIdPost($result["idPost"]);
            $posts->setContent($result["content"]);
            $posts->setPhoto($result["photo"]);
            $posts->setDatePost($result["datePost"]);
            $posts->setIdUser($result["idUser"]);
            $postsArray[] = $posts;
        }

        return $postsArray;
    }

    public static function getPostById($idPost) {
        $post = null;

        $connex = DatabaseLinker::getConnexion();
        
        $state = $connex->prepare("SELECT * FROM Posts WHERE idPost = ?");
        $state->execute(array($idPost));
        $result = $state->fetch();

        if ($result) {
            $post = new postDTO();
            $post->setIdPost($idPost);
            $post->setContent($result["content"]);
            $post->setPhoto($result["photo"]);
            $post->setDatePost($result["datePost"]);
            $post->setIdUser($result["idUser"]);
        }

        return $post;
    }
}
?>