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

    public function addLike() {

        $content = trim(file_get_contents("php://input"));
        $data = json_decode($content, true);

        $idReview = $data['id'];
        $nbr = $data['nbr'];

        $um = new ReviewModel();
        $find = $um->addLike($idReview,$nbr); 
    }

    public function saveReview($argsArray) {
        $review = new ReviewModel();
        $r = array_shift($argsArray);
        $fkUser = array_shift($argsArray);
        $fkFilm = array_shift($argsArray);
        $review->saveOne($r, $fkUser, $fkFilm);
        include_once "./views/films/detail.php";

    }

    public function deleteReview($argsArray) {
        $review = new ReviewModel();
        $id = array_shift($argsArray);
        $review->deleteOne($id);
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
}