<?php

    if(!empty($_POST))
    {
        require("../database.php");

        $nomCategorie = htmlspecialchars($_POST["nomCategorie"]);

        $checkExiste = $bdd->query("SELECT * FROM $prefixeTable"."categorie WHERE nomCategorie = '$nomCategorie'");

        if($checkExiste->rowCount() == 0)
        {
            $insertCateg = $bdd->prepare("INSERT INTO $prefixeTable"."categorie(nomCategorie) VALUES (:nomCateg)");
            $insertCateg->execute([
                'nomCateg' => $nomCategorie
            ]);
        }else
        {
            header("Location: ../../admin.php?categExiste=true");
        }
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
    <p>Categorie <b><?=$nomCategorie?></b> crée</p>

    <a href="../../admin.php">Retour a l'accueil</a>
</body>
</html>