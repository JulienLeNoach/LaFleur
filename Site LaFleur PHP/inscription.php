<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php
  require('connexionbdd.php');
  if (isset($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['email'], $_REQUEST['name'])) {
    // récupérer le nom d'utilisateur 
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($bdd, $username);
    // récupérer l'email 
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($bdd, $email);
    // récupérer l'email 
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($bdd, $name);
    // récupérer le mot de passe 
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($bdd, $password);


    $query = "INSERT into `clientconnu` (clt_code,clt_email,clt_nom, clt_motPasse)
  VALUES ('$username','$email','$name', SHA1('$password'))";
    $res = mysqli_query($bdd, $query);
    if ($res) {
      echo "<div >
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    } else {
      "<div >
             <h3>Login déja utilisé</h3>
             <p>Cliquez ici pour reessayer <a href='inscription.php'>connecter</a></p>
       </div>";
    }
  } else {
  ?>
    <form class="box" action="inscription.php" method="post">

      <h1 class="box-title">S'inscrire</h1>
      <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required /><br>
      <input type="text" class="box-input" name="name" placeholder="Nom" required /><br>

      <input type="text" class="box-input" name="email" placeholder="Email" required /><br>

      <input type="password" class="box-input" name="password" required placeholder="Mot de passe" /><br>

      <input type="submit" name="submit" value="S'inscrire" class="box-button" />


    </form>
  <?php } ?>
</body>

</html>