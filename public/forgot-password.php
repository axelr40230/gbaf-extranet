<?php 
require '../src/php/db.php';
session_start();
require 'password-user.php';
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-tablette.css">
        <link rel="stylesheet" href="css/style-smartphone.css">
		<title>Mot de passe oublié</title>
	</head>
	<body>
		<?php require '../src/headers/header-inscription-connexion.php';?>
		<div class="mega">
			<div>
				<h1 class="title shadow">Besoin de changer le mot de passe ?</h1>
				<p>
					Complétez le formulaire et accédez à la réinitialisation de mot de passe
				</p>
			</div>
			<div class="big-container column">
				<form action="" method="post">
					<div class="field-form">
						<p class="red-text">
							<?php echo $message;?>
						</p>
					</div>
					<div class="field-form">
						<label for="user"><input type="text" name="user" id="user" placeholder="Votre nom d'utilisateur"></label>
					</div>
					<div class="field-form">
						<input type="submit" value="valider" name="valider">
					</div>
				</form>
				<hr class="space">
				<div class="big-container">
					<p>
						<a href="connexion.php" class="button blue">Retour connexion</a>
					</p>
				</div>
			</div>
		</div>
		<?php require '../src/php/footer.php';?>
	</body>
</html>
