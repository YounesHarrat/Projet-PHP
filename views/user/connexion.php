<html>
    <head>
        <title>Connexion</title>
        <link rel="icon" type="image/png" href="assets/logo.png" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel='stylesheet' type='text/css' href='style\login.css'>         
    </head>
         
    <body>
    <form action="" method="post">
    <div class="container">
        <h1> Se connecter </h1>

        <label for="pseudo"><b>Email</b></label> : <input type="email" placeholder="Saisir l'email" name="pseudo" id="pseudo" />

        <label for="mdp"><b>Mot de passe</b></label> :  <input type="password" placeholder="Saisir le mot de passe" name="mdp" id="mdp" /><br />

        <button type="submit" class="registerbtn" onclick=verify()>Se connecter</button>

        <div class="container signin">
    <p>Vous n'avez pas de compte ? Creez en un ! <a href="index.php?controller=utilisateur&action=creation" name="clickEnregistrer">S'enregistrer</a>.</p>
    </div>
    </form>
    </body>
<<<<<<< HEAD
</html>
=======
</html>

<style>
  /* // STYLING CSS // */
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}
a{
  color: dodgerblue;
}
* {
  box-sizing: border-box;
}

.container {
  padding: 16px;
  background-color: white;
}

input[type=email], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=email]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
>>>>>>> f46b55420d8e144eed4a1436952661c8df5f58b7
