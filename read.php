<?php

include "DB.php";

session_start();

?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Randonnées</title>
        <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    </head>
    <style>

        :root {
            --bg-color: darkcyan;
        }

        body {
            background-image: url(https://img.aws.la-croix.com/2017/01/24/1200819703/Pres-Francais-estiment-montagne-atoutla-France_0_730_486.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        table {
            margin: 0 auto;
            border: double darkred 5px;
        }

        th:hover, td:hover {
            text-shadow: none;
            opacity: 1;
        }

        th {
            background-color: #a84421;
            font-size: 25px;
            padding: 20px;
            text-align: center;
            color: white;
            font-weight: lighter;
            text-shadow: 4px 4px 4px black;
            opacity: 0.8;
        }

        td {
            background-color: #f8602c;
            color: white;
            font-size: 20px;
            padding: 10px;
            text-align: center;
            font-weight: lighter;
            text-shadow: 4px 4px 4px black;
            opacity: 0.8;
        }

        a {
            color: white;
        }

        .A {
            color: white;
            text-decoration: none;
        }

        .Table {
            margin-top: 20px;
        }

        .Con {
            font-size: 30px;
            text-align: center;
            color: white;
            background-color: #a84421;
            border: double darkred 5px;
            padding: 5px;
            text-shadow: 4px 4px 4px black;
            opacity: 0.8;
        }

    </style>
    <body>
    <table class="Table">

        <tr>
            <th><a class="A" href="create.php"> Ajouter un randonnées </a></th>

            <th><a class="A" href="login.php"> Connexion </a></th>

            <th><a class="A" href="logout.php"> Deconnexion </a></th>

        </tr>

    </table>

    <br> <br>

    <div class="Con">

        <?php

        Echo "Vous êtes connectés en tant que ";

        if (isset($_SESSION["username"])) {

            Echo $_SESSION["username"];

        } else {

            Echo "Invité en accès limité";

        }

        ?>

    </div>


    <table class="Table">
        <!-- Afficher la liste des randonnées -->

        <?php

        if (isset($_SESSION["username"])) {

            $liste = "Select * from hiking where 1";

            $con = $connexion->query($liste);

            Echo "<tr><th> Delete </th><th> Edit </th><th> N° </th><th> Nom </th><th> Difficulté </th><th> Distance </th><th> Durée </th><th> Dénivilé </th></tr>";

            while ($row = $con->fetch_assoc()) {

                Echo "<tr><td><a href=\"delete.php?id=" . $row["id"] . '">' . "Delete" . "</a></td><td><a href=\"update.php?name=" . $row["name"] . "&difficulty=" . $row["difficulty"] . "&distance=" . $row["distance"] . "&duration=" . $row["duration"] . "&height_difference=" . $row["height_difference"] . "&id=" . $row["id"] . '">' . "Edit" . "</a></td><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["difficulty"] . "</td><td>" . $row["distance"] . "</td><td>" . $row["duration"] . "</td><td>" . $row["height_difference"] . "</td></tr>";

            }

        } else {

            $liste = "Select * from hiking where 1";

            $con = $connexion->query($liste);

            Echo "<tr><th> N° </th><th> Nom </th><th> Difficulté </th><th> Distance </th><th> Durée </th><th> Dénivilé </th></tr>";

            while ($row = $con->fetch_assoc()) {

                Echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["difficulty"] . "</td><td>" . $row["distance"] . "</td><td>" . $row["duration"] . "</td><td>" . $row["height_difference"] . "</td></tr>";

            }

        }

        ?>

    </table>
    </body>
    </html>

<?php