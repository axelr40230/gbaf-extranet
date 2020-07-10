<div class="blue-box" id="section-comment">
	<div class="white-box">
		<form action="<?php $_SERVER['PHP_SELF']?>#section-comment" method="post">
			<p class="left-text">
				<?php require '../src/php/processing-comment.php';?>
			</p>
			<input type="text" id="comment" name="comment" class="comment">
			<input type="submit" value="Ajouter un commentaire" name="valider">
		</form>
	</div>
</div>
<div class="big-container">
	<div class="block">
		<p class="product">
			<a href="partners.php" class="button"><i class="fas fa-arrow-left"></i> Retour aux Partenaires </a>
		</p>
	</div>
	<div class="block">
		<p class="product">
			<a href="information.php?id=<?=$id_following?>&page=1" class="button">Partenaire suivant <i class="fas fa-arrow-right"></i></a>
		</p>
	</div>
