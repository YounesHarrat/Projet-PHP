<?php

namespace App\Controllers;
use App\Models\FilmModel;

class FilmController {
    
    # classe à appeler si on ne renseigne pas de paramètre dans l'url
    public function index() {
        $films = new FilmModel();
        $tab_f = $films->findAll();
        include_once "./views/films/list.php";
    }

}