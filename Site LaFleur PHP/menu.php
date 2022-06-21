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
	<p style="text-align:center;">
		<b>LaFleur</b>
	</p>
	<div class="logo"><img src="logocorner.png" alt="" srcset=""></div>
	<a href="ACCUEIL.php" target="titre">ACCUEIL</a><br>
	<!--Cible le fichier html-->
	<hr>
	<a href="inscription.php" target="titre">S'inscrire<a><br>
			<a href="mailto:commercial@lafleur.com" target="titre">Nous écrire</a><br>
			<a href="home.php" target="titre">Espace membre<a><br>
					<hr>
					<a><u>Nos Produits</u></a><br>
					<a href="listePdt.php?categorie=bul" target="titre">Bulbes<a><br>
							<a href="listePdt.php?categorie=mas" target="titre">Plantes à massif<a><br>
									<a href="listePdt.php?categorie=ros" target="titre">Rosiers<a><br>

											<hr>
											<form action='panier.php' method='get'>
												<input type='submit' name='vider' value='Vider le panier' />
											</form>
											<form action="commande.php" target="titre" method="POST">
												<p><input type="submit" value="Commander" />
											</form>


</body>

</html>