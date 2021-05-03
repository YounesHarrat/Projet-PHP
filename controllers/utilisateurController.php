<?php
 
namespace App\Controllers;

use App\Models\UtilisateurModel;

class UtilisateurController{

    public function connexionCompte() {
        include_once('views/user/connexion.php');

    if (isset($_POST['pseudo']) && $_POST['mdp'])
    {
        include_once('models/utilisateur.php');
        $um = new UtilisateurModel();
        $find = $um->login($_POST['pseudo'],$_POST['mdp'] );  
        if($find){
            var_dump($find);
        }  
    }
    }

    public function creationCompte() {        
        include_once('views/user/create.php');
    }
}