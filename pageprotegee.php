<?php
    require_once __DIR__."/Controller/SessionFinale.php";

    $session = new SessionFinale();
    session_start();
    $session->validerSession();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/style.css">
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
                <a href="reservation.php">Nouvelle réservation</a>
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
        <div>

        </div>
        <div id="grandConteneurOffres">
            <h1 style="margin-left: 2em"><br>Quelques offres</br></h1>
            <div class="conteneurOffres">

                <?php
                    include_once __DIR__.'/html/elementHTML.include.php';
     
                    echo remplirDeuxSites();
                ?>

            </div>
        </div>

    </main>

    <footer class="piedsDePage">

    </footer>
</body>
</html>