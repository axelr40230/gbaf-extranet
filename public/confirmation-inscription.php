<?php 
require '../src/php/db.php';
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
		<link rel="stylesheet" href="css/style.css">
		<title>Confirmation d'inscription à l'Extranet GBAF</title>
	</head>
	<body>
		<?php require '../src/headers/header-inscription-connexion.php';?>
		<div class="mega">
			<div class="big-container column">
				<h1 class="title shadow">Votre inscription a bien été enregistrée. Nous vous en remercions</h1>
				<p>
					Vous pouvez désormais vous connecter à l'application dédiée à la recherche des meilleurs produits financiers du groupe. 
				</p>
			</div>
			<div class="big-container column">
				<p>
					<a href="connexion.php" class="button">Se connecter</a>
				</p>
				<p>
					Vous pourrez modifier votre mot de passe à tout moment ainsi que la question secrète en vous rendant sur votre page profil.
				</p>
			</div>
		</div>
		<?php require '../src/php/footer.php';?>
	</body>
</html>