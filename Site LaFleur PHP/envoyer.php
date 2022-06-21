<?php
session_start();
include 'connexionbdd.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Envoie</title>
</head>

<body>
  <?php
  if (isset($_POST['submit']) && $_POST['submit'] == 'Envoyer la commande') {
    $valide_login = false;

    $number_article = count($_SESSION['reference']);

    $requete = "SELECT clt_code, clt_motPasse, clt_nom FROM clientconnu WHERE clt_code='" . $_POST['codeclient'] . "';";

    $id_numero_commande = time();

    $requete2 = 'INSERT INTO commande(cde_moment, cde_client, cde_date) VALUES("' . $id_numero_commande . '", "' . $_POST['codeclient'] . '", "' . date('d-m-Y') . '");';

    foreach ($bdd->query($requete) as $row) {
      if (isset($_POST['codeclient']) && isset($_POST['password']) && !empty($_POST['codeclient']) && !empty($_POST['password']) && $_POST['codeclient'] == $row['clt_code'] && sha1($_POST['password']) == $row['clt_motPasse']) {
        echo '<p>Bonjour M.' . $row['clt_nom'] . ', votre commande à bien été enregistré sous le n° ' . $_POST['codeclient'] . '/' . $id_numero_commande . '.</p>';
        mysqli_query($bdd, $requete2);

        for ($nb = 0; $nb < $number_article; $nb++) {
          if (!empty($_SESSION['reference'][$nb]) && !empty($_SESSION['quantite'][$nb])) {
            $requete3 = 'INSERT INTO contenir(cde_moment, cde_client, produit, quantite) VALUES("' . $id_numero_commande . '", "' . $_POST['codeclient'] . '", "' . $_SESSION['reference'][$nb] . '", "' . $_SESSION['quantite'][$nb] . '");';
            mysqli_query($bdd, $requete3);
          }
        }

        $_SESSION['reference'] = [];
        $_SESSION['quantite']  = [];

        $valide_login = true;
      }
    }

    if ($valide_login == false) {
      if (empty($_POST['codeclient']) || empty($_POST['password'])) {
        echo '<p>Vous avez oublié de remplir votre n° code client et/ou votre mot de passe</p>';
        header("refresh:3;url=commande.php");
      } else {
        echo '<p>Votre n° code client ou votre mot de passe est incorrect !</p>';
        header("refresh:3;url=commande.php");
      }
    }
  }
  $bdd = null; ?>
</body>

</html>