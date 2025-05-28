<nav>
    <a href="index.php">
        <img src="" alt="logo">
    </a>

    <a href="index.php">Les spectales</a>

    <div>
        <?php
            if(isset($_SESSION["auth"]))
            {
                if($_SESSION["admin"])
                {
                    ?>
                        <a href="admin.php">Page admin</a>
                        <a href="actions/connexion/deconnexion.php">déconnexion admin</a>
                    <?php
                }else
                {
                    ?>
                        <a href="profil.php">Profil</a>
                        <a href="actions/connexion/deconnexion.php">Se déconnecter</a>
                    <?php
                }
            }else
            {
                ?>
                    <a href="inscription.php">Pour s'inscrire</a>
                    <a href="connexion.php">Se connecter</a>
                <?php
            }
        ?>
    </div>
</nav>