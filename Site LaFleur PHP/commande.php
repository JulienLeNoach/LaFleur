<?php
session_start();
include "connexionbdd.php";
$total = 0;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" />

  <title>Document</title>
</head>

<body>

  <?php
  if (isset($_SESSION["username"])) {
    echo  "<a class ='logout'href='deconnexion.php' target='titre'>Deconnexion<a><br>";
  } else {
    echo  "<a class ='logout'href='login.php' target='titre'>Connexion<a><br>";
  }
  if (isset($_SESSION["reference"])) {
    $i = count($_SESSION['reference']);
  } ?>


  <table class="catag">
    <tr>
      <th>Designation du produit</th>
      <th>Quantité</th>
      <th>Réference</th>
      <th>Prix</th>
      <th>Montant</th>
    </tr>
    <?php if (isset($_SESSION["reference"])) {
      for ($nb = 0; $nb < $i; $nb++) {
    ?>

        <tr>
          <td><?php echo $_SESSION['reference'][$nb]; ?></td>
          <td><?php echo $_SESSION['quantite'][$nb]; ?></td>


          <?php
          $dbhr = ('SELECT * FROM produit WHERE pdt_designation="' . $_SESSION['reference'][$nb] . '"');
          foreach ($bdd->query($dbhr) as $ref) {
          ?>

            <td><?php echo $ref['pdt_ref']; ?></td>
            <td><?php echo $ref['pdt_prix']; ?></td>
            <td><?php $montant = $ref['pdt_prix'] * $_SESSION['quantite'][$nb];
                $total += $montant;
                echo $montant; ?></td>
        </tr>
  <?php
          }
        }
      }
  ?>
  <tr>
    <td colspan="4">Total</td>
    <td><?php echo $total; ?></td>
  </tr>

  </table>

  <form action="envoyer.php" class="form" target="" method="POST">
    <label class="input-panier" for='codeClient'>Nom de compte :</label>
    <input type="text" class="input-panier" name="codeclient" value="<?php if (isset($_SESSION["username"])) {
                                                                        echo $_SESSION['username'];
                                                                      } ?>" />
    <label class="input-panier" for='mdp'>Mot de passe :</label>
    <input class="input-panier" type="password" name="password" /><br>
    <input class="input-panier" type="submit" name="submit" value="Envoyer la commande" />
  </form>


</body>

</html>