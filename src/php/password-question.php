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
		<title>Votre question secrète</title>
	</head>
	<body>
		<?php require '../headers/header-inscription-connexion-src.php';?>
		<div class="mega">
			<div>
				<h1 class="title shadow">Répondez à votre question secrète</h1>
				<p>
					Etape 1 / 2  : Répondez à votre question secrète pour accéder à la réinitialisation du mot de passe
				</p>
			</div>
			<div class="big-container column">
				<form action="" method="post">
					<div class="field-form">
						<p class="red-text">
							<?php require 'password-reponse.php';?>
						</p>
					</div>
					<p>
						<?php echo $question ?>
					</p>
					<p  class="red-text">
						<?php echo $message ?>
					</p>
					<div class="field-form">
						<label for="reponse"><input type="text" name="reponse" id="reponse" placeholder="Votre réponse"></label>
					</div>
					<div class="field-form">
						<input type="submit" value="valider" name="valider">
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
