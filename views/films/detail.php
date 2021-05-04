<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detail du Films</title>
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
    <a href="/index.php?controller=utilisateur&action=connexion">
    <button type="button" class="btn btn-outline-success btnConnexion">Se connecter</button>
    </a>
  </nav>


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





<!-- FOOTER -->
<footer class="bg-dark text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3 text-light">
      © 2020 Copyright:
      <a class="text-light" href="https://mdbootstrap.com/">Cinech'Nord.com</a>
    </div>
    <!-- Copyright -->
  </footer>