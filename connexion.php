<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
</head>
<body>
    <a href="connexionAdmin.php">Connexion admin</a>
    <fieldset>
        <legend>Se connecter</legend>
        <form action="actions/connexion/connexion.php" method="post">
            <label for="mail">Adresse mail</label>
            <input type="email" name="mail" id="mail" required pattern=".+@univ-rouen.fr" placeholder="prenom.nom@univ-rouen.fr" autofocus>

            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" required>

            <input type="submit" value="Se connecter">
        </form>
    </fieldset>
    <a href="index.php">Revenir a l'accueil</a>
    <?php
        if(isset($_GET["result"]))
        {
            switch ($_GET["result"]) {
                case 1:
                    echo "Ce compte n existe pas";
                    break;
                
                case 2:
                    echo "mot de passe incorrect";
                    break;

                default:
                    break;
            }
        }

    ?>
</body>
</html>