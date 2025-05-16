<?php
    if(!empty($_GET))
    {
        require("actions/database.php");

        $getEvnt = $bdd->prepare("SELECT $prefixeTable"."evenement.*, $prefixeTable"."categorie.* 
                                FROM $prefixeTable"."evenement INNER JOIN $prefixeTable"."categorie 
                                ON $prefixeTable"."evenement.idCategorie = $prefixeTable"."categorie.idCategorie 
                                WHERE $prefixeTable"."evenement.idEvenement = :id");
        $getEvnt->execute([
            "id" => $_GET["id"]
        ]);
        $evnt = $getEvnt->fetch();
    }else
    {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$evnt["nom"]?></title>
    <link rel="stylesheet" href="css/styleEvenement.css">
</head>
<body>
    <h1><?=$evnt["nom"]?></h1>
    <p><?=$evnt["description"]?></p>
    <p><?=$evnt["date"]?></p>
    <p><?=$evnt["lieu"]?></p>

    <p>Places : <?=$evnt["placeDispo"]?> / <?=$evnt["placeMax"]?></p>
    <p><?=$evnt["nomCategorie"]?></p>


    <?php
        if(isset($_SESSION["auth"]))
        {
            if($evnt["placeDispo"])
            {

            
    ?>
                <button onclick="ChangerEtatMenuReservation(true)">Réserver</button>

                <div id="reservationMenu">
                    <button onclick="ChangerEtatMenuReservation(false)"> X </button>

                    <fieldset>
                        <legend>Reservation</legend>
                        <form action="actions/reservation/reserver.php" method="get">

                        <label for="nbrPlace">Nombre de place</label>
                        <input type="number" name="nbrPlace" id="nbrPlace" required max="<?=$evnt["placeDispo"]?>">

                        <input type="hidden" name="idEvnt" value="<?=$evnt["idEvenement"]?>">

                        <input type="submit" value="Réserver">
                    </form>
                    </fieldset>
                    
                </div>

    <?php 
            }else
            {
                ?>
                    <p>Pu de place disponible, fallez être plus rapide</p>
                <?php
            }
        }else
        {
            ?>
                <p>Pour réserver, vous devez vous être <a href="connexion.php">connecter</a> ou vous devez <a href="inscription.php">créer un compte</a></p>
            <?php
        }
    ?>
    <a href="index.php">Revenir a l'accueil</a>
    <script src="js/scriptEvenement.js"></script>
</body>
</html>