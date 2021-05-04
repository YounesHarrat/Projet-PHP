<html>
    <head>
        <title></title>
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

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
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