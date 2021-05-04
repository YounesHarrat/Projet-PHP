<?php
namespace App\models;
use App\Core\Db;
use PDO;

class ReviewModel extends Db {
    private $db;

    public function __construct() {

        # on instancie le singleton
        $this->db = Db::getInstance();
    }
    # méthode permettant de récupérer l'entièreté des users
    public function findAll() {
        $find = $this->db->query('SELECT * FROM film.review');
        $find = $find->fetchAll(PDO::FETCH_OBJ);
        return $find;
    }
    # méthode permettant de récupérer un user en particulier via son $id
    public function findOne($id) {
        $find = $this->db->query('SELECT * FROM film.review WHERE fk_film='.$id);
        $try = $find->fetchAll(PDO::FETCH_OBJ);
        return $try;
    }
}