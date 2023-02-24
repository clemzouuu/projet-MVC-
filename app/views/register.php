<?php
if(session_start()){
    session_destroy();
}
$_SESSION["connecte"] = false;

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../src/Styles/register.css">
    <title>Quickie</title>
</head>
<body>

<div id="login-form">
    <h2 class="header">Création de compte</h2>
    <div>
        <form method="POST" action="/register-new-user">
            <label for="username"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Caractères spéciaux interdits" id="username" name="username" required>
            <br>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Entrer un email" id="email" name="email" required>
            <br>
            <label for="password"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" id="password" name="password" required>
            <br>

            <input type="submit" id='submit' value='Créer le compte'>
            <br>
            <a href="/login">Vous avez déjà un compte ? Connectez-vous</a>
        </form>
    </div>
</div>
</body>
<br>
</html>