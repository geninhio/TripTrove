<?php

include_once __DIR__.'/repository/SelectSite.classe.php';
include_once __DIR__.'/repository/SelectUtilisateur.classe.php';

$selecteur = new SelectSite();
$utilisateur = new SelectUtilisateur("aloy");

$resultat = $utilisateur->selectReservations();

foreach ($resultat as $reservation) {
    $reservation = json_decode(json_encode($reservation), true);
    var_dump($reservation);
}

var_dump($resultat);


$resultat = $selecteur->selectMultiple();
$valeur = $selecteur->selectUnSite(2);
$valeur = json_decode(json_encode($valeur), true);
$prix = $valeur["prix"];
$prix = substr($prix, 0, 3);
$prix = (int)$prix;

// var_dump($valeur);
// var_dump($prix);

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

$html = "";

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

// var_dump($html);

$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$rand_keys = array_rand($input, 2);
// var_dump($input[$rand_keys[0]]);
// var_dump($input[$rand_keys[1]]);

// function ObtenirSites(){

//     $selecteur = new SelectSite();

//     $resultat = $selecteur->selectMultiple();

//     $sites = array();
//     $nomSites = array();
//     $images = array();
//     $prix = array();
//     $dates = array();

//     foreach ($resultat as $info) {
        
//         $info = json_decode(json_encode($info), true);
//         $nomSite = $info["NomSite"].", ".$info["NomVille"].", ".$info["NomPays"];
//         array_push($nomSites, $nomSite);
//         array_push($images, $info["ImageSite"]);
//         array_push($prix, $info["prix"]);
//         array_push($dates, $info["date"]);

//     }

//     $sites = array(
//         "site" => $nomSites,
//         "image" => $images,
//         "prix" => $prix,
//         "date" => $dates,
//         "couleur" => array("text-decoration: none; color: green;", "text-decoration: none; color: red;", "text-decoration: none; color: rgb(255, 197, 5);")
//     );

//     return $sites;
// }



//     $tousLesSites = ObtenirSites();
//     var_dump($tousLesSites);
//     $nomSites = array();
//     $images = array();
//     $prix = array();
//     $dates = array();
//     $html = "";

//     $rand_cles = array_rand($tousLesSites["site"], 2);
//     var_dump($rand_cles);
//     for ($i=0; $i < count($rand_cles) ; $i++) { 
        
//         var_dump($tousLesSites["site"][$rand_cles[$i]]);
//         array_push($nomSites, $tousLesSites["site"][$rand_cles[$i]]);
//         array_push($images, $tousLesSites["image"][$rand_cles[$i]]);
//         array_push($prix, $tousLesSites["prix"][$rand_cles[$i]]);
//         array_push($dates, $tousLesSites["date"][$rand_cles[$i]]);
//     }






