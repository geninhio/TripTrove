<?php

require_once __DIR__."/Session.abstract.php";



class SessionIntermediaire extends Session
{
    /**
     * Initialise les paramètres de session.
     */
    public function __construct()
    {    
        require_once __DIR__."/../../../config.bd.include.php";     
        session_name("intermediaire");
        parent::__construct(DUREE_SESSIONINTERMEDIAIRE);      
    }


    /**
     * Affecte les valeurs nécessaires à la validation de la session complète.
     */
    public function setSessionIntermediaire(string $p, string $code, string $remote)
    {
        $_SESSION['pseudo'] = $p;
        $_SESSION['code'] = $code;
        $_SESSION['ip'] = $remote;
        $_SESSION['delai'] = time();
    }

    public function setSessionFinale(string $p, string $remote){
        null;
    }

    /**
     * Récupère la session active et vérifie la validité avec les variables $_SESSSION
     */
    public function validerSession()
    {
        try 
        {
            if (session_status() == PHP_SESSION_ACTIVE){
                
                if (!isset($_SESSION['pseudo']) || !isset($_SESSION['code']) || !isset($_SESSION['ip']) || !isset($_SESSION['delai']))
                {
                    $this->supprimer();
                    error_log("[".date("d/m/o H:i:s e",time())."] Accès directe refusée au requérant ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/TripTrove.session.log");
                    header("Location: login.php");
                    exit();

                } elseif ((time() - $_SESSION['delai']) > 60*2) {
                    error_log("[".date("d/m/o H:i:s e",time())."] Session expirée : Requérant ".$_SERVER['REMOTE_ADDR']."Client authorisé: ".$_SESSION['pseudo']."\n\r" ,3, __DIR__."/../../../logs/TripTrove.session.log");
                    $this->supprimer();
                    header("Location: login.php");
                    exit();
                    
                }

            } else {
                echo "session inactive";
            }
        } catch (Exception $e) {
            error_log("Erreur sur la session: ".$e->getMessage());
        }
        
    }



    /**
     * Supprime la session active et antidate le cookie.
     */
    public function supprimer()
    {
        // Une session doit être active et ce doit être la même session que celle qui est à détruire

        if (session_status() == PHP_SESSION_ACTIVE){

            $parametresSession = session_get_cookie_params(); //Pour antidater (détruire) le cookie

            setcookie(
                session_name(), '', time()-60*60*24*30,
                $parametresSession["path"], $parametresSession["domain"],
                $parametresSession["secure"], $parametresSession["httponly"]
            );

            session_destroy(); //La session est effacée
            $_SESSION = array(); //La variable superglobale est supprimée
        }
    }
}


