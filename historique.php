<?php
require_once __DIR__."/repository/SelectUtilisateur.classe.php";




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
                <a href="reservation.php">Nouvelle réservation</a>
            </div>
        </div>
        <!-- <div class="déroulant" >
            <span href="">Paramètres</span>

            <div class="déroulantMenu">    
                <a href="">Notifications</a>
                <a href="">Favoris</a>
                <a href="">Langue</a>
            </div>
        </div> -->
        <div class="déroulant" >
            <span href="">Gérer mon compte</span>

            <div class="déroulantMenu">    
                <a href="">Déconnexion</a>
            </div>
        </div>
        <script src="./JS/formulaires.js"></script>
    </div>

    <main>
        <div id="grandConteneurOffres">
            <h1 style="margin-left: 2em"><br>Votre Historique de réservations</br></h1>
            <div class="conteneurOffres">

                <?php
                    include_once __DIR__.'/html/elementHTML.include.php';

                    if(!(ObtenirReservations("aloy") == "")){

                        echo ObtenirReservations("aloy");
                    }
                    else {
                        echo "<h1>Vous n'avez pas encore éffectué de reservations!!!";
                    }
                ?>
            </div>
        </div>
    </main>

</body>