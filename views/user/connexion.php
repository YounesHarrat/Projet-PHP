<html>
    <head>
        <title>Connexion</title>
        <link rel="icon" type="image/png" href="assets/logo.png" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />         
    </head>
         
    <body>
    <form action="" method="post">
    <div class="container">
        <h1> Se connecter </h1>

        <label for="pseudo"><b>Email</b></label> : <input type="text" placeholder="Saisir l'email" name="pseudo" id="pseudo" />

        <label for="message"><b>Mot de passe</b></label> :  <input type="password" placeholder="Saisir le mot de passe" name="mdp" id="mdp" /><br />

        <button type="submit" class="registerbtn">Se connecter</button>

        <div class="container signin">
    <p>Vous n'avez pas de compte ? Creez en un ! <a href="index.php?controller=utilisateur&action=creation" name="clickEnregistrer">S'enregistrer</a>.</p>
    </div>
    </form>
    </body>
</html>