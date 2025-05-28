<?php
    if(!empty($_POST))
    {
        require("../database.php");

        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $mdp = htmlspecialchars($_POST["mdp"]);

        $requete = $bdd->query("SELECT * FROM $prefixeTable"."admin WHERE pseudo = '$pseudo' AND motDePasse = '$mdp' ");

        if($requete->rowCount() > 0)
        {
            $_SESSION["admin"] = true;
            $_SESSION["auth"] = true;
            $requete->closeCursor();
            header("Location: ../../admin.php");
        }else
        {
            $requete->closeCursor();    
            header("Location: ../../connexionAdmin.php");
        }
    }else
    {
        header("Location: ../../connexionAdmin.php");
    }

