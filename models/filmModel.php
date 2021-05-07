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
        for($i=0; $i<count($find); $i++){
            $date = $find[$i]->dateSortie;
            $find[$i]->dateSortie= date("d-m-Y", strtotime($date));      
        }
        return $find;
    }
    # méthode permettant de récupérer un user en particulier via son $id
    public function findOne($id) {
        $find = $this->db->query('SELECT * FROM film.film WHERE id=' . $id);
        $try = $find->fetchAll(PDO::FETCH_OBJ);
        return $try;
    }
    # méthode permettant de de noter le film entre 1 et 5
    public function addLike($idFilm, $nbr, $idUser){
        if ($this->isInBDD($idFilm,$nbr, $idUser)) {
            $find = $this->db->prepare('INSERT INTO film.likefilm (`likes`, `fk_films`, `fk_user`) VALUES (?,?,?)');
            $find->bindParam(1, $nbr);
            $find->bindParam(2, $idFilm);
            $find->bindParam(3, $idUser);
            $find->execute();
        } else {

        }


    }
    public function averageLikeFilm($idFilm){
        $find = $this->db->prepare("SELECT AVG(likes) from film.likefilm WHERE fk_films=:id");
        $find->execute(['id' => $idFilm]);
        $result = $find->fetchAll();
        return $result;               
    }

    // gère la vérification dans la bdd avant d'ajouter un like sur film
    public function isInBDD($idFilm, $nbr, $idUser) {
        $find = $this->db->query('SELECT * FROM film.likefilm WHERE fk_films = '. $idFilm .' AND fk_user =' . $idUser);

        $find = $find->fetchAll(PDO::FETCH_OBJ);
        
        return empty($find);
    }

    // gere l ajout d un film par un admin
    public function create($titre,$date,$duree,$acteurs,$affiche,$synopsis) {
        $create = $this->db->prepare('INSERT INTO film.film (`nom`, `duree`, `dateSortie`, `acteurs`, `affiche`) VALUES (?,?,?,?,?)');
        $create->bindParam(1, $titre);
        $create->bindParam(2, $duree);
        $create->bindParam(3, $dateSortie);
        $create->bindParam(4, $acteurs);
        $create->bindParam(5, $affiche);
        // $create->bindParam(6, $synopsis);
        $create->execute();
    }

}