<?php

namespace App\Controllers;
use App\Models\FilmModel;

class FilmController {

    public $numero;
    # classe à appeler si on ne renseigne pas de paramètre dans l'url
    public function index() {
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

   
