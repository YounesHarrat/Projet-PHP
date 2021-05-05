<?php

namespace App\Controllers;

use App\Models\FilmModel;
use App\Models\ReviewModel;

class FilmController {

    public $numero;
    # classe à appeler si on ne renseigne pas de paramètre dans l'url
    public function index() {
        include_once "./views/films/index.php";
        $this->list();
    }


    public function footer() {
        include_once "./views/footer/footer.php";
    }

    public function create() {
        include_once "./views/films/create.php";
    }

    public function detail($argsArray) {
        $films = new FilmModel();
        $reviews = new ReviewModel();
        $id = array_shift($argsArray);
        if (isset($id)) {
            $tab_f = $films->findOne($id);
            $tab_r = $reviews->findOne($id);
            $review = "";
        } else {
            $tab_f = $films->findOne(1);
            // $tab_r = $reviews->findOne(1);
        }
        include_once "./views/films/detail.php";
        $this->addReview($id);
        echo "<br>";
        $this->footer();
    }

    public function addReview($idFilm) {
        $id = $idFilm;
        include_once "./views/reviews/create.php";
    }

    public function one($argsArray) {
        $films = new FilmModel();
        $tab_f = $films->findOne(array_shift($argsArray));
        include_once "./views/films/list.php";
    }

    # classe à appeler si on renseigne dans l'url  /filmList 
    public function list() {
        $films = new FilmModel();
        $tab_f = $films->findAll();
        include_once "./views/films/list.php";
        if (isset($numero) && $numero != ""){
            $this->addLike($numero);
        }
    }

    public function addLike() {
        $content = trim(file_get_contents("php://input"));
        $data = json_decode($content, true);

        $idFilm = $data['id'];
        $nbr = $data['nbr'];

        $um = new FilmModel();
        $find = $um->addLike($idFilm,$nbr);  
    }
}

   
