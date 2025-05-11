<?php
    require("actions/database.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAE 203</title>
</head>
<body>

    <?php
        if(isset($_SESSION["auth"]))
        {
            ?>
                <a href="actions/connexion/deconnexion.php">Se déconnecter</a>
            <?php
        }else
        {
            ?>
                <a href="inscription.php">Pour s'inscrire</a>
                <a href="connection.php">Se connecter</a>
            <?php
        }
    ?>
</body>
</html>