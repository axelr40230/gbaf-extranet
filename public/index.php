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
		<title>Accès Extranet GBAF</title>
	</head>
	<body>
		<body  id="homebody">
			<?php require '../src/headers/header-index.php';?>
			<div class="mega">
				<div>
					<h1 class="title white-text"><?php require '../src/php/index-state.php';?></p>
				</h1>
				<hr>
			</div>
			<div class="big-container">
				<div class="block">
					<p class="content white-text">
						Connectez vous à votre espace
					</p>
					<p class="content white-text">
						<a href="connexion.php" class="button white large">Connexion</a>
					</p>
				</div>
				<div class="block">
					<p class="content white-text">
						Première visite ? Inscrivez-vous
					</p>
					<p class="content white-text">
						<a href="inscription.php" class="button white large">Inscription</a>
					</p>
				</div>
			</div>
			<div class="white-box explain">
				<h2 class="title-why">Pourquoi un extranet ?</h2>
				<hr>
				<p class="content left-text">
					Le Groupement Banque-Assurance Français (GBAF) est l'
					<strong>organisation professionnelle qui représente toutes les banques installées en France</strong>
					.
					</br>
					</br>
					La GBAF est une fédération représentant les 6 grands groupes français (BNP Paribas, BPCE, Crédit Agricole, Crédit Mutuel-CIC, Société Générale, La Banque Postale)
					</br>
					</br>
					Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer 
					<strong>près de 80 millions de comptes</strong>
					 sur le territoire national.
					</br>
					</br>
					Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de 
					<strong>promouvoir l'activité bancaire à l’échelle nationale</strong>
					. C’est aussi un interlocuteur privilégié des pouvoirs publics
				</p>
				<p class="content left-text">
					Les produits et services bancaires sont nombreux et très variés. Afin de 
					<strong>renseigner au mieux les clients</strong>
					, les salariés des 340 agences des banques et assurances en France (agents, chargés de clientèle, conseillers financiers, etc.) peuvent 
					<strong>trouver sur l'Extranet GBAF des informations portant sur des produits bancaires et des financeurs</strong>
					, entre autres.
				</p>
			</div>
			<?php require '../src/php/footer.php';?>
		</div>
	</body>
</html>
