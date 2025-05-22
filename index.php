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
            if($_SESSION["admin"])
            {
                ?>
                    <a href="admin.php">Page admin</a>
                    <a href="actions/connexion/deconnexion.php">déconnexion admin</a>
                <?php
            }else
            {
                ?>
                    <a href="profil.php">Profil</a>
                    <a href="actions/connexion/deconnexion.php">Se déconnecter</a>
                <?php
            }
        }else
        {
            ?>
                <a href="inscription.php">Pour s'inscrire</a>
                <a href="connexion.php">Se connecter</a>
                <br>
                <a href="connexionAdmin.php">Connexion admin</a>
                <br>
            <?php
        }
    ?>

    

    <h1>Liste Evenement</h1>
    <ul>
        <?php
            $requeteEvnt = $bdd->query("SELECT * FROM $prefixeTable"."evenement");
            $evnts = $requeteEvnt->fetchAll();

            foreach ($evnts as $evnt) 
            {
                ?>
                    <li>
                        <a href="evenement.php?id=<?=$evnt["idEvenement"]?>" ><?=$evnt["nom"]?></a>
                    </li>
                <?php
            }
        ?>
    </ul>
</body>
</html>