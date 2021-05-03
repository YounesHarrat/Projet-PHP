<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />         
    </head>
         
    <body>
    <form action="identifiant" method="post">
    <div class="container">
        <h1> S'enregistrer </h1>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Saisir l'email" name="email" id="email" required>

        <label for="psw"><b>Mot de passe</b></label>
        <input type="password" placeholder="Saisir le mot de passe" name="mdp" id="psw" required>

        <label for="psw-repeat"><b>Repeter le mot de passe</b></label>
        <input type="password" placeholder="Resaisir le mot de passe" name="mdp-repeat" id="psw-repeat" required>

        <button type="submit" class="registerbtn">S'enregistrer</button>

        <div class="container signin">
    <p>Vous avez déjà un compte? <a href="#">Se connecter</a>.</p>
    </div>
    </div>
    </form>
    </body>
</html>

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
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

a {
  color: dodgerblue;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>