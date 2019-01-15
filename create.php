<?php

include "DB.php";

?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Ajouter une randonnée</title>
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

    <h1>Ajouter</h1>

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

function AjoutRandonne()
{

    global $connexion;

    if (isset($_POST['name']) != '' && $_POST['difficulty'] != '' && $_POST['distance'] != '' && $_POST['duration'] != '' && $_POST['height_difference'] != '' && isset($_POST['submit'])) {


        $name = $_POST['name'];

        $difficulty = $_POST['difficulty'];

        $distance = $_POST['distance'];

        $duration = $_POST['duration'];

        $height_difference = $_POST['height_difference'];

        $Add = $connexion->prepare("Insert into hiking (`name`, `difficulty`, `distance`, `duration`, `height_difference`) VALUES (?, ?, ?, ?, ?)");
        $Add->bind_param("ssisi", $name, $difficulty, $distance, $duration, $height_difference);
        $Add->execute();
        Echo $Add->error;
        $Add->close();

        Echo "<br><br>";

        Echo "<div class='Congratulations'>La randonnée a été ajoutée avec succès.</div>";

    }
}

AjoutRandonne();