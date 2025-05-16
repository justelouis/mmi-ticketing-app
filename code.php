<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code</title>
</head>
<body>
    <?php 
        if(isset($_SESSION["mail"]))
        {
            echo $_SESSION["mail"]; 
        }else
        {
            header("Location: inscription.php");
        }

        if(isset($_SESSION["inscripTent"]))
        {
            ?>
                <p>Il vous reste <?php echo (3 - $_SESSION["inscripTent"]);?> tentatives, a la fin des tentatives un nouveau code sera envoyé</p>
            <?php
        }
    ?>

    <fieldset>
        <legend>Code</legend>

        <form action="actions/inscription/inscription.php" method="post">
            <label for="code">Code</label>
            <input type="number" name="code" id="code">

            <input type="submit" value="Valider le code">
        </form>
    </fieldset>

    <a href="actions/inscription/verifMail.php">Renvoyé le code</a>
    <a href="inscription.php">Vous vous etes trompé d'adresse, alors cliquez</a>
</body>
</html>