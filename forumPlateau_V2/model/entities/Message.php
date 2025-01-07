<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Message extends Entity{

    private $id;
    private $texte;
    private $dateMes;
    private $utilisateur;
    private $sujet;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of texte
     */ 
    public function getTexte(){
        return $this->texte;
    }

    /**
     * Set the value of texte
     *
     * @return  self
     */ 
    public function setTexte($texte){
        $this->texte = $texte;
        return $this;
    }

    /**
     * Get the value of utilisateur
     */ 
    public function getUtilisateur(){
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur
     *
     * @return  self
     */ 
    public function setUtilisateur($utilisateur){
        $this->utilisateur = $utilisateur;
        return $this;
    }

    public function __toString(){
        return $this->texte;
    }

    /**
     * Get the value of dateMes
     */ 
    public function getDateMes()
    {
        return $this->dateMes;
    }

    public function getDateMesFr()
    {
        $dateFr = new \DateTime($this->dateMes);
        return $dateFr->format("d-m-Y à H:i");
    }

    /**
     * Set the value of dateMes
     *
     * @return  self
     */ 
    public function setDateMes($dateMes)
    {
        $this->dateMes = $dateMes;

        return $this;
    }

    /**
     * Get the value of sujet
     */ 
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set the value of sujet
     *
     * @return  self
     */ 
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }
}