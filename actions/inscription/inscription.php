<?php
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

    echo "inscription validé";

    $_SESSION["auth"] = true;
    
    unset($_SESSION["mdp"]);
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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion réussi</title>
</head>
<body>
    <p>Bonjour <?=$_SESSION["prenom"]?>, vous êtes inscrit, vous allez êtes redirigés dans quelque seconde</p>

    <script>
        setTimeout(() => {
            document.location = "../../index.php";
        }, 5000);
    </script>
</body>
</html>