<?php

require_once __DIR__."/repository/Insert.classe.php";
require_once __DIR__."/repository/SelectUtilisateur.classe.php";

if (empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['mdp'])){

    error_log("[".date("d/m/o H:i:s e",time())."] Création de compte douteuse - pseudo mail ou mdp absent: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../logs/TripTrove.creationCompte.log");
    header("Location: ./erreur.php");
    exit();
}else {
    
    $pseudo = filter_input(INPUT_POST,"pseudo", FILTER_DEFAULT);
    $email = filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL); 
    $mdp = filter_input(INPUT_POST,"mdp", FILTER_DEFAULT);


    $selecteur = new SelectUtilisateur($pseudo);
    $insertion = new Insert();

    if ($selecteur->selectNombreUtilisateur()->NbrePseudo > 0) {
        
        header("Location: ./creationCompte.php?erreur=1&pseudo=$pseudo");
    }
    else {
        
        $insertion->InsererUtilisateur($pseudo, $email, $mdp);

        header("Location: ./login.php");
    }

}
