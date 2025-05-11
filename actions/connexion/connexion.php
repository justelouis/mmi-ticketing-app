<?php

require("../database.php");

$mail = htmlentities($_POST["mail"]);
$mdp = htmlentities($_POST["mdp"]);

$checkExiste = $bdd->query("SELECT * FROM $prefixeTable"."utilisateur WHERE email = '$mail' ");
$infos = $checkExiste->fetch();

if($checkExiste->rowCount() > 0)
{
    if(password_verify($mdp, $infos["motDePasse"]))
    {
        $_SESSION["auth"] = true;
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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion réussi</title>
</head>
<body>
    <p>Bonjour <?=$_SESSION["prenom"]?>, vous êtes connecté, vous allez êtes redirigés dans quelque seconde</p>

    <script>
        setTimeout(() => {
            document.location = "../../index.php";
        }, 5000);
    </script>
</body>
</html>