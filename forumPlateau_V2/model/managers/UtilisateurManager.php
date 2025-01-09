<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class UtilisateurManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Utilisateur";
    protected $tableName = "utilisateur";

    public function __construct(){
        parent::connect();
    }

    public function findUserByMail($mail) {

        $sql = "SELECT *
                FROM ".$this->tableName." u
                WHERE u.mail = :mail";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['mail' => $mail], false), 
            $this->className
        );
    }

    public function findUserByNickname($pseudo) {

        $sql = "SELECT *
                FROM ".$this->tableName." u
                WHERE u.pseudo = :pseudo";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['pseudo' => $pseudo], false), 
            $this->className
        );
    }
}