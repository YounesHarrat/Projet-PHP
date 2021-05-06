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
        $find = $this->db->prepare('SELECT review.*, ROUND(AVG(CAST(likereview.likeReview AS FLOAT)), 1) AS notation FROM `review`LEFT JOIN likereview ON review.id=likereview.fk_reviews WHERE fk_film = ?  GROUP BY review.review ORDER BY `notation` DESC ');
        $find->execute(array($id));
        $try = $find->fetchAll(PDO::FETCH_OBJ);
        return $try;
    }   
    public function addLike($idReview, $nbr){
        $find = $this->db->prepare('INSERT INTO film.likereview (`likeReview`, `fk_reviews`) VALUES (?,?)');
        $find->bindParam(1, $nbr);
        $find->bindParam(2, $idReview);
        $find->execute();
    }

    public function saveOne($review, $userId, $filmId ){
        $find = $this->db->prepare('INSERT INTO film.review (`review`, `fk_utilisateur`, `fk_film`) VALUES (?,?,?)');
        $find->bindParam(1, $review);
        $find->bindParam(2, $userId);
        $find->bindParam(3, $filmId);
        $find->execute();
    }

    public function updateReview($id, $review){
        var_dump($id, $review);
        $find = $this->db->prepare('UPDATE film.review SET review=? WHERE id=? and fk_utilisateur=?');
        $find->execute(array($review, $id, $_SESSION['id']));
    }
    
    public function deleteOne($id) {
        $find = $this->db->prepare('DELETE FROM film.review WHERE id = ? ');
        $find->bindParam(1,$id);
        $find->execute();
    }
}