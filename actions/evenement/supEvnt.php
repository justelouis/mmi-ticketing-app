<?php
require("../database.php");

if(!empty($_GET) && $_SESSION["admin"])
{
    //recup info de l'evnt
    $reqInfoEvnt = $bdd->prepare("SELECT * FROM $prefixeTable"."evenement WHERE idEvenement = :id");
    $reqInfoEvnt->execute([
        "id" => $_GET["idEvnt"]
    ]);
    $infoEvnt = $reqInfoEvnt->fetch();


    //Envoi de mail au gens qui ont une résa
    $reqMail = $bdd->prepare("SELECT $prefixeTable"."utilisateur.email FROM 
                        ($prefixeTable"."utilisateur INNER JOIN $prefixeTable"."reservation 
                        ON $prefixeTable"."utilisateur.idUtilisateur = $prefixeTable"."reservation.idUtilisateur)
                        INNER JOIN $prefixeTable"."evenement
                        ON $prefixeTable"."evenement.idEvenement = $prefixeTable"."reservation.idEvenement
                        WHERE $prefixeTable"."evenement.idEvenement = :id");
    $reqMail->execute([
        "id" =>$infoEvnt["idEvenement"]
    ]);
    $mails = $reqMail->fetchAll();

    $mailExp = "louis.cadix@univ-rouen.fr";
    $mailTxt = "Nous sommes désolé de vous informer de la suppression de l'évenement : ".$infoEvnt["nom"];

    foreach ($mails as $mail) 
    {    
        $headers = 'MIME-Version: 1.0'."\r\n".
            'Content-type: text/html; charset="UTF-8'."\r\n".
            'From: '. $mailExp."\r\n".
            'Reply-To: '.$mail["email"]."\r\n".
            'X-Mailer: PHP'. phpversion();

        if(mail($mail["email"],"Suppresion evenement", $mailTxt,$headers))
        {

        }else
        {
            echo"Message non envoyé";
        }
    }

    //sup evnt

    $delEvnt = $bdd->prepare("DELETE FROM $prefixeTable"."evenement WHERE idEvenement = :id");
    $delEvnt->execute([
        "id" => $infoEvnt["idEvenement"]
    ]);

}else
{
    header("Location: ../../index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sup evnt</title>
</head>
<body>
    L'évenement a bien été supprimé

    <a href="../../index.php">Retour a l'accueil</a>
</body>
</html>