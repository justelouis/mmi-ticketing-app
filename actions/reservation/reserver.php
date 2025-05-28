<?php
if(!empty($_GET))
{
    require("../database.php");

    $reservationRequete = $bdd->prepare("INSERT INTO $prefixeTable"."reservation(idEvenement, idUtilisateur, nbrPlacePrise) VALUES (:idEvnt, :idUtil, :nbrPlacePrise)");
    $reservationRequete->execute([
        "idEvnt" => $_GET["idEvnt"], 
        "idUtil" => $_SESSION["id"],
        "nbrPlacePrise" => $_GET["nbrPlace"]
    ]);

    $changePlaceDispo = $bdd->prepare("UPDATE $prefixeTable"."evenement SET placeDispo = placeDispo - :nbrPlacePrise WHERE idEvenement = :id" );
    $changePlaceDispo->execute([
        "nbrPlacePrise" => $_GET["nbrPlace"],
        "id" => $_GET["idEvnt"]
    ]);
    $changePlaceDispo->closeCursor();
    $reservationRequete->closeCursor();

    header("Location: ../../profil.php");
}else
{
    header("Location: ../../index.php");
}
?>