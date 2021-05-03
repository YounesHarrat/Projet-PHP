<?php
 
namespace App\Controllers;

use App\Models\UtilisateurModel;

class UtilisateurController{
    public function index() {
        
    }

    public function identifiant() {

        include_once('views/user/index.php');

    if (isset($_POST['pseudo']) && $_POST['mdp'])
    {
        include_once('models/utilisateur.php');
        $um = new UtilisateurModel();
        $find = $um->login($_POST['pseudo'],$_POST['mdp'] );  
        if($find){
            // Repartir sur le site mais en connecter
        }  
    }
    }
}