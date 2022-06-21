<?php
session_start();
include "connexionbdd.php";
?>
<!DOCTYPE html>
<html>


<head>
  <meta charset="UTF-8" />
  <!--permet d'afficher les €€€€-->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php if (isset($_SESSION["username"])) {
    echo  "<a class ='logout'href='deconnexion.php' target='titre'>Deconnexion<a><br>";
  } else {
    echo  "<a class ='logout'href='login.php' target='titre'>Connexion<a><br>";
  }
  echo  '<table class="catag">';


  $dbhq = 'SELECT * FROM produit WHERE pdt_categorie="' . $_GET['categorie'] . '"';

  foreach ($bdd->query($dbhq) as $row) {
    echo '<tr>';
    echo '<td align=center><img src="images/' . $row['pdt_image'] . '.jpg" /></td>';
    echo '<td>' . $row['pdt_ref'] . '</td>';
    echo '<td>' . $row['pdt_designation'] . '</td>';
    echo '<td align=right>' . $row['pdt_prix'] . '€</td>';
    echo '</tr>';
  }

  echo '</table>';
  echo '<br>';
  echo '<br>';
  echo '<form class ="form-panier"action="panier.php" target="" method="POST">';
  echo '<select class="input-panier" name="design" size="1">';
  foreach ($bdd->query($dbhq) as $row) {

    echo '<option value="' . $row['pdt_designation'] . '">' . $row['pdt_designation'] . '</option>';
  }
  echo '</select>';
  echo '<span class="input-panier">Quantité <input type="number" name="quantite2" value="1" min="1" max="100">';
  echo '<br>';
  echo '<input class="input-panier" type="submit" name="action" value="Ajouter au panier"/>';
  echo '<input class="input-panier"type="hidden" name="categorie" value="' . $_GET['categorie'] . '">';
  echo '</form>';

  $dbh = null;

  ?>

</body>

</html>