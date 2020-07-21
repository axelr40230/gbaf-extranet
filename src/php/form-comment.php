<div class="blue-box" id="section-comment">
	<div class="white-box">
		<form action="<?php $_SERVER['PHP_SELF']?>#section-comment" method="post">
			<p class="left-text">
				<?php if (isset($_POST['valider'])) {
    if (!empty($_GET['id']) AND !empty($_POST['comment']) AND isset($_GET['page'])) {
        $comment     = htmlspecialchars($_POST['comment']);
        $id_membre   = $_SESSION['id'];
        $id_produit  = (int) $_GET['id'];
        $numero_page = (int) $_GET['page'];
        $req = $db->prepare('INSERT INTO gbaf20_comments (id_membre, id_produit, comment, date_add) VALUES(:id_membre, :id_produit, :comment, NOW())') or die(print_r($bdd->errorInfo()));
        $req->execute(array(
            'id_membre' => $id_membre,
            'id_produit' => $id_produit,
            'comment' => $comment
        ));
        $message_comment = 'Merci de votre commentaire <i class="far fa-smile-wink"></i>';
       echo $message_comment;
    } else {
        $message_comment = '<i class="fas fa-exclamation-circle"></i> Vous avez oublié d\'écrire votre message !';
        
         echo $message_comment;
    }
} else {
    $message_comment = '<i class="far fa-comment"></i> Laisser un commentaire';
     echo $message_comment;
};?>
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
			<a href="../../public/information.php?id=<?=$id_following?>&page=1" class="button">Partenaire suivant <i class="fas fa-arrow-right"></i></a>
		</p>
	</div>
