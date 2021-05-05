<?php

session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des Films</title>
        <link rel="icon" type="image/png" href="assets/logo.png" />
        <link rel='stylesheet' type='text/css' href='style\header.css'>
        <link rel='stylesheet' type='text/css' href='style\stars.css'>
        <link rel='stylesheet' type='text/css' href='style\list.css'>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
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


<!-- CARD -->
        <div style="display:flex;flexDirection:row;padding: 10px; flex-wrap: wrap; justify-content: space-evenly;">
            <?php
            foreach($tab_f as $f) {
                ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                    <div class="col-md-4">
                    <img class="imgFilm" src="<?=$f->affiche?>" alt="">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?=$f->nom?></h5>
                    <p class="card-text"><B>Date de sortie :</B> <?= $f->dateSortie ?></p>
                    <p class="card-text"><B>Acteurs :</B> <?= $f->acteurs ?></p>
                    <p class="card-text"><B>Note du film :</B> <?= $f->notation ?>/5 <i class="fas fa-star"></i></p>
                    <!-- Route vers page info -->
                    <a href="/index.php?controller=film&action=detail&id=<?=$f->id?>">
                    <button type="button" class="btn btn-outline-secondary btnInfo">En savoir plus</button>
                    </a>

                    <!-- Button trigger modal -->
                        <button type="button" onclick=recuperationFilm(<?=$f->id?>) class="btn btn-outline-warning mt-2 btnInfo" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Noter ce film
                        </button>
                                    <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Likes -->
                    <div class="stars">
                        <form action="">
                            <input type="hidden" id="modalIdFilm">
                            <input onclick=onClickFilm(5) class="star star-5" id="star-5" type="radio" name="star"/>
                            <label class="star star-5" for="star-5"></label>
                            <input onclick=onClickFilm(4) class="star star-4" id="star-4" type="radio" name="star"/>
                            <label class="star star-4" for="star-4"></label>
                            <input onclick=onClickFilm(3) class="star star-3" id="star-3" type="radio" name="star"/>
                            <label class="star star-3" for="star-3"></label>
                            <input onclick=onClickFilm(2) class="star star-2" id="star-2" type="radio" name="star"/>
                            <label class="star star-2" for="star-2"></label>
                            <input onclick=onClickFilm(1) class="star star-1" id="star-1" type="radio" name="star"/>
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
        </div>
        
           <?php
            }
            ?>



        </div>
        </div>


    </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script type="text/javascript" src="./javascript.js"></script>
<script type="text/javascript" src="./star.js"></script>


