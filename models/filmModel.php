<?php
namespace App\models;
use App\Core\Db;
use PDO;

class FilmModel extends Db {
    private $db;

    public function __construct() {
        # on instancie le singleton
        $this->db = Db::getInstance();
    }
    
    # méthode permettant de récupérer l'entièreté des users
    public function findAll() {
        $find = $this->db->query('SELECT film.*, ROUND(AVG(CAST(likefilm.likes AS FLOAT)), 1) AS notation FROM `film` LEFT JOIN likefilm ON film.id=likefilm.fk_films GROUP BY film.nom ORDER BY `notation` DESC');
        $find = $find->fetchAll(PDO::FETCH_OBJ);
        return $find;
    }
    # méthode permettant de récupérer un user en particulier via son $id
    public function findOne($id) {
        $find = $this->db->query('SELECT * FROM film.film WHERE id=' . $id);
        $try = $find->fetchAll(PDO::FETCH_OBJ);
        return $try;
    }
    # méthode permettant de de noter le film entre 1 et 5
    public function addLike($idFilm, $nbr){
        $find = $this->db->prepare('INSERT INTO film.likefilm (`likes`, `fk_films`) VALUES (?,?)');
        $find->bindParam(1, $nbr);
        $find->bindParam(2, $idFilm);
        $find->execute();
    }
    public function averageLikeFilm($idFilm){
        $find = $this->db->prepare("SELECT AVG(likes) from film.likefilm WHERE fk_films=:id");
        $find->execute(['id' => $idFilm]);
        $result = $find->fetchAll();
        return $result;               
    }
}