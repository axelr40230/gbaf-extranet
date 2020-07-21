<?php 
require '../src/php/db.php';
session_start();
require '../src/php/connection-state.php';
require '../src/php/processing-connection.php';
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
        <script src="https://kit.fontawesome.com/a98611f8ee.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-tablette.css">
        <link rel="stylesheet" href="css/style-smartphone.css">
		<title>Connexion à l'Extranet GBAF</title>
	</head>
	<body>
		<?php require '../src/headers/header-inscription-connexion.php';?>
		<div class="mega">
			<div>
				<h1 class="title shadow">Connectez-vous à votre espace personnalisé</h1>
				<p>
					Accédez en quelques clics
					<strong> aux dernières actualités du groupe</strong>
					 !
					<br />
					<br />
					<u>
						Découvrez de nouveaux produits à proposer à vos clients
					</u>
				</p>
			</div>
			<div class="big-container">
				<form action="" method="post">
					<div class="field-form">
						<p class="red-text">
							<?php echo $message; ?>
						</p>
						<label for="user" class="field-form"></label>
						<input type="text" name="user" id="user" placeholder="Votre nom d'utilisateur">
						<label for="pass" class="field-form"></label>
						<input type="password" name="pass" id="pass" placeholder="Votre mot de passe">
						<br/>
						<br/>
						<br/>
						<div class="remember">
							<input type="checkbox" name="souvenir" id="souvenir">
							<label for="souvenir" class="field-form">Se souvenir de moi</label>
							<br/>
							<br/>
							<br/>
						</div>
						<input type="submit" value="valider" name="valider">
					</div>
					<p>
						<a href="forgot-password.php">Mot de passe oublié ?</a>
					</p>
				</form>
				<div>
					<p>
						Première visite ? Inscrivez-vous
					</p>
					<p>
						<a href="inscription.php" class="button blue">Je m'inscris !</a>
					</p>
				</div>
			</div>
		</div>
		<?php require '../src/php/footer.php';?>
	</body>
</html>
