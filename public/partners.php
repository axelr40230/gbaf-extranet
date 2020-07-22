<?php 
require '../src/php/db.php';
session_start();
require '../src/php/connecting-state.php';
require '../src/php/user-name.php';
?>
<!doctype html>
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
		<script src="https://kit.fontawesome.com/a98611f8ee.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-tablette.css">
        <link rel="stylesheet" href="css/style-smartphone.css">
		<title>Partenaires GBAF</title>
	</head>
	<body>
		<?php require '../src/headers/header-nav.php';?>
		<div class="mega">
			<div  class="big-container">
				<h1 class="title red-text shadow">GBAF extranet regroupement d'informations sur les différents produits financiers</h1>
				<hr>
			</div>
			<div class="big-container">
				<div class="block">
					<p>
						Le GBAF est le représentant de la profession bancaire  et des assureurs  sur tous  les axes de la réglementation financière française. 
						<br />
						<br />
						Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
					</p>
					<p>
						<img src="images/banque.jpg" alt="Banque numérique" class="illustration">
					</p>
				</div>
				<?php
                //récupération des données partenaires et mise en boucle
                $req = $db->query ('SELECT * FROM gbaf20_produits');
                while ($donnees = $req->fetch()){
                    //répurération de l'id du partenaire pour la page download
                    $id = (int) $donnees['id'];
                    //generation de la balise alt en fonction du nom du fichier
                $alt = basename($donnees['logo']);
                ?>
				<div class="big-container partners">
					<div class="block">
						<h2 class="title-partner"><?php echo htmlspecialchars($donnees['nom_produit']); ?></h2>
						<div>
							<img src="<?php echo htmlspecialchars($donnees['logo']); ?>" alt="<?php echo $alt; ?>" class="illustration">
						</div>
						<div>
							<p class="product">
								<?php echo substr($donnees['description_produit'],0, 200).'...'; ?>
							</p>
						</div>
					</div>
					<div class="block">
						<p class="product">
							<a href="download.php?id=<?=$id?>" class="button blue"><i class="fas fa-download"></i> Télécharger le logo</a>
						</p>
					</div>
					<div class="block">
						<p class="product">
							<a href="information.php?id=<?=$id?>&page=1" class="button">Lire la suite <i class="fas fa-arrow-right"></i></a>
						</p>
					</div>
				</div>
				<?php
                }
                $req->closeCursor();
                ?>
			</div>
		</div>
		<?php require '../src/php/footer.php';?>
	</body>
</html>
