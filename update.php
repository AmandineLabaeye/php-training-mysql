<?php

include "DB.php";

$ID = isset($_GET["id"]) ? $_GET["id"] : NULL;

$Nom = isset($_GET["name"]) ? $_GET["name"] : NULL;

$Difficulter = isset($_GET["difficulty"]) ? $_GET["difficulty"] : NULL;

$Distance = isset($_GET["distance"]) ? $_GET["distance"] : NULL;

$Duree = isset($_GET["duration"]) ? $_GET["duration"] : NULL;

$Deniveler = isset($_GET["height_difference"]) ? $_GET["height_difference"] : NULL;

?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Modifier une randonnée</title>
        <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    </head>
    <style>

        h1 {
            text-align: center;
        }

        form {
            text-align: center;
        }

        div {
            text-align: center;
        }

        .Congratulations {
            font-size: 30px;
            color: darkred;
        }

    </style>
    <body>

    <div>

        <a href="read.php">Liste des données</a>

    </div>
    <h1>Modifier</h1>
    <form action="update.php" method="post">

        <div>
            <label for="id"> ID
                <input type="number" name="id" value="<?= $ID ?>">
            </label>
        </div>

        <div>
            <label for="name">Name
                <input type="text" name="name" value="<?= $Nom ?>">
            </label>
        </div>

        <div>
            <label for="difficulty">Difficulté
                <select name="difficulty">
                    <option value="très facile" <?php Echo $Difficulter == "très facile" ? 'selected' : "" ?> >Très facile</option>
                    <option value="facile" <?php Echo $Difficulter == "facile" ? 'selected' : "" ?> >Facile</option>
                    <option value="moyen"<?php Echo $Difficulter == "moyen" ? 'selected' : "" ?> >Moyen</option>
                    <option value="difficile" <?php Echo $Difficulter == "difficile" ? 'selected' : "" ?> >Difficile</option>
                    <option value="très difficile" <?php Echo $Difficulter == "très difficile" ? 'selected' : "" ?> >Très difficile</option>
                </select>
            </label>
        </div>

        <div>
            <label for="distance">Distance
                <input type="text" name="distance" value="<?= $Distance ?>">
            </label>
        </div>
        <div>
            <label for="duration">Durée
                <input type="text" name="duration" value="<?= $Duree ?> ">
            </label>
        </div>
        <div>
            <label for="height_difference">Dénivelé
                <input type="text" name="height_difference" value="<?= $Deniveler ?> ">
            </label>
        </div>
        <button type="submit" name="submit">Envoyer</button>
    </form>
    </body>
    </html>

<?php

$id = isset($_POST["id"]) ? $_POST["id"] : NULL;

$name = isset($_POST['name']) ? $_POST['name'] : NULL;

$difficulty = isset($_POST['difficulty']) ? $_POST['difficulty'] : NULL;

$distance = isset($_POST['distance']) ? $_POST['distance'] : NULL;

$duration = isset($_POST['duration']) ? $_POST['duration'] : NULL;

$height_difference = isset($_POST['height_difference']) ? $_POST['height_difference'] : NULL;

if (isset($_REQUEST["submit"])) {

    $Update = "UPDATE hiking set `name` = '$name', difficulty = '$difficulty', distance = '$distance', duration = '$duration', height_difference = '$height_difference' where id = '$id'";

    global $connexion;

    $connexion->query($Update);

    Echo "<br> <br>";

    Echo "<div class='Congratulations'>La randonnée a été upload avec succès.</div>";

    header('Location: read.php');

}

