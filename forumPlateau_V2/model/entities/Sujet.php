<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Sujet extends Entity{

    private $id;
    private $titre;
    private $utilisateur;
    private $categorie;
    private $dateSuj;
    private $lock;

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
     * Get the value of titre
     */ 
    public function getTitre(){
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre){
        $this->titre = $titre;
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
        return $this->titre;
    }

    /**
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of dateSuj
     */ 
    public function getDateSuj()
    {
        return $this->dateSuj;
    }

    /**
     * Set the value of dateSuj
     *
     * @return  self
     */ 
    public function setDateSuj($dateSuj)
    {
        $this->dateSuj = $dateSuj;

        return $this;
    }

    /**
     * Get the value of lock
     */ 
    public function getLock()
    {
        return $this->lock;
    }

    /**
     * Set the value of lock
     *
     * @return  self
     */ 
    public function setLock($lock)
    {
        $this->lock = $lock;

        return $this;
    }
}