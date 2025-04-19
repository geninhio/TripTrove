<?php
    $offre = filter_input(INPUT_GET, "choix");

    $sites = array(
        "site" => array("Tagidor, Bangou, Cameroun", "Kribi, plage, Cameroun", "sultanat, foumban, Cameroun"),
        "image" => array("./Images/Tagidor-1.png", "./Images/Image-Kribi.jpg", "./Images/camaroun-sultanat-foumban.jpg"),
        "prix" => array("100 \$CAD / nuit", "150 \$CAD / tour", "50 \$CAD / tour"),
        "date" => array("27 avril", "15 mai","15 mai"),
        "couleur" => array("text-decoration: none; color: green;", "text-decoration: none; color: red;", "text-decoration: none; color: rgb(255, 197, 5);")
    );

    $listeOffres = array(
        array("Section1", "Section2", "Section3"),
        array("Section1", "Section2", "Section3"),
        array("Section1", "Section2", "Section3")
    );

    $images = array("./Images/Tagidor-1.png", "./Images/Image-Kribi.jpg", "./Images/camaroun-sultanat-foumban.jpg")
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
                <a href="">Historique de réservations</a>
                <a href="">Nouvelle réservation</a>
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
        <script src="./JS/formulaires.js"></script>
    </div>

    <main>
        <?php
            echo '<div class="titre">
            <h1>'.$sites["site"][$offre].'</h1>
            <button type="submit">Reserver</button>
            </div>';

            foreach ($listeOffres[$offre] as $value) {
                echo '<div class="resume-forward">
            <div class="texte-resume">
            <h1>'.$valeur.'</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus convallis id turpis ac vulputate. Cras viverra ultricies ornare. Phasellus dictum nisi vel ligula venenatis viverra ut et leo. Donec egestas ex eu euismod tempor. Donec tempus et elit eget posuere. Cras sit amet purus vitae enim pellentesque vulputate. Pellentesque vel posuere sem, sit amet bibendum nisl. Etiam quis sagittis libero. </p>
            </div>
            <img class="image-moyen" src="'.$images[$offre].'" alt="">
            </div>';
            }
        ?>
    </main>

</body>