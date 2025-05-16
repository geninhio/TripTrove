<?php
    require_once __DIR__."/Controller/SessionFinale.php";

    // $session = new SessionFinale();
    // session_start();
    // $session->validerSession();
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/style.css">
    <script src="./JS/offres.js"></script>
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
                <a href="">Historique de réservations</a>
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
    </div>
    
    <main>
        <div class="conteneurRecherche">
            <div action="">
                <input type="text"  placeHolder="Où allez-vous ?" class="recherche" id="recherche">
                <button onclick = 'Filtrer()' class="btnRecherche">Rechercher</button>
            </div>
        </div>

        <div id="grandConteneurOffres">
            <h1 style="margin-left: 2em"><br>Des bons plans</br></h1>
            <div class="conteneurOffres">

                <?php
                    include_once __DIR__.'/html/elementHTML.include.php';
     
                    echo remplirLesSites();                            
                ?>
            </div>
        </div>

    </main>

    <footer class="piedsDePage">

    </footer>
</body>
</html>
