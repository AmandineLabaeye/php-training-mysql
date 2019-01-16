<?php

include "DB.php";

?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Ajouter une randonnée</title>
        <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    </head>
    <style>

        h1 {
            text-align: center;
            color: darkred;
            text-decoration: underline;
        }

        form {
            text-align: center;
            background-color: darkcyan;
            padding-top: 30px;
            padding-bottom: 30px;
            color: white;
            border: black double 5px;
            border-radius: 30px;
        }

        div {
            text-align: center;
        }

        .Congratulations {
            font-size: 30px;
            color: darkred;
        }

        a {
            font-size: 25px;
            color: black;
        }

    </style>
    <body>

    <h1>Ajouter</h1>

    <br>

    <div>

        <a href="read.php">Liste des randonnées</a>

    </div>

    <br> <br>

    <form action="create.php" method="post">

        <div>
            <label for="name"> Name
                <input type="text" name="name">
            </label>
        </div>

        <div>
            <label for="difficulty"> Difficulté
                <select name="difficulty">
                    <option value="très facile">Très facile</option>
                    <option value="facile">Facile</option>
                    <option value="moyen">Moyen</option>
                    <option value="difficile">Difficile</option>
                    <option value="très difficile">Très difficile</option>
                </select>
            </label>
        </div>

        <div>
            <label for="distance"> Distance
                <input type="text" name="distance">
            </label>
        </div>

        <div>
            <label for="duration"> Durée
                <input type="time" name="duration">
            </label>
        </div>

        <div>
            <label for="height_difference"> Dénivelé
                <input type="text" name="height_difference">
            </label>
        </div>

        <button type="submit" name="submit">Envoyer</button>

    </form>

    </body>
    </html>

<?php

$name = isset($_POST["name"]) ? $_POST["name"] : NULL;

$difficulty = isset($_POST["difficulty"]) ? $_POST["difficulty"] : NULL;

$distance = isset($_POST["distance"]) ? $_POST["distance"] : NULL;

$duration = isset($_POST["duration"]) ? $_POST["duration"] : NULL;

$height_difference = isset($_POST["height_difference"]) ? $_POST["height_difference"] : NULL;

if (isset($_REQUEST['submit'])) {

    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING) ? $_POST["name"] : "Sans titre";

    $difficulty = filter_var($_POST["difficulty"], FILTER_SANITIZE_STRING) ? $_POST["difficulty"] : "Facile";

    $distance = filter_var($_POST["distance"], FILTER_SANITIZE_NUMBER_INT) ? $_POST["distance"] : 0;

    $duration = filter_var($_POST["duration"], FILTER_SANITIZE_STRING) ? $_POST["duration"] : "00:00";

    $height_difference = filter_var($_POST["height_difference"], FILTER_SANITIZE_NUMBER_INT) ? $_POST["height_difference"] : 200;

    $Add = $connexion->prepare("Insert into hiking (`name`, `difficulty`, `distance`, `duration`, `height_difference`) VALUES (?, ?, ?, ?, ?)");
    $Add->bind_param("ssisi", $name, $difficulty, $distance, $duration, $height_difference);
    $Add->execute();
    Echo $Add->error;
    $Add->close();

    Echo "<br><br>";

    Echo "<div class='Congratulations'>La randonnée a été ajoutée avec succès.</div>";

    header('Location: read.php');

}
