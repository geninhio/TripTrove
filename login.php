<?php
    if (isset($_GET['erreur']) && isset($_GET['pseudo'])) {
        
        $erreur = $_GET['erreur'];
        $pseudo = $_GET['pseudo'];
    }
    else {
        $erreur = null;
        $pseudo = null;
    }

    if (isset($_GET['mdp'])){

        $mdp = $_GET['mdp'];
        $pseudo = $_GET['pseudo'];
    }
    else {
        $mdp = null;
        $pseudo = null;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/styleReservation.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="conteneur">
            <h2>Se Connecter</h2>
            <?php
                if (!($erreur == null)) {
                    echo "<h3 style='color: #d82929;'>Utilisateur inexistant</h3>";
                }

                if (!($mdp == null)){
                    echo "<h3 style='color: #d82929;'>Mot de passe incorrect</h3>";
                }
            ?>
            <form action="./Controller/authentification.redirect.intermediaire.php" method="Post">
                <fieldset>
                    <legend>Informations personnelles</legend>
                    <div>
                        <label for="pseudo">Pseudo :</label>
                        <?php
                            if (!($erreur == null) || !($mdp == null)) {
                                echo '<input type="text" id="pseudo" name="pseudo" value="'.$pseudo.'" required>';
                            }else {
                                echo '<input type="text" id="pseudo" name="pseudo" required>';
                            }

                        ?>
                    </div>

                    <div>
                        <label for="mdp">Mot de Passe : </label>
                        <input type="password" id="mdp" name="mdp" required>
                    </div>
                </fieldset>

                <div class="conteneurBtn"><button type="submit">Se Connecter</button></div>    
            </form>
        </div>
    </main>
</body>
</html>