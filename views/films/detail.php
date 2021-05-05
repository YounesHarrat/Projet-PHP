<?php

session_start();
use App\Models\UtilisateurModel;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des Films</title>
        <link rel='stylesheet' type='text/css' href='style\header.css'>
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
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "<b style='color:white;padding:30px;'>Welcome to the member's area, " . $_SESSION['pseudo'] . "!</b>";

                // TODO redirect to login page after deconnexion successful
                echo "
                <a href='/index.php?controller=utilisateur&action=connexion'>
                <button type='button' class='btn btn-outline-danger btnConnexion'>Se Deconnecter</button>
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
            dit : <I>"<?=$r->review?>"</I>
                    <button type="button" onclick=onClickReview(1,<?= $r->id ?>) class="btn btnStar"><i class="fas fa-star"></i></button>
                    <button type="button" onclick=onClickReview(2,<?= $r->id ?>) class="btn btnStar"><i class="fas fa-star"></i></button>
                    <button type="button" onclick=onClickReview(3,<?= $r->id ?>) class="btn btnStar"><i class="far fa-star"></i></button>
                    <button type="button" onclick=onClickReview(4,<?= $r->id ?>) class="btn btnStar"><i class="far fa-star"></i></button>
                    <button type="button" onclick=onClickReview(5,<?= $r->id ?>) class="btn btnStar"><i class="far fa-star"></i></button> 
        </h5>
    </div>

    <?php
    }
    ?>

    
    <form class="formReview" action="POST">        
        <div class="input-group">
        <h5 class="addReview">Ajouter un commentaire : </h5>
        <textarea class="form-control review" aria-label="With textarea"></textarea>
        </div>
        <div class="d-grid gap-2">
        <button type="button" class="btn btn-warning">Envoyer</button>
        </div>
    </form>

</div>




<!-- FOOTER -->
<footer class="bg-dark text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3 text-light">
      © 2020 Copyright:
      <a class="text-light" href="https://mdbootstrap.com/">Cinech'Nord.com</a>
    </div>
    <!-- Copyright -->
  </footer>

  <script type="text/javascript" src="./notation.js"></script>