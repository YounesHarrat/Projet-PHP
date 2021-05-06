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
            include_once('models/utilisateurModel.php');
            $um = new UtilisateurModel();
            $mdpH = $um->recupMDP($_POST['email']);
            $mdpNH = $_POST['mdp'];
            if(hash_equals($mdpH, crypt($mdpNH, $mdpH))){
                var_dump(hash_equals($mdpH, crypt($mdpNH, $mdpH)));
                $find = $um->login($_POST['email'],$mdpH);  
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
    }

    public function creation() {  
        include_once('./views/user/creation.php');

        if (isset($_POST['email']) && $_POST['pseudo'] && strlen($_POST['mdp']) > 5)
        {
            include_once('models/utilisateurModel.php');
            $um = new UtilisateurModel();
            $mdp = $_POST['mdp'];
            $mpdCrypt = crypt($mdp);
            var_dump($mpdCrypt);
            $find = $um->register($_POST['email'],$_POST['pseudo'],$mpdCrypt );  
        }
    }


    public function deconnexion() {
        session_destroy();  
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    
}