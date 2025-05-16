<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPDM</title>
</head>
<body>
    <p>Une problème est survenu avec votre utilisation de l'application.</p>
    <hr>
    <p>Vous avez été exclus des opérations normales.</p>
</body>
</html>
<?php
    // Ne retirer pas ces lignes de code
    error_log(" Client : ".$_SERVER['REMOTE_ADDR']."\n\r" ,0);
?>
