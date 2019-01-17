<?php

include "DB.php";

session_start();

?>

<br>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<style>

    .DIIV {
        text-align: center;
        font-size: 25px;
    }

    form {
        text-align: center;
    }

    table {
        margin: 0 auto;
        border: double darkred 5px;
    }

    th {
        background-color: #a84421;
        font-size: 25px;
        padding: 20px;
        text-align: center;
        color: white;
        font-weight: lighter;
    }

    a {
        color: white;
        text-decoration: none;
    }

</style>
<body>

<br>

<form action="check_login.php" method="post">
    <div>
        <label for="username">Identifiant
            <input type="text" name="username">
        </label>
    </div>
    <div>
        <label for="password">Mot de passe
            <input type="password" name="password">
        </label>
    </div>

    <br>

    <div>
        <button type="submit" name="button">Se connecter</button>
    </div>
</form>

<br> <br>

<table>

    <tr>

        <th><a href="read.php"> Retour à la liste des randonnés </a></th>

    </tr>

</table>

</body>
</html>