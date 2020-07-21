<?php 
require '../src/php/db.php';
session_start();
require '../src/php/processing-recording.php';
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
		<title>Inscription à l'Extranet GBAF</title>
	</head>
	<body>
		<?php require '../src/headers/header-inscription-connexion.php';?>
		<div class="mega">
			<div>
				<h1 class="title shadow">Formulaire à compléter pour valider votre inscription</h1>
				<p>
					En créant un compte, vous accèderez à une 
					<strong>bibliothèque régulièrement mise à jour</strong>
					 comprenant les dernières informations en matière de produits bancaires
					<br />
					<strong>Toute l'information du groupe centralisée et accessible en quelques clics !</strong>
				</p>
			</div>
			<div class="big-container">
				<form action="" method="post">
					<p class="red-text">
						<?php echo $message ?>
					</p>
					<div class="field-form">
						<label for="nom"><input type="text" name="nom" id="nom" placeholder="Votre nom"></label>
					</div>
					<div class="field-form">
						<label for="prenom"><input type="text" name="prenom" id="prenom" placeholder="Votre prénom"></label>
					</div>
					<div class="field-form">
						<label for="user"><input type="text" name="user" id="user" placeholder="Votre nom d'utilisateur"></label>
					</div>
					<div class="field-form">
						<label for="pass"><input type="password" name="pass" id="pass" placeholder="Votre mot de passe"></label>
					</div>
					<div class="field-form">
						<label for="pass-confirm"><input type="password" name="pass-confirm" id="pass-confirm" placeholder="Répétez votre mot de passe"></label>
					</div>
					<div class="field-form">
						<label for="question"></label>
						<select name="question" id="question" class="question">
							<option value="">Sélectionnez votre question secrète</option>
							<option value="Quel est le nom de votre premier animal de compagnie ?">Quel est le nom de votre premier animal de compagnie ?</option>
							<option value="Comment s'appelle votre mère ?">Comment s'appelle votre mère ?</option>
							<option value="Où êtes-vous né.e ?">Où êtes-vous né·e ?</option>
							<option value="Quelle est votre couleur préférée ?">Quelle est votre couleur préférée ?</option>
						</select>
					</div>
					<div class="field-form">
						<label for="reponse"><input type="text" name="reponse" id="reponse" placeholder="Votre réponse"></label>
					</div>
					<p class="content">
						Conservez bien votre question secrète ainsi que sa réponse pour pouvoir récupérer votre mot de passe au besoin.
					</p>
					<div class="field-form">
						<input type="submit" value="Je m'inscris !" class="bouton rouge" name="valider">
					</div>
				</form>
			</div>
		</div>
		<?php require '../src/php/footer.php';?>
	</body>
</html>
