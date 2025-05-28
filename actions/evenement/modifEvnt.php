<?php

if(!empty($_POST))
{
    require("../database.php");

    $nomEvnt = htmlspecialchars($_POST["nomEvnt"]);
    $descEvnt = htmlspecialchars($_POST["description"]);
    $dateEvnt = $_POST["date"];
    $lieuEvnt = htmlspecialchars($_POST["lieu"]);
    $placeEvnt = $_POST["nbPlace"];
    $placeResa = $_POST["placeResa"];
    $categEvnt = $_POST["categorie"];

    $updEvnt = $bdd->prepare("UPDATE $prefixeTable"."evenement SET nom= :nom ,description= :description , date= :date, lieu= :lieu,
                                placeMax= :placeMax , placeDispo = :placeDispo ,idCategorie= :idCategorie
                                WHERE idEvenement = :idEvnt");

    $updEvnt->execute([
            "nom"=>$nomEvnt,
            "description"=>$descEvnt,
            "date"=>$dateEvnt,
            "lieu"=>$lieuEvnt,
            "placeMax"=>$placeEvnt,
            "placeDispo"=>$placeEvnt - $placeResa,
            "idCategorie"=>$categEvnt,
            "idEvnt" => $_POST["idEvnt"]
        ]);
    $updEvnt->closeCursor();
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
    <title>Document</title>
</head>
<body>
    <p>Evenement <b><?=$nomEvnt?></b> modifié</p>

    <a href="../../admin.php">Retour a l'accueil</a>
</body>
</html>