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
        $find = $this->db->query('SELECT review.*, ROUND(AVG(CAST(likereview.likeReview AS FLOAT)), 1) AS notation FROM `review`LEFT JOIN likereview ON review.id=likereview.fk_reviews WHERE fk_film = 2  GROUP BY review.review ORDER BY `notation` DESC ');
        $try = $find->fetchAll(PDO::FETCH_OBJ);
        return $try;
    }
    public function addLike($idReview, $nbr){
        $find = $this->db->prepare('INSERT INTO film.likereview (`likeReview`, `fk_reviews`) VALUES (?,?)');
        $find->bindParam(1, $nbr);
        $find->bindParam(2, $idReview);
        $find->execute();
    }
}