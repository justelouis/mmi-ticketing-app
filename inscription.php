<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/styleInscription.css">
</head>
<body>
    <?php
        if(isset($_GET["exist"]))
        {
            echo "Cet email est déjà utilisé";
        }
    ?>
    <fieldset>
        <legend>Inscription</legend>
        <form action="actions/inscription/verifExiste.php" method="post" onsubmit="VerifMdp(event)">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required autofocus>

            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom" required>

            <label for="mail">mail</label>
            <input type="mail" name="mail" id="mail" required>

            <label for="mdp">password</label>
            <input type="password" name="mdp" id="mdp" required oninput="TestRobustesse(this.value)">
            <ul id="testRobustesse">
                <li class="invalide">8 caractères</li>
                <li class="invalide">1 Majuscule</li>
                <li class="invalide">1 chiffre</li>
                <li class="invalide">1 caractère spécial</li>
            </ul>

            <span id="mdpPasBon">Votre mot de passe doit respecter les conditions ci dessus</span>
            <input type="submit" value="S'inscrire">
        </form>
    </fieldset>
    <script src="js/scripInscription.js"></script>
</body>
</html>