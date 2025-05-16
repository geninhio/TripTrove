<?php
 /**
  * Dépendances 
  */
require_once __DIR__."/SessionIntermediaire.php";
require_once __DIR__."/../repository/SelectUtilisateur.classe.php";
require_once __DIR__.'/../model/Utilisateur.model.php';

function EnvoyerMail($to, $message)
{
    $subject = 'Code de vérification';
    $headers = 
    'From: tandjiwouahah25t@techinfo420.ca' . "\r\n".
    'X-Mailer: PHP/' . phpversion();

    return mail($to, $subject, $message, $headers);
}


if (!empty($_POST['pseudo']) and !empty($_POST['mdp']))
{
    $pseudo = filter_input(INPUT_POST,"pseudo", FILTER_DEFAULT);
    $mdp = filter_input(INPUT_POST,"mdp",FILTER_DEFAULT);

    /**
     * Requête sur la bd avec le pseudo
     */
    $requeteUtilisateur = new SelectUtilisateur($pseudo); //courriel reçu de la requête http
    $user = $requeteUtilisateur->select();
    $courriel = $requeteUtilisateur->selectCourrielUtilisateur();

    if (password_verify($mdp, $user->getMdp()))
    {
        //OK je peux faire la session

        $code = (string)rand(100000,999999);
        $session = new SessionIntermediaire();
        session_start();
        $session->setSessionIntermediaire($pseudo, $code, $_SERVER['REMOTE_ADDR']);

        EnvoyerMail($courriel, "Votre code est : ".$code);

        header("Location: ./../recuperationCode.php");
    }else 
    {
        //Mauvais mot de passe, rediriger
        header("Location: ./../login.php");
    }

}else 
{
    error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormal - mail ou mdp absent: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/14avril2025.acces.log");
    header("Location: ../views/erreur.php");
}


