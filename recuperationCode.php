<?php
    require_once __DIR__."/Controller/SessionIntermediaire.php";
    
    $session = new SessionIntermediaire();
    session_start();
    $session->validerSession();

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
            <h2>Validation d'identité</h2>
            <form action="./Controller/authentification.redirect.finale.php" method="Post">
                <fieldset>
                    <legend>Code de validation</legend>
                    <div>
                        <p>Veuillez entrer le code que nous vous avons envoyé par courriel.</p>  
                    </div>

                    <div>
                        <label for="code">Code : </label>
                        <input type="text" id="code" name="code" required>
                    </div>
                </fieldset>

                <div class="conteneurBtn"><button type="submit">Valider</button></div>    
            </form>
        </div>
    </main>
</body>
</html>