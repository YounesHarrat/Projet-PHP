<?php
 
namespace App\Controllers;

use App\Models\UtilisateurModel;

class UtilisateurController{

    public function index() {
        echo "aaaaaaaaaa";
    }
    
    public function connexion() {
        include_once('./views/user/connexion.php');

        if (isset($_POST['pseudo']) && $_POST['mdp'])
        {
            include_once('models/utilisateurModel.php');
            $um = new UtilisateurModel();
            $find = $um->login($_POST['pseudo'],$_POST['mdp'] );  
            // TODO redirect to main page after login successful
            header('Location: /index.php?controller=film&action=list');

        }
    }

    public function creation() {  
        include_once('./views/user/creation.php');

        if (isset($_POST['pseudo']) && $_POST['mdp'])
        {
            include_once('models/utilisateurModel.php');
            $um = new UtilisateurModel();
            $find = $um->register($_POST['pseudo'],$_POST['mdp'] );  
        }
    }
}