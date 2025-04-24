<?php
    require_once __DIR__."/Controller/SessionFinale.php";

    $session = new SessionFinale();
    session_start();
    $session->validerSession();
    
    $sites = array(
        "site" => array("Tagidor, Bangou, Cameroun", "Kribi, plage, Cameroun", "sultanat, foumban, Cameroun"),
        "image" => array("./Images/Tagidor-1.png", "./Images/Image-Kribi.jpg", "./Images/camaroun-sultanat-foumban.jpg"),
        "prix" => array("100 \$CAD / nuit", "150 \$CAD / tour", "50 \$CAD / tour"),
        "date" => array("27 avril", "15 mai","15 mai"),
        "couleur" => array("text-decoration: none; color: green;", "text-decoration: none; color: red;", "text-decoration: none; color: rgb(255, 197, 5);")
    );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/style.css">
    <script src="./JS/offres.js"></script>
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
        <div class="déroulant" >
            <span href="">Paramètres</span>

            <div class="déroulantMenu">    
                <a href="">Notifications</a>
                <a href="">Favoris</a>
                <a href="">Langue</a>
            </div>
        </div>
        <div class="déroulant" >
            <span href="">Gérer mon compte</span>

            <div class="déroulantMenu">    
                <a href="">Gestion du mot de passe</a>
                <a href="">Préférences</a>
                <a href="">Déconnexion</a>
            </div>
        </div>
    </div>
    
    <main>
        <div class="conteneurRecherche">
            <div action="">
                <input type="text"  placeHolder="Où allez-vous ?" class="recherche">
                <button type="submit" class="btnRecherche">Rechercher</button>
            </div>
        </div>

        <div id="grandConteneurOffres">
            <h1 style="margin-left: 2em"><br>Des bons plans</br></h1>
            <div class="conteneurOffres">

                <?php
                    for ($i=0; $i < count($sites["site"]) ; $i++) { 
                        $j = $i % 3;
                        echo '<div class="offres">
                    <div class="offresCorps">
                        <img class="imageSite" src="'.$sites["image"][$i].'" alt="">
                        <section class="titre"><button class="btnTitre"><a href="offre.php?choix='.$i.'" style="'.$sites["couleur"][$j].'"><h2>'.$sites["site"][$i].'</h2></a></button></section>
                    </div>

                    <div class="offresPieds">
                        <span class="environ">Environ</span>
                        <div class="prix">
                            <h3 class="titrePrix">'.$sites["prix"][$i].'</h3>
                            <p >'.$sites["date"][$i].'</p>
                            
                        </div>
                    </div>
                    </div>';
                    }
                                            
                ?>
            </div>
        </div>

    </main>

    <footer class="piedsDePage">

    </footer>
</body>
</html>
