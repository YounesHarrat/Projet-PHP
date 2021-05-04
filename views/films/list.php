<?php

session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des Films</title>
        <link rel='stylesheet' type='text/css' href='style\header.css'>
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
                    <!-- Route vers page info -->
                    <a href="/index.php?controller=film&action=detail&id=<?=$f->id?>">
                    <button type="button" class="btn btn-outline-secondary btnInfo">En savoir +</button>
                    </a>
                    <!-- Likes -->
                    <div class="likes">
                    <button type="button" onclick=onClick(1,<?= $f->id ?>) class="btn btnStar"><i class="far fa-star"></i></button>
                    <button type="button" onclick=onClick(2,<?= $f->id ?>) class="btn btnStar"><i class="far fa-star"></i></button>
                    <button type="button" onclick=onClick(3,<?= $f->id ?>) class="btn btnStar"><i class="far fa-star"></i></button>
                    <button type="button" onclick=onClick(4,<?= $f->id ?>) class="btn btnStar"><i class="far fa-star"></i></button>
                    <button type="button" onclick=onClick(5,<?= $f->id ?>) class="btn btnStar"><i class="far fa-star"></i></button>                   
                    </div>
                    
                </div>
                </div>

                <!-- echo "<div style='justify-content: space-around;text-align:center;' > ";
                echo "<br>";
                echo "<img src='" . $f->affiche . "' style='width:240px;height:400px;'/><br><br>";
                for($i = 1; $i<=5; $i++){
                    echo "<button onclick='onClick(".$i.",".$f->id.")'>".$i."</button>";
                }
                echo '<p> <b>' . $f->nom . '</b>.</p>';
                echo '<p> Date de Sortie : [ ' . $f->dateSortie . '].</p>';
                echo '<p> Durée : ' . $f->duree . '.</p>';
                echo '<p> Acteurs : <b> ' . $f->acteurs . '</b>.</p>';
                // echo '<p> Affiche : ' . $f->affiche . '.</p>';
                echo "</div>";
            }
            ?> -->
        </div>
        </div>
           <?php
            }
            ?>
        </div>
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

    </body>
</html>
<script type="text/javascript" src="./notation.js"></script>

