<?php
    require("actions/database.php");
    if(!isset($_SESSION["admin"]) || !$_SESSION["admin"] )
    {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page admin</title>
</head>
<body>
    Bienvenue sur admin
    <a href="index.php">Revenir a l'accueil</a>

    <fieldset>
        <legend>Crer une categorie</legend>

        <?php
            if(isset($_GET["categExiste"]))
            {
                echo "Cette catégorie existe déjà";
            }
        ?>
        <form action="actions/categorie/creerCategorie.php" method="post">
            <label for="nomCategorie">Nom de la categorie</label>
            <input type="text" name="nomCategorie" id="nomCategorie" required>

            <input type="submit" value="Creer categorie">
        </form>
    </fieldset>

    <fieldset>
        <legend>Modifier Catégorie</legend>
        <form action="actions/categorie/modifCategorie.php" method="post">
            <label for="categorieAModifier">Catégorie à modifier</label>
            <select name="categorieAModifier" id="categorieAModifier" required>
                <?php
                    $requeteCategorie = $bdd->query("SELECT * FROM $prefixeTable"."categorie WHERE idCategorie > 1");   //car on peut pas modifier la categorie "sans categorie" (id=1)
                    $categories = $requeteCategorie->fetchAll();
                    $requeteCategorie->closeCursor();

                    foreach ($categories as $categorie) 
                    {
                        ?>
                            <option value="<?=$categorie["idCategorie"]?>"><?=$categorie["nomCategorie"]?></option>
                        <?php
                    }
                ?>
            </select>

            <label for="nouveauNom">Nouveau nom de la catégorie</label>
            <input type="text" name="nouveauNom" id="nouveauNom" required>

            <input type="submit" value="Modifier la catégorie">
        </form>
    </fieldset>

    <fieldset>
        <legend>Supprimer une catégorie</legend>

        <form action="actions/categorie/supprimerCategorie.php" method="post">
            <label for="categorieASupprimer">Catégorie à supprimer</label>
            <select name="categorieASupprimer" id="categorieASupprimer" required>
                <?php
                    $requeteCategorie = $bdd->query("SELECT * FROM $prefixeTable"."categorie WHERE idCategorie > 1");   //car on peut pas supprimer la categorie "sans categorie" (id=1)
                    $categories = $requeteCategorie->fetchAll();
                    $requeteCategorie->closeCursor();

                    foreach ($categories as $categorie) 
                    {
                        ?>
                            <option value="<?=$categorie["idCategorie"]?>"><?=$categorie["nomCategorie"]?></option>
                        <?php
                    }
                ?>
            </select>

            <input type="submit" value="Supprimer la catégorie">
        </form>
    </fieldset>

    <fieldset>
        <legend>Ajouter un événement</legend>

        <form action="actions/evenement/creerEvnt.php" method="post">
            <label for="nomEvnt">Nom de l'événement</label>
            <input type="text" name="nomEvnt" id="nomEvnt" required>

            <label for="description">Description de l'événement</label>
            <textarea name="description" id="description" required></textarea>

            <label for="date">Date</label>
            <input type="datetime-local" name="date" id="date" required>

            <label for="lieu">lieu</label>
            <input type="text" name="lieu" id="lieu" required>

            <label for="nbPlace">Nombre de places</label>
            <input type="number" name="nbPlace" id="nbPlace" min=1 required>

            <label for="categorie">Categorie</label>
            <select name="categorie" id="categorie" required>
                <?php
                    $requeteCategorie = $bdd->query("SELECT * FROM $prefixeTable"."categorie");
                    $categories = $requeteCategorie->fetchAll();
                    $requeteCategorie->closeCursor();

                    foreach ($categories as $categorie) 
                    {
                        ?>
                            <option value="<?=$categorie["idCategorie"]?>"><?=$categorie["nomCategorie"]?></option>
                        <?php
                    }
                ?>

                <input type="submit" value="Créer l'événement">
            </select>
        </form>
    </fieldset>
</body>
</html>