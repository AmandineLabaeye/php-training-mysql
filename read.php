<?php

include "DB.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<style>

    h1 {
        text-align: center;
        color: darkred;
    }

    table {
        margin: 0 auto;
        border: double darkred 5px;
    }

    th {
        background-color: #a84421;
        font-size: 25px;
        padding: 30px;
        text-align: center;
        color: white;
        font-weight: lighter;
    }

    td {
        background-color: #f8602c;
        color: white;
        font-size: 20px;
        padding: 15px;
        text-align: center;
        font-weight: lighter;
    }

    a {
        color: white;
    }

    .A {
        color: darkred;
    }

</style>
<body>
<h1>Liste des randonnées / <a class="A" href="create.php"> Ajouter </a> </h1>
<table>
    <!-- Afficher la liste des randonnées -->

    <?php

    $liste = "Select * from hiking where 1";

    $con = $connexion->query($liste);

    Echo "<tr><th> Supprimer </th><th> Modifier </th><th> N° </th><th> Nom </th><th> Difficulté </th><th> Distance </th><th> Durée </th><th> Dénivilé </th></tr>";

    while ($row = $con->fetch_assoc()) {

        Echo "<tr><td><a href=\"delete.php?id=".$row["id"].'">'."Supprimer"."</a></td><td><a href=\"update.php?name=".$row["name"]."&difficulty=".$row["difficulty"]."&distance=".$row["distance"]."&duration=".$row["duration"]."&height_difference=".$row["height_difference"]."&id=".$row["id"].'">'."Edit"."</a></td><td>".$row["id"]."</td><td>" . $row["name"] . "</td><td>" . $row["difficulty"] . "</td><td>" . $row["distance"] . "</td><td>" . $row["duration"] . "</td><td>" . $row["height_difference"] . "</td></tr>";

    }


    ?>

</table>
</body>
</html>
