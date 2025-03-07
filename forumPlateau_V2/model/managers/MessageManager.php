<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class MessageManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Message";
    protected $tableName = "message";

    public function __construct(){
        parent::connect();
    }


    public function findMessagesByTopic($id) {

        $sql = "SELECT *
                FROM ".$this->tableName." m 
                WHERE m.sujet_id = :id
                ORDER BY m.dateMes";
    
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function deleteMesSwitch($id) {

        $sql = "DELETE FROM ".$this->tableName." d
        WHERE d.id_message = :id";

        DAO::delete($sql, ["id" => $id]);
    }
}