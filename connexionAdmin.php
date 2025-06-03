<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="css/styleConnexion.css">
</head>
<body>
    <fieldset>
        <legend>Connexion admin</legend>

        <form action="actions/connexion/connexionAdmin.php" method="post">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo">

            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
            <img src="imgs/eyeClose.jpg" alt="oeil fermé, mot de passe caché" id="eye" onclick="SwitchVisibilityPw()">

            <input type="submit" value="Se connecter">
        </form>
    </fieldset>
    <a href="index.php">Revenir a l'accueil</a>
    <script src="js/scriptConnexion.js"></script>
</body>
</html>