<?php
require("actions/database.php");

if(empty($_SESSION))
{
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de <?=$_SESSION["nom"]." ".$_SESSION["prenom"]?></title>
</head>
<body>
    <h1>Mes reservations</h1>
    <ul>
        <?php
            $getReservation = $bdd->prepare("SELECT $prefixeTable"."reservation.*, $prefixeTable"."evenement.* 
                                            FROM $prefixeTable"."reservation 
                                            INNER JOIN $prefixeTable"."evenement 
                                            ON $prefixeTable"."evenement.idEvenement = $prefixeTable"."reservation.idEvenement 
                                            WHERE $prefixeTable"."reservation.idUtilisateur = :id");
            $getReservation->execute([ "id" => $_SESSION["id"]]);

            $reservations = $getReservation->fetchAll();
            foreach ($reservations as $reservation) 
            {
                ?>
                    <li><?=$reservation["nom"]?> Places : <?=$reservation["nbrPlacePrise"]?> / <a href="actions/reservation/supReservation.php?idReservation=<?=$reservation["idReservation"]?>">Supprimez la réservation</a>
                    </li>
                <?php
            }
        ?>
    </ul>
    <a href="index.php">Revenir a l'accueil</a>
</body>
</html>