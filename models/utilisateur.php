<?php
namespace App\models;
use App\Core\Db;
use PDO;

class UtilisateurModel extends Db {
    private $db;

    public function __construct() {

        # on instancie le singleton
        $this->db = Db::getInstance();
    }
    # méthode permettant de récupérer l'entièreté des users
    public function findAll() {
        $find = $this->db->query('SELECT * FROM film.utilisateur');
        $find = $find->fetchAll(PDO::FETCH_OBJ);
        return $find;
    }
    # méthode permettant de récupérer un user en particulier via son $id
    public function findOne($id) {
        $find = $this->db->query('SELECT * FROM film.utilisateur WHERE id='.$id);
        $try = $find->fetchAll(PDO::FETCH_OBJ);
        return $try;
    }

    public function login($login, $mdp){
        $find = $this->db-> prepare('SELECT * FROM film.utilisateur WHERE login = ? and password = ?');
        $find->execute(array($login, $mdp));
        $result = $find->fetchAll();
        if($result){
            echo "oui";
        }
        else{
            echo "non";
        }
        return $result;
    }
}