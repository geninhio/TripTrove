<?php

class Utilisateur 
{
    private int $id;
    private string $pseudo;
    private string $mdp;


    /**
     * Setter d'Utilisateur
     */
    public function setId(int $p)
    {
        $this->id = $p;
    }

    public function setPseudo(string $p)
    {
        $this->pseudo = $p;
    }

    public function setMdp(string $p)
    {
        $this->mdp = $p;
    }


    /**
     * Getter d'Utilisateur
     */
    public function getId()
    {
        return $this->id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getMdp()
    {
        return $this->mdp;
    }
}