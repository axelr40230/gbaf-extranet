<?php 
require '../src/php/db.php';
session_start();
require '../src/php/connecting-state.php';
require '../src/php/user-name.php';

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
        <link rel="stylesheet" href="css/style-smartphone.css">>
		<title>
			GBAF | 
			<?php echo $identity; ?>
		</title>
	</head>
	<body>
		<?php require '../src/headers/header-nav.php';?>
		<div class="mega">
			<div class="blue-box">
				<h1 class="title product-detail"><i class="fas fa-house-user fa-2x"></i></br></br>Bienvenue <?php echo $identity; ?></h1>
				<div class="big-container column">
					<form action="" method="post">
						<p class="red-text dashbord-box">
							<?php require '../src/php/update-user.php';?>
						</p>
						<p class="yellow-text" id="valid">
							<?php echo $message?>
						</p>
						<div class="field-form">
							<p class="content white-text">
								Votre nom :
							</p>
							<label for="nom" class="label"><input type="text" name="nom" id="nom" value="<?php echo $nom ?>"></label>
						</div>
						<p class="content white-text">
							Votre prénom :
						</p>
						<div class="field-form">
							<label for="prenom"><input type="text" name="prenom" id="prenom" value="<?php echo $prenom ?>"></label>
						</div>
						<p class="content white-text">
							Votre nom d'utilisateur:
						</p>
						<div class="field-form">
							<label for="user"><input type="text" name="user" id="user" value="<?php echo $username?>"></label>
						</div>
						<p class="content white-text">
							<?php echo 'Votre question secrète actuelle : '.$question ?>
						</p>
						<div class="field-form">
							<label for="question"></label>
							<select name="question" id="question" class="question">
								<option value="<?php echo $question ?>"><?php echo $question ?></option>
								<option value="Quel est le nom de votre premier animal de compagnie ?">Quel est le nom de votre premier animal de compagnie ?</option>
								<option value="Comment s'appelle votre mère ?">Comment s'appelle votre mère ?</option>
								<option value="Où êtes-vous né.e ?">Où êtes-vous né·e ?</option>
								<option value="Quelle est votre couleur préférée ?">Quelle est votre couleur préférée ?</option>
							</select>
						</div>
						<p class="content white-text">
							Votre réponse :
						</p>
						<div class="field-form">
							<label for="reponse"><input type="text" name="reponse" id="reponse" value="<?php echo $reponse?>"></label>
						</div>
						<p class="content white-text">
							Conservez bien votre question secrète ainsi que sa réponse pour pouvoir récupérer votre mot de passe au besoin.
						</p>
						<div class="field-form">
							<input type="submit" value="Mettre à jour" class="bouton rouge" name="valider">
						</div>
					</form>
				</div>
			</div>
			<div class="big-container">
				<p class="product">
					<a href="partners.php" class="button"><i class="fas fa-arrow-left"></i> Retour aux Partenaires </a>
				</p>
				<p class="product">
					<a href="password-reponse.php" class="button">Réinitialiser son mot de passe <i class="fas fa-arrow-right"></i></a>
				</p>
			</div>
		</div>
		<?php require '../src/php/footer.php';?>
	</body>
</html>
