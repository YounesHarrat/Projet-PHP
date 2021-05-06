<?php


namespace App\Controllers;



use App\Models\UtilisateurModel;

class UtilisateurController{

    public function index() {
    }
    
    public function connexion() {
        include_once('./views/user/connexion.php');

        if (isset($_POST['email']) && $_POST['mdp'])
        {
            var_dump("ah");
            include_once('models/utilisateurModel.php');
            $um = new UtilisateurModel();
            $find = $um->login($_POST['email'],$_POST['mdp']);  
            
            if (isset($find) && !empty($find)) {
                $user = array_shift($find);
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $_POST['email'];                 
                $_SESSION['mdp'] = $_POST['mdp']; 
                $_SESSION['pseudo'] = $_POST['pseudo']; 
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user['fk_role'];

                $_POST['email'] = "";
                $_POST['mdp'] = "";
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

        if (isset($_POST['email']) && $_POST['pseudo'] && strlen($_POST['mdp']) > 5)
        {
            include_once('models/utilisateurModel.php');
            $um = new UtilisateurModel();
            $find = $um->register($_POST['email'],$_POST['pseudo'],$_POST['mdp'] );  
        }
    }


    public function deconnexion() {
        session_destroy();  
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    
}