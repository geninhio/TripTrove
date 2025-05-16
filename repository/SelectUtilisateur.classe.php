<?php

require_once __DIR__.'/Select.abstract.php';
require_once __DIR__.'/../model/Utilisateur.model.php';

class SelectUtilisateur extends Select
{
    protected string $pseudo;
    protected Utilisateur $user;


    public function __construct(string $p)
    {
        $this->pseudo = $p;
        $this->user = new Utilisateur();
        parent::__construct(); 
    }
    

    
    /**
     * Sélection du user selon le courriel
     */
    public function select()
    {
        try {
            $pdoRequete = $this->connexion->prepare("select * from Utilisateur where Pseudo =:pseudo");
    
            $pdoRequete->bindParam(":pseudo",$this->pseudo,PDO::PARAM_STR);
        
            $pdoRequete->execute();
    
            $user = $pdoRequete->fetch(PDO::FETCH_OBJ);

            $this->user->setId($user->IdUtilisateur);
            $this->user->setPseudo($user->Pseudo);
            $this->user->setMdp($user->mdp);

            return $this->user;
    
        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }        
    }

    public function selectNombreUtilisateur(){

        try {
            $pdoRequete = $this->connexion->prepare("select COUNT(Pseudo) as NbrePseudo from `Utilisateur` where Utilisateur.Pseudo = :pseudo");
    
            $pdoRequete->bindParam(":pseudo",$this->pseudo,PDO::PARAM_STR);
        
            $pdoRequete->execute();
    
            $resultat = $pdoRequete->fetch(PDO::FETCH_OBJ);

            return $resultat;
    
        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }  
    }

    public function selectCourrielUtilisateur()
    {
        try {
            $userCourant = $this->select();

            $pdoRequete = $this->connexion->prepare("select email from Email where IdUtilisateur =:id");
    
            $pdoRequete->bindParam(":id",$userCourant->getId(),PDO::PARAM_INT);
        
            $pdoRequete->execute();
    
            $resultat = $pdoRequete->fetch(PDO::FETCH_OBJ);

            $courrielObtenu = $resultat->email;

            return $courrielObtenu;
    
        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }        
    }

    public function selectReservations(){

        try {
            $userCourant = $this->select();
            
            $pdoRequete = $this->connexion->prepare("select * from DateReservation where IdUtilisateur =:id");
            $pdoRequete->bindParam(":id",$userCourant->getId(),PDO::PARAM_INT);

            $pdoRequete->execute();

            $resultat = $pdoRequete->fetchAll(PDO::FETCH_OBJ);

            return $resultat;

        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }   
    }

    /**
     * Sélection de plusieurs users
     */

     public function selectMultiple()
     {
        null;
     }
}


