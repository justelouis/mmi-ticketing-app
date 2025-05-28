<?php

require("../../actions/database.php");
if(!empty($_POST))
{
    $idCategorie = $_POST["categorieASupprimer"];

    $changeEvntCategorie = $bdd->prepare("UPDATE evenement SET idCategorie = 1 WHERE idCategorie = :idCategorie");
    $changeEvntCategorie->execute([
        "idCategorie" => $idCategorie
    ]);
    
    $deleteCategorie = $bdd->prepare("DELETE FROM categorie WHERE idCategorie = :idCategorie");
    $deleteCategorie->execute([
        "idCategorie" => $idCategorie
    ]);

    $changeEvntCategorie->closeCursor();
    $deleteCategorie->closeCursor();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie Supprimer</title>
</head>
<body>
    <p>Categorie supprimé</p>

    <a href="../../admin.php">Retour a l'accueil</a>
</body>
</html>