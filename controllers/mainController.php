<?php

namespace App\Controllers;

use App\Models\Model;
use App\Controllers\FilmController;
use App\Controllers\UtilisateurController;

class MainController {

    # classe à appeler si on ne renseigne pas de paramètre dans l'url
    public function index() {
        $this->connexion();
    }

     # classe à appeler si on renseigne dans l'url  /filmList 
    public function create() {
        $fc = new FilmController();
        $fc->create();
    }

    public function one() {
        $fc = new FilmController();
        $fc->one();
    }

    # classe à appeler si on renseigne dans l'url  /filmList 
    public function detail() {
        $fc = new FilmController();
        $fc->detail();
    }

    # classe à appeler si on renseigne dans l'url  /filmList 
    public function list() {
        $fc = new FilmController();
        $fc->list();
    }

    public function connexion() {
        $uc = new UtilisateurController();
        $uc->connexionCompte();
    }
    public function inscription() {
        $uc = new UtilisateurController();
        $uc->creationCompte();
    }
}