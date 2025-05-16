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
        if(isset($_GET["error"]))
        {
            switch ($_GET["error"]) {
                case 1:
                    echo "Cet email est déjà utilisé";
                    break;
                
                case 2:
                    echo "L'adresse mail n'est pas valide";
                    break;

                default:
                    # code...
                    break;
            }
            
        }
    ?>
    <fieldset>
        <legend>Inscription</legend>
        <form action="actions/inscription/verifExiste.php" method="post" onsubmit="VerifMdp(event)" >
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required autofocus>

            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom" required>

            <label for="mail">mail</label>
            <input type="mail" name="mail" id="mail" required pattern=".+@univ-rouen.fr" placeholder="prenom.nom@univ-rouen.fr">

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
    <a href="index.php">Revenir a l'accueil</a>
    <script src="js/scriptInscription.js"></script>
</body>
</html>