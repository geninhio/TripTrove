<?php

class Email
{
    private int $id;
    private int $idUtilisateur;
    private string $email;



    /**
     * Setter d'Utilisateur
     */
    public function setId(int $p)
    {
        $this->id = $p;
    }


    public function setEmail(string $p)
    {
        $this->email = $p;
    }

    /**
     * Getter d'Utilisateur
     */
    public function getId()
    {
        return $this->id;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function getEmail()
    {
        return $this->email;
    }

}