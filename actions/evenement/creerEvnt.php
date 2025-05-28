<?php
    if(!empty($_POST))
    {
        require("../database.php");

        $nomEvnt = htmlspecialchars($_POST["nomEvnt"]);
        $descEvnt = htmlspecialchars($_POST["description"]);
        $dateEvnt = $_POST["date"];
        $lieuEvnt = htmlspecialchars($_POST["lieu"]);
        $placeEvnt = $_POST["nbPlace"];
        $categEvnt = $_POST["categorie"];

        $insertEvnt = $bdd->prepare("INSERT INTO $prefixeTable"."evenement(nom, description ,date, lieu, placeMax, placeDispo, idCategorie) 
                                    VALUES (:nom, :description,:date, :lieu, :placeMax, :placeDispo, :idCategorie)");
        $insertEvnt->execute([
            "nom"=>$nomEvnt,
            "description"=>$descEvnt,
            "date"=>$dateEvnt,
            "lieu"=>$lieuEvnt,
            "placeMax"=>$placeEvnt,
            "placeDispo"=>$placeEvnt,
            "idCategorie"=>$categEvnt
        ]);
        $insertEvnt->closeCursor();
    }else
    {
        header("Location: ../../admin.php");
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
    <p>Evenement <b><?=$nomEvnt?></b> crée</p>

    <a href="../../admin.php">Retour a l'accueil</a>
</body>
</html>