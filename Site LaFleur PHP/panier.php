<?php
session_start();



/*if (isset($_POST['design']) && isset($_POST['quantite2']) && !empty($_POST['quantite2'])){*/

$pos = count($_SESSION["reference"]);



$_SESSION['reference'][$pos] = $_POST['design'];
$_SESSION['quantite'][$pos] = $_POST['quantite2'];

$finpos = count($_SESSION["reference"]);



for ($nb = 0; $nb < $finpos; $nb++) {
  $_SESSION['reference'][$nb];
  $_SESSION['quantite'][$nb];
}


//}


$test = $_POST['categorie'];
header("Location: listePdt.php?categorie=$test");



if (isset($_GET['vider'])) {

  $_SESSION["reference"] = array();
  $_SESSION["quantite"] = array();
  header("Location: menu.php");
}
