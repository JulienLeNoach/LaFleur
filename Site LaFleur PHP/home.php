<?php
// Initialiser la session
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["username"])) {
  echo "Vous n'êtes connecté à aucun compte<br>
Veuillez vous connectez   <a href='login.php'>ici</a>
ici avant de pouvoir accédez à votre espace membre";
} else {

?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <div class="sucess">
      <h1>Bienvenue <?php
                    echo $_SESSION['username']; ?>!</h1>
      <p>C'est votre espace utilisateur.</p>
      <a href="ACCUEIL.php">Déconnexion</a>
    </div>
  </body>

  </html><?php } ?>