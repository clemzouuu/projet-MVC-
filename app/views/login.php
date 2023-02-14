<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../src/Styles/login.css">
    <title>Quickie</title>
</head>
<body>

<button><a href="/"> Home </a></button>
<br>
<div id="login-form">
    <h2 class="header">Login</h2>
    <div>
        <form action="/logged" method="POST">
            <label for="username"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" id="username" name="username" required>
            <br>
            <label for="password"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" id="password" name="password" required>
            <br>
            <input type="submit" name="submit" id='submit' value='LOGIN' >
            <br>
            <a href="/register">Vous n'avez pas de compte ? Inscrivez-vous</a>

        </form>
    </div>
</div>
</body>
</html>