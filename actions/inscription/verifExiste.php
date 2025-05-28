<?php

if(!empty($_POST))
{
    require("../database.php");

    $mail = htmlspecialchars($_POST["mail"]);

    $check = $bdd->query("SELECT * FROM $prefixeTable"."utilisateur WHERE email = '$mail' ");

    if($check->rowCount() > 0)
    {
        $check->closeCursor();
        header("Location: ../../inscription.php?error=1");
    }else
    {
        $check->closeCursor();
        $_SESSION["nom"] = htmlspecialchars($_POST["nom"]);
        $_SESSION["prenom"] = htmlspecialchars($_POST["prenom"]);
        $_SESSION["mail"] = htmlspecialchars($_POST["mail"]);
        $_SESSION["mdp"] = password_hash($_POST["mdp"],PASSWORD_DEFAULT);
        
        header("Location: verifMail.php");
    }
}else
{
    header("Location: inscription.php");
}


?>