<?php


namespace App\Controllers;



use App\Models\UtilisateurModel;

class UtilisateurController{

    public function index() {
    }
    
    public function connexion() {
        include_once('./views/user/connexion.php');

        if (isset($_POST['pseudo']) && $_POST['mdp'])
        {
            include_once('models/utilisateurModel.php');
            $um = new UtilisateurModel();
            $find = $um->login($_POST['pseudo'],$_POST['mdp'] );  
            
            if (isset($find) && !empty($find)) {
                $user = array_shift($find);
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['pseudo'] = $_POST['pseudo']; 
                $_SESSION['mdp'] = $_POST['mdp']; 
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user['fk_role'];


            } else {
                $_SESSION['loggedin'] = false;
            }



            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                // TODO redirect to main page after login successful
                
                header('Location: /index.php?controller=film&action=list');
            } else {
                echo "Please log in first to see this page.";
            }


        }
    }

    public function creation() {  
        include_once('./views/user/creation.php');

        if (isset($_POST['pseudo']) && $_POST['mdp'] && strlen($_POST['mdp']) > 5)
        {
            include_once('models/utilisateurModel.php');
            $um = new UtilisateurModel();
            $find = $um->register($_POST['pseudo'],$_POST['mdp'] );  
        }
    }


    public function deconnexion() {
        session_destroy();  
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    
}