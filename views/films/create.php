<?php

session_start();

if ($_SESSION['role'] && $_SESSION['role'] != 1) {
    
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


<div style="text-align:center;">
    <h1>Ajouter un Film</h1>
</div>

<div style="display:flex;flexDirection:column;padding: 10px; border: 1px solid black; flex-wrap: wrap; justify-content: space-evenly;">


    <form action="" method="POST" >

        <div class="row">
            <label for="titre">Titre</label>
            <input type="text" name="titre" /> 
        </div>

        <div class="row">
            <label for="date">Date de Sortie</label>    
            <input type="date" name="date" />   
        </div>

        <div class="row">
            <label for="duree">Duree</label>
            <input type="time" name="duree" />
        </div>
                
        <div class="row">
            <label for="acteurs">Acteurs</label>
            <input type="text" name="acteurs" />
        </div>

        <div class="row">
            <label for="affiche">Affiche url</label>
            <input type="url" name="affiche" />
        </div>

            <a href="/index.php?controller=film&action=create">
        <button type="submit">Valider</button>
        </a>    
        <button type="reset">Reset</button>
    </form>


</div>


</html>
<?php
} else {

    header('Location: /index.php?controller=film&action=list');

}

?>