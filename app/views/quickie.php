<?php
if(session_start()){
    session_destroy();
}
$_SESSION["connecte"] = false;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/Styles/quickie.css">
    <title>Quickie</title>
</head>
<body>
    <h1 class="title">Quickie</h1>
    <h2>Partagez votre pensée</h2>

    <ul>
        <li>
            <a href="/login">Se connecter</a>
        </li>
        <li>
            <a href="/register">S'inscrire</a>
        </li>
    </ul>
</body>
</html>