<?php

session_start();

if(isset($_SESSION["mail"]))
{
    $mail = "louis.cadix@univ-rouen.fr";

    $_SESSION["code"] = rand(1000, 9999);

    $mailTxt = "Voici votre code de confirmation : ".$_SESSION["code"];

    $headers = 'MIME-Version: 1.0'."\r\n".
        'Content-type: text/html; charset="UTF-8'."\r\n".
        'From: '. $mail."\r\n".
        'Reply-To: '.$_SESSION["mail"]."\r\n".
        'X-Mailer: PHP'. phpversion();



    if(mail(
        $_SESSION["mail"],
        "Code", 
        $mailTxt,
        $headers
    ))
    {

    }else
    {
        echo"Message non envoyé";
    }

    header("Location: ../../code.php");
}else
{
    header("Location: inscription.php");
}

?>