<?php 
require 'db.php';
session_start();
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
		<link rel="stylesheet" href="../../public/css/style.css">
		<title>Réinitialisation du mot de passe</title>
	</head>
	<body>
		<?php require '../headers/header-inscription-connexion-src.php';?>
		<div class="mega">
			<div>
				<h1 class="title shadow">Réinitialisation du mot de passe</h1>
				<p>
					Etape 2 / 2  : Choisissez votre nouveau mot de passe
				</p>
			</div>
			<div class="big-container column">
				<form action="" method="post">
					<div class="field-form">
						<p class="red-text">
							<?php require 'password-new.php';?>
						</p>
						<div class="field-form">
							<label for="pass"><input type="password" name="pass" id="pass" placeholder="Votre nouveau mot de passe"></label>
						</div>
						<div class="field-form">
							<label for="pass-confirm"><input type="password" name="pass-confirm" id="pass-confirm" placeholder="Confirmez votre mot de passe"></label>
							<br/>
							<br/>
						</div>
						<div class="field-form">
							<input type="submit" value="valider" name="valider">
						</div>
					</div>
				</form>
				<hr class="space">
				<div class="big-container">
					<p>
						<a href="../../public/connexion.php" class="button blue">Retour connexion</a>
					</p>
				</div>
			</div>
		</div>
		<?php require 'footer.php';?>
	</body>
</html>
