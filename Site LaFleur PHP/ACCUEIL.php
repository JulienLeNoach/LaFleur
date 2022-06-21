<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php if (isset($_SESSION["username"])) {
    echo  "<a class ='logout'href='deconnexion.php' target='titre'>Deconnexion<a><br>";
  } else {
    echo  "<a class ='logout'href='login.php' target='titre'>Connexion<a><br>";
  } ?>
  <center>
    <p class="acc">Dites-le avec <span>LaFleur !</span></p>
  </center>
  <hr />
  <br />
  <center><img class="logolfs" src="images/LFacc.jpg" /></center>
</body>

</html>