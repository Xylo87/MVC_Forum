<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class SujetManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Sujet";
    protected $tableName = "sujet";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les topics d'une catégorie spécifique (par son id)
    public function findTopicsByCategory($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.categorie_id = :id
                ORDER BY t.dateSuj DESC";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function lockSwitch($id) {

        $sql = "UPDATE ".$this->tableName." s
        SET s.lock = 1
        WHERE s.id_sujet = :id";

        DAO::update($sql, ["id" => $id]);
    }

    public function unlockSwitch($id) {

        $sql = "UPDATE ".$this->tableName." s
        SET s.lock = 0
        WHERE s.id_sujet = :id";

        DAO::update($sql, ["id" => $id]);
    }
}