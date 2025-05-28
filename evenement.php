<?php
    if(!empty($_GET))
    {
        require("actions/database.php");

        $getEvnt = $bdd->prepare("SELECT $prefixeTable"."evenement.*, $prefixeTable"."categorie.* 
                                FROM $prefixeTable"."evenement INNER JOIN $prefixeTable"."categorie 
                                ON $prefixeTable"."evenement.idCategorie = $prefixeTable"."categorie.idCategorie 
                                WHERE $prefixeTable"."evenement.idEvenement = :id");
        $getEvnt->execute([
            "id" => $_GET["id"]
        ]);
        $evnt = $getEvnt->fetch();

        $getEvnt->closeCursor();
    }else
    {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$evnt["nom"]?></title>
    <link rel="stylesheet" href="css/styleEvenement.css">
    <link rel="stylesheet" href="css/styleNavbar.css">
    <link rel="stylesheet" href="css/styleFooter.css">
</head>
<body>

    <?php
        include("includes/navbar.php");
    ?>
    <h1><?=$evnt["nom"]?></h1>
    <p><?=$evnt["description"]?></p>
    <p><?=$evnt["date"]?></p>
    <p><?=$evnt["lieu"]?></p>

    <p>Places : <?=$evnt["placeDispo"]?> / <?=$evnt["placeMax"]?></p>
    <p><?=$evnt["nomCategorie"]?></p>


    <?php
        if(isset($_SESSION["auth"]))
        {
            if($_SESSION["admin"])
            {
                ?>
                    <p>Les administrateurs ne peuvent pas réserver de place, mais peuvent <a href="actions/evenement/supEvnt.php?idEvnt=<?=$evnt["idEvenement"]?> ">supprimer un évenement</a> ou <button onclick=ChangerEtatModifMenu(true)>modifier un évenement</button></p>

                    <fieldset id="modifMenu">
                        <legend>Modifier évenement</legend>
                        <h1 onclick=ChangerEtatModifMenu(false)>X</h1>
                        <form action="actions/evenement/modifEvnt.php" method="post">  
                            
                            <input type="hidden" name="idEvnt" value="<?=$evnt["idEvenement"]?>">
                            <label for="nomEvnt">Nom de l'événement</label>
                            <input type="text" name="nomEvnt" id="nomEvnt" required value=<?=$evnt["nom"]?>>

                            <label for="description">Description de l'événement</label>
                            <textarea name="description" id="description" required ><?=$evnt["description"]?></textarea>

                            <label for="date">Date</label>
                            <?php
                                $datetime = date('Y-m-d\TH:i', strtotime($evnt["date"]));
                            ?>
                            <input type="datetime-local" name="date" id="date" required value="<?= $datetime ?>">

                            <label for="lieu">lieu</label>
                            <input type="text" name="lieu" id="lieu" required value=<?=$evnt["lieu"]?>>

                            <input type="hidden" name="placeResa" value=<?= $evnt["placeMax"]-$evnt["placeDispo"]?> >
                            <label for="nbPlace">Nombre de places</label>
                            <input type="number" name="nbPlace" id="nbPlace" min=<?= $evnt["placeMax"]-$evnt["placeDispo"] ?> required value=<?=$evnt["placeMax"]?>>

                            <label for="categorie">Categorie</label>
                            <select name="categorie" id="categorie" required>
                                <?php
                                    $requeteCategorie = $bdd->query("SELECT * FROM categorie");
                                    $categories = $requeteCategorie->fetchAll();

                                    foreach ($categories as $categorie) 
                                    {
                                        ?>
                                            <option value="<?=$categorie["idCategorie"]?>" <?php if($categorie["idCategorie"]== $evnt["idCategorie"]){echo "selected";}?>>
                                                <?=$categorie["nomCategorie"]?>
                                            </option>
                                        <?php
                                    }
                                ?>

                                <input type="submit" value="Modifier l'événement">
                        </form>
                    </fieldset>
                <?php
            }
            elseif($evnt["placeDispo"])
            {            
    ?>
                <button onclick="ChangerEtatMenuReservation(true)">Réserver</button>

                <div id="reservationMenu">
                    <button onclick="ChangerEtatMenuReservation(false)"> X </button>

                    <fieldset>
                        <legend>Reservation</legend>
                        <form action="actions/reservation/reserver.php" method="get">

                        <label for="nbrPlace">Nombre de place</label>
                        <input type="number" name="nbrPlace" id="nbrPlace" required max="<?=$evnt["placeDispo"]?>">

                        <input type="hidden" name="idEvnt" value="<?=$evnt["idEvenement"]?>">

                        <input type="submit" value="Réserver">
                    </form>
                    </fieldset>
                    
                </div>

    <?php 
            }else
            {
                ?>
                    <p>Pu de place disponible, fallez être plus rapide</p>
                <?php
            }
        }else
        {
            ?>
                <p>Pour réserver, vous devez vous être <a href="connexion.php">connecter</a> ou vous devez <a href="inscription.php">créer un compte</a></p>
            <?php
        }
    ?>
    <?php
        include("includes/footer.php");
    ?>
    <script src="js/scriptEvenement.js"></script>
</body>
</html>