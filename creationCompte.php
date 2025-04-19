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
            <h2>Créer un Compte</h2>
            <form action="./gestionCreationCompte.php" method="Post">
                <fieldset>
                    <legend>Informations personnelles</legend>
                    <div>
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" id="pseudo" name="pseudo" required>
                    </div>

                    <div>
                        <label for="email">Adresse e-mail : </label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div>
                        <label for="mdp">Mot de Passe : </label>
                        <input type="text" id="mdp" name="mdp" required>
                    </div>
                </fieldset>

                <div class="conteneurBtn"><button type="submit">Créer le compte</button></div>    
            </form>
        </div>
    </main>
</body>
</html>