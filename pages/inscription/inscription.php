<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="pages/inscription/assets/css/inscription.css">
</head>
<body>
<?php
ControllerInscription::inscription();
?>
<form method="POST" action="index.php?page=inscription" name="login_form" class="div_connexion">
    <div class="fieldset_inscription">
        <label for="pseudo">Pseudo</label>
        <div>
            <input type="text" name="pseudo" id="pseudo" class="input_pseudo"
                   placeholder="Saisissez votre pseudo" required>
        </div>
        <label for="email">Adresse mail</label>
        <div>
            <input type="text" name="email" id="email" class="input_mail"
                   placeholder="Saisissez votre mail" required>
        </div>
        <label for="birthdate">Date de naissance</label>
        <div>
            <input type="date" name="birthdate" id="birthdate" class="input_birthdate"
                   placeholder="Saisissez votre date de naissance" required>
        </div>
        <label for="pass">Mot de passe</label>
        <div>
            <input type="password" name="pass" id="pass" class="input_mdp"
                   placeholder="Saisissez votre mot de passe" required>
        </div>
        <div>
            <input type="submit" value="Inscription" class="button button_inscription">
        </div>
    </div>
</form>
</body>
</html>
