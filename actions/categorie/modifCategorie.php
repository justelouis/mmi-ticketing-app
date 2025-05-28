<?php
if(!empty($_POST)) 
{
    require("../../actions/database.php");

    $idCategorie = $_POST["categorieAModifier"];
    $nouveauNom = htmlspecialchars($_POST["nouveauNom"]);

    $updateCateg = $bdd->prepare("UPDATE $prefixeTable"."categorie SET nomCategorie = :nomCateg WHERE idCategorie = :idCateg");
    $updateCateg->execute([
        'nomCateg' => $nouveauNom,
        'idCateg' => $idCategorie
    ]);

    $updateCateg->closeCursor();
} else {
    header("Location: ../../admin.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie Modifié</title>
</head>
<body>
    <p>Categorie modifié</p>

    <a href="../../admin.php">Retour a l'accueil</a>
</body>
</html>