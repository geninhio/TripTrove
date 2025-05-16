<?php
include_once __DIR__.'./../repository/SelectSite.classe.php';
include_once __DIR__.'./../repository/SelectUtilisateur.classe.php';

function ObtenirSites(){

    $selecteur = new SelectSite();

    $resultat = $selecteur->selectMultiple();

    $sites = array();
    $nomSites = array();
    $images = array();
    $prix = array();
    $dates = array();

    foreach ($resultat as $info) {
        
        $info = json_decode(json_encode($info), true);
        $nomSite = $info["NomSite"].", ".$info["NomVille"].", ".$info["NomPays"];
        array_push($nomSites, $nomSite);
        array_push($images, $info["ImageSite"]);
        array_push($prix, $info["prix"]);
        array_push($dates, $info["date"]);

    }

    $sites = array(
        "site" => $nomSites,
        "image" => $images,
        "prix" => $prix,
        "date" => $dates,
        "couleur" => array("text-decoration: none; color: green;", "text-decoration: none; color: red;", "text-decoration: none; color: rgb(255, 197, 5);")
    );

    return $sites;
}

function ObtenirReservations($p){

    $utilisateur = new SelectUtilisateur($p);
    $selecteur = new SelectSite();
    $listeIdSites = array();
    $SitesReserves = array();
    $nomSites = array();
    $images = array();
    $prix = array();
    $dates = array();
    $html = "";

    
    $resultat = $utilisateur->selectReservations();

    if (count($resultat) == 0) {
        
        return $html;
    }
    else {
        
        foreach ($resultat as $reservation) {

            $reservation = json_decode(json_encode($reservation), true);
            array_push($listeIdSites, $reservation["IdSite"]);
            array_push($dates, $reservation["dateReservation"]);
            // var_dump($listeIdSites);
            // var_dump($dates);
        }
    
        foreach ($listeIdSites as $id) {
    
            $site = json_decode(json_encode($selecteur->selectUnSite($id)), true);
            array_push($SitesReserves, $site);

        }
    
        foreach ($SitesReserves as $info) {
            
            $nomSite = $info["NomSite"].", ".$info["NomVille"].", ".$info["NomPays"];
            array_push($nomSites, $nomSite);
            array_push($images, $info["ImageSite"]);
            array_push($prix, $info["prix"]);
        }
    
        $sites = array(
            "site" => $nomSites,
            "image" => $images,
            "prix" => $prix,
            "date" => $dates,
            "couleur" => array("text-decoration: none; color: green;", "text-decoration: none; color: red;", "text-decoration: none; color: rgb(255, 197, 5);")
        );
    
        for ($i=0; $i < count($sites["site"]) ; $i++) { 
            $j = $i % 3;
            $html .= '<div class="offres">
        <div class="offresCorps">
            <img class="imageSite" src="'.$sites["image"][$i].'" alt="">
            <section class="titre"><button class="btnTitre"><a href="offre.php?choix='.$i.'" style="'.$sites["couleur"][$j].'"><h2>'.$sites["site"][$i].'</h2></a></button></section>
        </div>
    
        <div class="offresPieds">
            <span class="environ">Environ</span>
            <div class="prix">
                <h3 class="titrePrix"> Coût : '.$sites["prix"][$i].'</h3>
                <p >'.$sites["date"][$i].'</p>
            </div>
        </div>
        </div>';
        }
    
        return $html;
    }
    
}


function remplirLesSites() {

    $sites = ObtenirSites();
    $html = "";

    for ($i=0; $i < count($sites["site"]) ; $i++) { 
        $j = $i % 3;
        $html .= '<div class="offres">
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

    return $html;
}

function remplirDeuxSites(){

    $tousLesSites = ObtenirSites();
    $nomSites = array();
    $images = array();
    $prix = array();
    $dates = array();
    $html = "";

    $rand_cles = array_rand($tousLesSites["site"], 2);
    for ($i=0; $i < count($rand_cles) ; $i++) { 
        
        array_push($nomSites, $tousLesSites["site"][$rand_cles[$i]]);
        array_push($images, $tousLesSites["image"][$rand_cles[$i]]);
        array_push($prix, $tousLesSites["prix"][$rand_cles[$i]]);
        array_push($dates, $tousLesSites["date"][$rand_cles[$i]]);
    }

    $sites = array(
        "site" => $nomSites,
        "image" => $images,
        "prix" => $prix,
        "date" => $dates,
        "couleur" => array("text-decoration: none; color: green;", "text-decoration: none; color: red;", "text-decoration: none; color: rgb(255, 197, 5);")
    );
    
    for ($i=0; $i < count($sites["site"]) ; $i++) { 
        $j = $i % 3;
        $html .= '<div class="offres">
    <div class="offresCorps">
        <img class="imageSite" src="'.$sites["image"][$i].'" alt="">
        <section class="titre"><button class="btnTitre"><a href="reservation.php" style="'.$sites["couleur"][$j].'"><h2>'.$sites["site"][$i].'</h2></a></button></section>
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

    return $html;
}

function RemplirOffre($id){
    
    $listeOffres = array(
        array("Section1", "Section2", "Section3"),
        array("Section1", "Section2", "Section3"),
        array("Section1", "Section2", "Section3")
    );
    $sites = ObtenirSites();
    $images = $sites["image"];
    $html = "";

    $html .= '<div class="titre">
    <h1>'.$sites["site"][$id].'</h1>
    <form action="./formulaireReservation.php" method="Post"> 
    <input type="hidden" name="offre" value='.$id.'>
    <button type="submit"><a>Reserver</a></button>
    </form>
    </div>';
    foreach ($listeOffres[$id] as $valeur) {

        $html .= '<div class="resume-forward">
        <div class="texte-resume">
        <h1>'.$valeur.'</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus convallis id turpis ac vulputate. Cras viverra ultricies ornare. Phasellus dictum nisi vel ligula venenatis viverra ut et leo. Donec egestas ex eu euismod tempor. Donec tempus et elit eget posuere. Cras sit amet purus vitae enim pellentesque vulputate. Pellentesque vel posuere sem, sit amet bibendum nisl. Etiam quis sagittis libero. </p>
        </div>
        <img class="image-moyen" src="'.$images[$id].'" alt="">
        </div>';
    }

    return $html;
}

function ObtenirInfoPourFormulaire($id){

    $selecteur = new SelectSite();

    $valeur = $selecteur->selectUnSite($id);
    $valeur = json_decode(json_encode($valeur), true);
    $prix = $valeur["prix"];
    $prix = substr($prix, 0, 3);
    $prix = (int)$prix;
    $titre = $valeur["NomSite"]." ".$valeur["NomVille"]." ".$valeur["NomPays"];
    $idSite = $valeur["IdSite"];
    $date = $valeur["date"];

    $infos = array(
        "prix" => $prix ,
        "titre" => $titre,
        "idSite" => $idSite,
        "date" => $date
    );

    return $infos;
}
