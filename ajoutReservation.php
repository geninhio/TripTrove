<?php
require_once __DIR__."/repository/Insert.classe.php";

$insertion = new Insert();

if (empty($_POST['heure']) || empty($_POST['personnes']) || empty($_POST['carte'])){

    error_log("[".date("d/m/o H:i:s e",time())."] Ajout de réservation anormal - heure, nombre de personnes ou numéro de carte absent, action refusée au requérant ".$_SESSION['pseudo']."\n\r");
    
    header("Location: ./erreur.php");
    exit();
}else {
    
    $idSite = (int)filter_var($_GET["idSite"],FILTER_DEFAULT);
    $temps = filter_input(INPUT_POST,"heure",FILTER_DEFAULT);
    $date = filter_var($_GET["date"],FILTER_DEFAULT);
    $date = $date." ".$temps;

    // var_dump($date);

    $insertion->InsererReservation($idSite, 13, $date);

    header("Location: ./historique.php");
}


