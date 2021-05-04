<?php

namespace App\Controllers;

use App\Models\Model;
use App\Controllers\FilmController;

class MainController {

    # classe à appeler si on ne renseigne pas de paramètre dans l'url
    public function index() {
        echo "page d'accueil <br>";
        $fc = new FilmController();         
        $fc->index();
    }
    public function connexion() {
        $tc = new UtilisateurController();
        $tc->connexionCompte();
    }
    public function inscription() {
        $tc = new UtilisateurController();
        $tc->creationCompte();
    }
}