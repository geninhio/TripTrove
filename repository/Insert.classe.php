<?php



require_once __DIR__."/Connexion.classe.php";
require_once __DIR__."/SelectUtilisateur.classe.php";
require_once __DIR__."/../model/Utilisateur.model.php";
require_once __DIR__."/../model/Email.model.php";

class Insert {

    protected PDO $connexion;
    protected string $pseudo;
    protected string $email;
    protected string $mdp;
    protected DateTime $dateReservation;
    protected Utilisateur $utilisateur;

    public function __construct()
    {
        $connexion = new Connexion();
        $this->connexion = $connexion->getConnexionBd(BDUTILISATEURECRIRE,mdp);
    }


    public function InsererUtilisateur(string $pseudo, string $email, string $mdp)
    {
        $this->utilisateur = new Utilisateur();
        $this->utilisateur->setPseudo($pseudo);
        $this->utilisateur->setMdp($mdp);

        //var_dump($this->utilisateur->getPseudo());

        try {
            $id = 0;
            $pdoRequete = $this->connexion->prepare("insert into Utilisateur values(:id, :pseudo, :mdp)");
            
            $pdoRequete->bindParam(":id", $id, PDO::PARAM_INT);
            $pdoRequete->bindParam(":pseudo",$this->utilisateur->getPseudo(),PDO::PARAM_STR);
            $pdoRequete->bindParam(":mdp",password_hash($this->utilisateur->getMdp(), PASSWORD_DEFAULT));
        
            $pdoRequete->execute();

            $selectUtilisateurCourant = new SelectUtilisateur($this->utilisateur->getPseudo());
            //var_dump($selectUtilisateurCourant->select());
            $this->utilisateur->setId($selectUtilisateurCourant->select()->getId());


            $idmail = 0;
            $pdoRequete2 = $this->connexion->prepare("insert into Email values(:idmail, :idutilisateur, :email)");
            $pdoRequete2->bindParam(":idmail", $idmail, PDO::PARAM_INT);
            $pdoRequete2->bindParam(":idutilisateur", $this->utilisateur->getId(), PDO::PARAM_INT);
            $pdoRequete2->bindParam(":email",$email,PDO::PARAM_STR);

            $pdoRequete2->execute();
    
        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }        

    }

}