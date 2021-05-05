<html>
    <head>
        <title>Inscription</title>
        <link rel="icon" type="image/png" href="assets/logo.png" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />   
        <link rel='stylesheet' type='text/css' href='style\login.css'>         
      
    </head>
         
    <body>
    <form action="" method="post">
    <div class="container">
        <h1> S'enregistrer </h1>

        <label for="pseudo"><b>Email</b></label>
        <input type="text" placeholder="Saisir l'email" name="pseudo" id="email" required>

        <label for="psw"><b>Mot de passe</b></label>
        <input type="password" placeholder="Saisir le mot de passe" name="mdp" id="psw" required>

        <button type="submit" class="registerbtn">S'enregistrer</button>

        <div class="container signin">
    <p>Vous avez déjà un compte? <a href="index.php?controller=utilisateur&action=connexion">Se connecter</a>.</p>
    </div>
    </div>
    </form>
    </body>
</html>
