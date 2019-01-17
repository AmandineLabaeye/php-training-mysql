<?php
//Check if credentials are valid
include "DB.php";

session_start();

$username = isset($_POST["username"]) ? $_POST["username"] : NULL;

$password = isset($_POST["password"]) ? $_POST["password"] : NULL;

if (isset($_POST["button"])) {

    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);

    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    $password = sha1($password);

    $Select = "Select * from `user` where username = '$username' and password = '$password'";

    $conn = $connexion->query($Select);

    $row = $conn->fetch_assoc();

    if (isset($row['username'])) {

        $pass = $row["password"];

        if ($password == $pass) {

            $_SESSION["username"] = $_POST["username"];

            header("Location: read.php");

        }

    } else {

        Echo "Login incorrect";

        ?>

        <br><br>

        <a href="login.php"> Retour à la page Login </a>

        <?php

    }

}