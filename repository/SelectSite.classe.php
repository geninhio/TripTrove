<?php

require_once __DIR__.'/Select.abstract.php';
require_once __DIR__.'/../model/Utilisateur.model.php';

class SelectSite extends Select
{
    protected string $pseudo;
    protected Utilisateur $user;


    public function __construct()
    {
        parent::__construct(); 
    }
    

    
    /**
     * Sélection du user selon le courriel
     */
    public function select()
    {
       null;
    }


    /**
     * Sélection de plusieurs users
     */

     public function selectMultiple()
     {
        try {
            $pdoRequete = $this->connexion->prepare("select * from Selectionner_Site");
        
            $pdoRequete->execute();
    
            $site = $pdoRequete->fetchAll(PDO::FETCH_OBJ);

            return $site;
    
        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        } 
     }

    public function selectUnSite($id){

        try {
            $pdoRequete = $this->connexion->prepare("select * from Selectionner_Site where Selectionner_Site.IdSite = :id");
            
            $pdoRequete->bindParam(":id",$id,PDO::PARAM_INT);

            $pdoRequete->execute();
    
            $site = $pdoRequete->fetch(PDO::FETCH_OBJ);

            return $site;
    
        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        } 
    }
}


