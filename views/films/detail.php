<?php

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


            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "<b style='color:white;padding:30px;'>Bienvenue " . $_SESSION['pseudo'] . " !</b>";

                // TODO redirect to login page after deconnexion successful
                ?>
                <a href="index.php?controller=utilisateur&action=deconnexion">
                <button type='submit' class='btn btn-outline-danger btnConnexion'>Se Deconnecter</button>
                </a>
                
                <?php

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
    ?>

        <div class="card" style="width: 18rem;">
                <img src="<?=$f->affiche?>" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title text-center"><?=$f->nom?></h5>
            </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><B>Date de sortie :</B> <?= $f->dateSortie ?></li>
                    <li class="list-group-item"><B>Acteurs :</B> <?= $f->acteurs ?></li>
                    <li class="list-group-item"><B>Sypnosis :</B> <?= $f->sypnosis ?></li>
                </ul>
        </div>
</div>

    <?php
    }
    ?>
</div>

<!-- //TODO ajouter la partie REVIEW -->

<div class="containerReview">
    <h1> Commentaires :  </h1>
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
            <p><B>Note du commentaire :</B> <?= $r->notation ?>/5 <i class="fas fa-star"></i></p>
            <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                ?>
            <button type="button" onclick=recuperationReview(<?=$r->id?>) class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModalReview">
                        Noter ce commentaire
            </button>
                  <?php
                if(isset($_SESSION['id']) && $_SESSION['id'] == $r->fk_utilisateur) {
                ?>
                <button type="button" onclick=recuperationReviewUpdate(<?=$r->id?>) class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModalReviewUpdate">
                            Modifier le commentaire
                </button>           
            <?php
                }
            }
                // TODO if admin, ajouter bouton delete 

                    if(isset($_SESSION['role']) && $_SESSION['role'] == "2") {
                        $url = "/index.php?controller=review&action=deleteReview&id=" . $r->id ; 
                    ?>

                    <a href=<?= $url ?> >
                        <button type="button" class="btn btn-outline-danger btnDelete">
                                Delete ce commentaire
                        </button>
                    </a>
            <?php
                    }
                    ?>
        </h5>        

                    <p><B>Note du commentaire :</B> <?= $r->notation ?>/5 <i class="fas fa-star"></i></p>
        </h5>
        
    </div>

    <?php
    }
    ?>

<!-- MODAL STAR -->
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
        </div>
    </div>
    

</div>


<!-- MODAL UPDATE -->
<div class="modal fade" id="exampleModalReviewUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Modifier le commentaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="input-group mb-3">
                <input type="hidden" id="modalIdReviewUpdate">
                    <span class="input-group-text" id="newReview">Nouveau commentaire</span>
                    <input type="text" id="newCom" class="form-control" aria-label="Sizing example input" aria-describedby="newReviewUpdate">
                </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" onclick=onClickReviewUpdate()>Modifier</button>
                </div>
                </div>
            </div>
        </div>  
    </div>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script type="text/javascript" src="./javascript.js"></script>
<script type="text/javascript" src="./star.js"></script>