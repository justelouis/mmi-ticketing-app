<?php

if(!empty($_POST))
{
    require("../database.php");

    $mail = htmlspecialchars($_POST["mail"]);
    $mdp = htmlspecialchars($_POST["mdp"]);

    $checkExiste = $bdd->query("SELECT * FROM $prefixeTable"."utilisateur WHERE email = '$mail' ");
    $infos = $checkExiste->fetch();

    if($checkExiste->rowCount() > 0)
    {
        if(password_verify($mdp, $infos["motDePasse"]))
        {
            $_SESSION["auth"] = true;
            $_SESSION["id"] = $infos["idUtilisateur"];
            $_SESSION["nom"] = $infos["nom"];
            $_SESSION["prenom"] = $infos["prenom"];
            $_SESSION["mail"] = $infos["email"];
        }else   //mdp incorrect
        {
            header("Location: ../../connection.php?result=2");
        }
    }else   //compte n existe pas
    {
        header("Location: ../../connection.php?result=1");
    }
}else
{
    header("Location : ../../connection.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion réussi</title>
</head>
<body>
    <p>Bonjour <?=$_SESSION["prenom"]?>, vous êtes connecté</p>

    <a href="../../index.php">Retour a l'accueil</a>
</body>
</html>