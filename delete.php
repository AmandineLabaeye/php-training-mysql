<?php
/**** Supprimer une randonnée ****/

include "DB.php";

session_start();

if ($_SESSION["username"]) {

    if (isset($_GET["id"])) {

        $ID = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT) ? $_GET["id"] : 0;

        $Delete = "Delete from hiking where id = " . $ID;

        $connexion->query($Delete);

        header('Location: read.php');

    }

} else {

    header('Location: login.php');

}