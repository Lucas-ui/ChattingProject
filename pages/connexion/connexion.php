<!DOCTYPE html>
<html lang="fr">
<body>
<link rel="stylesheet" href="pages/connexion/assets/css/connexion.css">
<form method="post" action="index.php?page=connexion" name="login_form" class="div_connexion">
    <div class="fieldset_connexion">
        <div>
            <label for="login">Email</label>
        </div>
        <div>
            <input type="text" name="email" class="input_login" required>
        </div>
        <div>
            <label for="idPassword">Mot de passe</label>
        </div>
        <div>
            <input type="password" name="pass" class="input_password" required>
        </div>
        <div>
            <input type="submit" value="Connexion" class="button">
        </div>
        <div>
            <a class="button button_inscription" href="index.php?page=inscription">Inscription</a>
        </div>
    </div>
</form>
</body>
</html>