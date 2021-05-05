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
        $review = new ReviewModel();
        $tab_f = $review->findOne(array_shift($argsArray));
        include_once "./views/films/list.php";
    }

    # classe à appeler si on renseigne dans l'url  /filmList 
    public function list() {
        $review = new ReviewModel();
        $tab_f = $review->findAll();
        include_once "./views/films/list.php";
    }

    public function listReview() {
        $review = new ReviewModel();
        $tab_r = $review->findOne();
        include_once "./views/films/list.php";
    }

    public function saveReview($argsArray) {
        $review = new ReviewModel();
        $r = array_shift($argsArray);
        $fkUser = array_shift($argsArray);
        $fkFilm = array_shift($argsArray);
        $tab_r = $review->saveOne($r, $fkUser, $fkFilm);
        include_once "./views/films/detail.php";
    }

}