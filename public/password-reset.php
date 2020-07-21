<?php 
require '../src/php/db.php';
session_start();
require 'password-new.php';
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" type="image/png" href="../src/php/images/favicon.png"/>
        <script src="https://kit.fontawesome.com/a98611f8ee.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-tablette.css">
        <link rel="stylesheet" href="css/style-smartphone.css">
		<title>Réinitialisation du mot de passe</title>
	</head>
	<body>
		<?php require '../src/headers/header-inscription-connexion-src.php';?>
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
							<?php echo $message;?>
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
						<a href="connexion.php" class="button blue">Retour connexion</a>
					</p>
				</div>
			</div>
		</div>
		<?php require '../src/php/footer.php';?>
	</body>
</html>
