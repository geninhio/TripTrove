<?php
    require_once __DIR__."/Controller/SessionFinale.php";

    $session = new SessionFinale();
    session_start();
    $session->validerSession();

    $offre = filter_input(INPUT_GET, "choix");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/styleOffres.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <div>
           
        </div>
    </header>

    <div class="navigation" >
        <a href="pageprotegee.php">Accueil</a>
        <div class="déroulant" >
            <span>Mes réservations&nbsp;</span>

            <div class="déroulantMenu">    
                <a href="historique.php">Historique de réservations</a>
            </div>
        </div>

        <div class="déroulant" >
            <span >Gérer mon compte</span>

            <div class="déroulantMenu">    
                <a href="deconnexion.php">Déconnexion</a>
            </div>
        </div>
        <script src="./JS/formulaires.js"></script>
    </div>

    <main>
        <?php
            include_once __DIR__.'/html/elementHTML.include.php';

            echo RemplirOffre($offre);
        ?>
    </main>

</body>