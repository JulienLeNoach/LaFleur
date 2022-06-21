<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php
  require('connexionbdd.php');
  session_start();
  if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (
      preg_match('/^[a-zA-Z0-9]+[_.-]{0,1}[a-zA-Z0-9]+$/m', $username) == true &&
      preg_match('/^[a-zA-Z0-9]+[_.-]{0,1}[a-zA-Z0-9]+$/m', $password) == true
    ) {
      $username = mysqli_real_escape_string($bdd, $username);
      $password = mysqli_real_escape_string($bdd, $password);

      $query = "SELECT clt_code,clt_motPasse FROM `clientconnu` WHERE clt_code='$username' 
      AND clt_motPasse= SHA1('$password')";
      $result = mysqli_query($bdd, $query);

      if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header('location: ACCUEIL.php');;
      } else {
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
      }
    } else {
      $message = "Veuillez rentrer le formulaire correctement";
    }
  }

  ?>
  <form class="box" action="" method="post" name="login">

    <h1 class="box-title">Connexion</h1>
    <input type="text" class="box-input" name="username" required placeholder="Nom d'utilisateur">
    <input type="password" class="box-input" name="password" required placeholder="Mot de passe">
    <input type="submit" value="Connexion " name="submit" class="box-button">
    <p class="box-register">Vous êtes nouveau ici?
      <a href="inscription.php">S'inscrire</a>
    </p>
    <?php if (!empty($message)) { ?>
      <p class="errorMessage"><?php echo $message;
                            } ?></p>
  </form>
</body>

</html>