<?php
// MAIN V2.0 
namespace App\Core;
use App\Controllers\MainController;
class Main {
    public function start() {

        # dans le cas ou on ne reçoit pas de paramètres, on instancie le controller de base
        if($_GET === []) {
            $controller = new MainController;
            $controller->index();
        } else {
            # dans le cas ou l'on reçoit des paramètres on traite ces paramètres
            $param = $_GET;
            /**
             * on extrait du tableau $_GET la première value
             * on lui passe la première lettre en majuscule
             * on instancie un controller portant le nom de cette value
             */
            $controller = '\\App\\Controllers\\'.ucfirst(array_shift($param)).'Controller';
            
            try {
                $controller = new $controller();
            } catch (\Throwable $th) {
               
            }

            /**
             * dans le cas d'un deuxieme paramètre orientant vers une méthode de la classe précédemment instanciée
             * on extrait cette méthode du tableau
             * si pas de paramètre renseigné, on renseigne ce paramètre comme étant 'index'
             */
            $action = (isset($param['action'])) ? array_shift($param) : 'index';

            /**
             * on check si la méthode $action existe
             * si oui on l'instancie avec ou sans paramètre
             * si non, on affiche un message d'erreur
             */
            if(method_exists($controller, $action)) {
                (isset($param)) ? $controller->$action($param) : $controller->$action();
            } else {
                http_response_code(404);
                $fc = new MainController();
                $fc->notFound();
            }
          
        }
    }
}