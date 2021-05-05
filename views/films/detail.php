<?php

session_start();
use App\Models\UtilisateurModel;
use App\Models\ReviewModel;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des Films</title>
        <link rel="icon" type="image/png" href="assets/logo.png" />
        <link rel='stylesheet' type='text/css' href='style\header.css'>
        <link rel='stylesheet' type='text/css' href='style\stars.css'>
        <link rel='stylesheet' type='text/css' href='style\details.css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/9d71c70935.js" crossorigin="anonymous"></script>
    </head>
    <body>

<!-- HEADER -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <img class="logo" src="assets/logo.png">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse titlePos" id="navbarNav">
        <h1 class="title">Cinech'Nord</h1>
    </div>
    
<?php

function Deconnexion() {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $_SESSION = array();
    }
}

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "<b style='color:white;padding:30px;'>Bienvenue " . $_SESSION['pseudo'] . " !</b>";

                // TODO redirect to login page after deconnexion successful
                echo "
                <a href='/index.php?controller=film&action=list'>
                <button type='button' class='btn btn-outline-danger btnConnexion' onclick=Deconnexion() >Se Deconnecter</button>
                </a>
                ";
                // header('Location: /index.php?controller=film&action=list');

            } else {
                echo "
                <a href='/index.php?controller=utilisateur&action=connexion'>
                <button type='button' class='btn btn-outline-success btnConnexion'>Se connecter</button>
                </a>
                ";
            }
?>

  
</nav>

<p>
<h1>
<a class="retourListe" href="/index?controller=film&action=list" target="" >
    <img src="https://i.pinimg.com/originals/18/8c/fa/188cfa53a6ef3231c4e261acc132112e.gif" style="width:15vw;margin:auto;height:5vh;padding:auto;"/>
    <span class="retourListe">Back to List</span>
</a>
</h1> </p>



<div style="display:flex;flexDirection:row;padding: 10px; border: 1px solid black; flex-wrap: wrap; justify-content: space-evenly;">
    <?php
    foreach($tab_f as $f) {

        echo "<div style='justify-content: space-around;text-align:center;'  > ";
        echo "<br>";
        echo '<p> <h1><b>' . $f->nom . '</b></h1>.</p>';

        echo "<img src='" . $f->affiche . "' style='width:240px;height:400px;'/>";
        echo '<p> Date de Sortie : [ ' . $f->dateSortie . '].</p>';
        echo '<p> Durée : ' . $f->duree . '.</p>';
        echo '<p> Acteurs : <b> ' . $f->acteurs . '</b>.</p>';

        // echo '<p> Affiche : ' . $f->affiche . '.</p>';
        echo "</div>";
    }
    ?>
</div>

<!-- //TODO ajouter la partie REVIEW -->

<div class="containerReview">
    <h1> Reviews:  </h1>
    <?php
    foreach($tab_r as $r) {
        $um = new UtilisateurModel();
        $users = $um->findOne($r->fk_utilisateur);
        $user = array_shift($users);
    ?>
    <div style="padding:30px;">
        <h5>L'utilisateur   
        <?= $user->login ?> 
            dit : <I>"<?=$r->review?>"</I><br>
            <button type="button" onclick=recuperationReview(<?=$r->id?>) class="btn btn-outline-warning btnInfo" data-bs-toggle="modal" data-bs-target="#exampleModalReview">
                        Noter ce commentaire
                        </button>
                    <p><B>Note du commentaire :</B> <?= $r->notation ?>/5 <i class="fas fa-star"></i></p>
        </h5>
        
    </div>

    <?php
    }
    ?>
    <div class="modal fade" id="exampleModalReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Evaluez le commentaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Likes -->
                    <div class="stars">
                        <form action="">
                            <input type="hidden" id="modalIdReview">
                            <input onclick=onClickReview(5) class="star star-5" id="star-5" type="radio" name="star"/>
                            <label class="star star-5" for="star-5"></label>
                            <input onclick=onClickReview(4) class="star star-4" id="star-4" type="radio" name="star"/>
                            <label class="star star-4" for="star-4"></label>
                            <input onclick=onClickReview(3) class="star star-3" id="star-3" type="radio" name="star"/>
                            <label class="star star-3" for="star-3"></label>
                            <input onclick=onClickReview(2) class="star star-2" id="star-2" type="radio" name="star"/>
                            <label class="star star-2" for="star-2"></label>
                            <input onclick=onClickReview(1) class="star star-1" id="star-1" type="radio" name="star"/>
                            <label class="star star-1" for="star-1"></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php            
        function save($id ) {
            $rm = new ReviewModel();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                $fkUser = $_SESSION['id'];
            }
            $fkFilm = $id;
            if (isset($_POST['review']) && $_POST['review'] != "" ){
                $reviewText = $_POST['review']; 
                $rm->saveOne($reviewText,$fkUser, $fkFilm);
            }
        }
            
        ?>

            <form class="formReview" action="" method="POST">        
                <div class="input-group">
                    <h5 class="addReview">Ajouter un commentaire : </h5>
                    <textarea class="form-control" name="review" placeholder="Donnez nous votre avis">
                    
                    </textarea>
                </div>
                <div class="d-grid gap-2">

                <button type="sumbit" class="btn btn-warning" onclick=<?php save($id) ?> >Envoyer</button>
                </div>
            </form>


</div>




</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script type="text/javascript" src="./javascript.js"></script>
<script type="text/javascript" src="./star.js"></script>