<?php

namespace App\Controllers;

use App\Models\Model;

class MainController {

    
    
    # classe à appeler si on ne renseigne pas de paramètre dans l'url
    public function index() {
        $tc = new UtilisateurController();
        $tc->identifiant();
    }
}