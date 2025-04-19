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
            <form action="./Controller/authentification.redirect.intermediaire.php" method="Post">
                <fieldset>
                    <legend>Informations personnelles</legend>
                    <div>
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" id="pseudo" name="pseudo" required>
                    </div>

                    <div>
                        <label for="mdp">Mot de Passe : </label>
                        <input type="text" id="mdp" name="mdp" required>
                    </div>
                </fieldset>

                <div class="conteneurBtn"><button type="submit">Se Connecter</button></div>    
            </form>
        </div>
    </main>
</body>
</html>