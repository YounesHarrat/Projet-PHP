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
        <input type="email" placeholder="Saisir l'email" name="email" id="email" required>

        <label for="pseudo"><b>Pseudo</b></label>
        <input type="pseudo" placeholder="Saisir le pseudo" name="pseudo" id="pseudo" required>

        <label for="psw"><b>Mot de passe</b></label> <p style="font-size:0.75rem;">*doit contenir au moins 6 caractères</p>
        <input type="password" placeholder="Saisir le mot de passe" name="mdp" id="psw" required>

        <a href="index.php?controller=utilisateur&action=connexion" name="clickEnregistrer" >
            <button type="button" class="registerbtn"  > 
            S'enregistrer</button>
        </a>
        <div class="container signin">
    <p>Vous avez déjà un compte? <a href="index.php?controller=utilisateur&action=connexion">Se connecter</a>.</p>
    </div>
    </div>
    </form>
    </body>
</html>