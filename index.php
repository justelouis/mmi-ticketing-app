<?php
    require("actions/database.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleNavbar.css">
    <link rel="stylesheet" href="css/styleIndex.css">
    <link rel="stylesheet" href="css/styleFooter.css">
    <title>SAE 203</title>
</head>
<body>
    <?php
        include("includes/navbar.php");
    ?>
    
    <h1>Liste Evenement</h1>

    <form method="get">
        <label for="categorieTri">Tri par categorie</label>
        <select name="categorieTri" id="categorieTri">
            <option value="0">Tout</option>
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
        </select>
        <input type="submit" value="Filtrer">
    </form>
    <div id ="evntDiv">
        <?php
            if(isset($_GET["categorieTri"]) && $_GET["categorieTri"] != 0)  //verif si categorie select 
            {
                $categorieId = $_GET["categorieTri"];
                $sqlWhere = " WHERE idCategorie = $categorieId";
            } 
            else 
            {
                $sqlWhere = "";
            }
            $requeteEvnt = $bdd->query("SELECT * FROM $prefixeTable"."evenement".$sqlWhere." ORDER BY date ASC");
            if($requeteEvnt->rowCount() == 0) //verif si pas d'evnt
            {
                ?>
                <p>Aucun événement trouvé dans cette catégorie.</p>
                <?php
            }else
            {
                $evnts = $requeteEvnt->fetchAll();
                $requeteEvnt->closeCursor();

                foreach ($evnts as $evnt)   //affichage des evnts
                {
                    ?>
                    <div class="evnt">
                        <a href="evenement.php?id=<?=$evnt["idEvenement"]?>">
                            <div>
                                <h3><?=$evnt["nom"]?></h3>
                                <p><?=$evnt["description"]?></p>
                                <span><strong>Date :</strong> <?=$evnt["date"]?></span>
                                <span><strong>Lieu :</strong> <?=$evnt["lieu"]?></span>
                            </div>
                        </a>
                    </div>
                    
                    <?php
                }
            ?>
        <?php
            }
        ?>
    </div>

    <?php
        include("includes/footer.php");
    ?>
</body>
</html>