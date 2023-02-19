<?php
session_start();

if(!$_SESSION["connecte"]){
    header("location: /");
}

?>
<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../src/Styles/home.css">
    <title>Quickie</title>

</head>

<body>
    <div class="welcome">
        <h1>Bienvenue sur
            <span class="title">
                <?= $title; ?>
                <button class="logout"><a href="/">Déconnexion</a></button> <!-- ça renvoit juste à home-->
            </span>
        </h1>
    </div>

    <div class="content">
        <?= $subtitle ?>
    </div>



<br>
<br>

    <fieldset>
        <form method="POST" action="/insert-new-post">
            <input type="text" name="content" id="submit" placeholder="Exprimez vous !" minlength="1" maxlength="50"/>
            <input type="submit" value="Envoyer" id="submit"/>
        </form>
    </fieldset>

    <div>
        <table>
            <tr>
                <th>Expression :</th>
            </tr>
            <tr>
                <td>
                <?php foreach ($posts as $post) { ?>
                    <?= $post->getContent()?><br>
                <?php } ?>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>