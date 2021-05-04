<?php

namespace App\Controllers;

use App\Models\ReviewModel;

class ReviewController {
    
    # classe à appeler si on ne renseigne pas de paramètre dans l'url
    public function index() {

    }

    public function create() {

    }

    public function one($argsArray) {
        $films = new ReviewModel();
        $tab_f = $films->findOne(array_shift($argsArray));
        include_once "./views/films/list.php";
    }

    # classe à appeler si on renseigne dans l'url  /filmList 
    public function list() {
        $films = new ReviewModel();
        $tab_f = $films->findAll();
        include_once "./views/films/list.php";
    }

    public function listReview() {
        $films = new ReviewModel();
        $tab_r = $films->findReviewByFilm();
        include_once "./views/films/list.php";
    }

}