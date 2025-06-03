<?php

if(!empty($_POST))
{
    require("../database.php");

    if($_POST["code"] == $_SESSION["code"])
    {
        $inscription = $bdd->prepare("INSERT INTO $prefixeTable"."utilisateur(nom, prenom, motDePasse, email) VALUES (:nom, :prenom, :mdp, :email)");
        $inscription->execute([
            "nom" => $_SESSION['nom'],
            "prenom" => $_SESSION['prenom'],
            "mdp" => $_SESSION['mdp'],
            "email" => $_SESSION['mail']
        ]);
        $inscription->closeCursor();

        

        $recupInfo = $bdd->prepare("SELECT * FROM $prefixeTable"."utilisateur WHERE email = :mail");
        $recupInfo->execute([
            "mail" => $_SESSION['mail']
        ]);

        //variable session
        session_unset();
        $infos = $recupInfo->fetch();

        $_SESSION["auth"] = true;
        $_SESSION["id"] = $infos["idUtilisateur"];
        $_SESSION["nom"] = $infos["nom"];
        $_SESSION["prenom"] = $infos["prenom"];
        $_SESSION["mail"] = $infos["email"];
        $_SESSION["admin"] = false;
        $recupInfo->closeCursor();
    }else
    {
        if(isset($_SESSION["inscripTent"]))
        {
            $_SESSION["inscripTent"]++;
            if($_SESSION["inscripTent"] >= 3)
            {
                unset($_SESSION['inscripTent']);
                header("Location: verifMail.php");
            }
        }else
        {
            $_SESSION["inscripTent"] = 1;
        }
        header("Location: ../../code.php");
    }
}else
{
    header("Location: inscription.php");
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
    <p>Bonjour <?=$_SESSION["prenom"]?>, vous êtes inscrit</p>

    <a href="../../index.php">Retour a l'accueil</a>
</body>
</html>