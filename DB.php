<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 15/01/2019
 * Time: 15:43
 */

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "reunion_island";

$connexion = new mysqli($servername, $username, $password);

if ($connexion->connect_error) {

    die("Connection failed: " . $connexion->connect_error);

} else {

    $connexion->select_db($dbname);

}