<?php
require("../database.php");

$mail = htmlentities($_POST["mail"]);

$check = $bdd->query("SELECT COUNT(*) FROM $prefixeTable"."utilisateur WHERE email = '$mail' ");

if($check->fetchColumn() > 0)
{
    header("Location: ../../inscription.php?exist=true");
}else
{
    $_SESSION["nom"] = htmlentities($_POST["nom"]);
    $_SESSION["prenom"] = htmlentities($_POST["prenom"]);
    $_SESSION["mail"] = htmlentities($_POST["mail"]);
    $_SESSION["mdp"] = password_hash($_POST["mdp"],PASSWORD_DEFAULT);
    
    header("Location: verifMail.php");
}

