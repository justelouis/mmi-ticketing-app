<?php

require("../database.php");

if(!empty($_GET))
{
    $supRese = $bdd->prepare("DELETE FROM reservation WHERE idReservation = :id");
    $supRese->execute([
        "id" => $_GET["idReservation"]
    ]);
}else
{
    header("Location: ../../index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sup résa</title>
</head>
<body>
    Réservation supprimé
    <a href="../../profil.php">Retour au profil</a>
</body>
</html>