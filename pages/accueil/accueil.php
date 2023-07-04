<?php
ControllerAccueil::controlURL();
?>
<!doctype html>
<html lang="en">

<body>
<h1>Accueil</h1>

<?php
require_once 'DAO\postDAO.php';
require_once 'DTO\postDTO.php';
require_once 'DAO\userDAO.php';
require_once 'DTO\userDTO.php';
$postDAO = new postDAO();
$listPosts = $postDAO->getPosts();

foreach ($listPosts as $post) {
    $userDAO = new userDAO();
    $user = $userDAO->getUserById($post->getIdUser());
    echo $user->getPhoto()." ";
    echo $user->getPseudo()."<br/>";
    echo $post->getContent()."<br/>";
    if($post->getPhoto() != null)
    {
        echo $post->getPhoto()."<br/>";
    }
    echo $post->getDatePost()."<br/>";
    echo "<br/><br/>";
}
?>
<div class="deconnexionButton">
    <a href="index.php?page=connexion&action=deco">Se déconnecter</a>
</div>

</body>
</html>