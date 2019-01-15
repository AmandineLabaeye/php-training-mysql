<?php
/**** Supprimer une randonnée ****/

include "DB.php";

if (isset($_GET["id"])) {

    $ID = $_GET["id"];

    $Delete = "Delete from hiking where id = ". $ID;

    $connexion->query($Delete);

    header('Location: read.php');

}
