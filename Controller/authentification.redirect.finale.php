<?php
 /**
  * Dépendances 
  */
require_once __DIR__."/SessionFinale.php";
// require_once __DIR__."/../repository/SelectUtilisateur.classe.php";
// require_once __DIR__.'/../model/Utilisateur.model.php';
require_once __DIR__.'/authentification.redirect.intermediaire.php';


if (!empty($_POST['code']))
{
    $codeObtenu = filter_input(INPUT_POST,"code", FILTER_DEFAULT);

    $session = new SessionIntermediaire();
    session_start();

    $code = $_SESSION['code'];
    $pseudo = $_SESSION['pseudo'];
    $session->supprimer();

    if ($codeObtenu == $code)
    {
        //OK je peux faire la session

        $session = new SessionFinale();
        session_start();
        $session->setSessionFinale($pseudo, $_SERVER['REMOTE_ADDR']);

        header("Location: ./../pageprotegee.php");
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


