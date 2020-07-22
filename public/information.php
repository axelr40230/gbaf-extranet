<?php session_start();
require '../src/php/db.php';
include '../src/php/user-name.php';
require '../src/php/product_name.php';


//gestion des likes/dislikes
//si l'utilisateur vote :
if (isset($_GET['id']) AND isset($_GET['user-click-vote']) AND isset($_GET['page'])) {
    $id_produit      = (int) $_GET['id'];
    $id_user         = $_SESSION['id'];
    $numero_page     = (int) $_GET['page'];
    $user_click_vote = (int) $_GET['user-click-vote'];
    $user_vote       = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND id_user = :id_user");
    $user_vote->execute(array(
        'id_produit' => $id_produit,
        'id_user' => $id_user
    ));
    //verification si dejà voté
    $number_user_vote = $user_vote->rowCount();
    //si pas de vote :
    if ($number_user_vote == 0) {
        //insertion dans la base
        $enter_user_vote = $db->prepare("INSERT INTO gbaf20_vote (id_user, id_produit, vote) VALUES (:id_user, :id_produit, :vote)");
        $enter_user_vote->execute(array(
            'id_user' => $id_user,
            'id_produit' => $id_produit,
            'vote' => $user_click_vote
        ));
        //calcul du nombre total de like sur ce produit
        $like = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 1");
        $like->execute(array(
            'id_produit' => $id_produit
        ));
        $number_like = $like->rowCount();
        
        //calcul du nombre total de dislike sur le produit
        $dislike = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 0");
        $dislike->execute(array(
            'id_produit' => $id_produit
        ));
        $number_dislike = $dislike->rowCount();
        //gestion de la css selon le vote de l'utilisateur
        if ($user_click_vote == 1) {
            $class_like    = 'user-like';
            $class_dislike = 'like';
            header('location:information.php?id=' . $id_produit . '&page=' . $numero_page . '#vote-section');
        } else {
            $class_like    = 'like';
            $class_dislike = 'dislike';
            header('location:information.php?id=' . $id_produit . '&page=' . $numero_page . '#vote-section');
        }
    } else {
        //si déjà voté, efface le vote de la BDD
        $delete_user_vote = $db->prepare('DELETE FROM gbaf20_vote WHERE id_user = :id_user');
        $delete_user_vote->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $delete_user_vote->execute();
        //calcul nombre likes
        $like = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 1");
        $like->execute(array(
            'id_produit' => $id_produit
        ));
        $number_like = $like->rowCount();
        //calcul nombre dislikes
        $dislike = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 0");
        $dislike->execute(array(
            'id_produit' => $id_produit
        ));
        $number_dislike = $dislike->rowCount();
        //gestion css
        $class_like     = 'like';
        $class_dislike  = 'like';
        header('location:information.php?id=' . $id_produit . '&page=' . $numero_page . '#vote-section');
    }
  //si l'utilisateur n'envoie pas de vote  
} elseif (isset($_GET['id']) AND isset($_GET['page'])) {
    $id_produit  = (int) $_GET['id'];
    $id_user     = $_SESSION['id'];
    $numero_page = (int) $_GET['page'];
    //calcul nombre de like
    $like        = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 1");
    $like->execute(array(
        'id_produit' => $id_produit
    ));
    $number_like = $like->rowCount();
    //calcul nombre de dislike
    $dislike = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 0");
    $dislike->execute(array(
        'id_produit' => $id_produit
    ));
    $number_dislike = $dislike->rowCount();
    //verification si utlisateur a voté auparavant
    $user_vote = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND id_user = :id_user");
    $user_vote->execute(array(
        'id_produit' => $id_produit,
        'id_user' => $id_user
    ));
    $number_user_vote = $user_vote->rowCount();
    if ($number_user_vote == 0) {
        //si pas encore voté, gestion css :
        $class_like    = 'like';
        $class_dislike = 'like';
    } else {
        $donnees = $user_vote->fetch();
        //si vote dislike
        if ($donnees['vote'] == 0) {
            $class_like    = 'like';
            $class_dislike = 'dislike';
            //si vote like
        } elseif ($donnees['vote'] == 1) {
            $class_like    = 'user-like';
            $class_dislike = 'like';
        }
    }
} else {
    header('location:partners.php');
}
?>
<!doctype html>
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-tablette.css">
        <link rel="stylesheet" href="css/style-smartphone.css">
		<script src="https://kit.fontawesome.com/a98611f8ee.js" crossorigin="anonymous"></script>
		<title><?php echo $name_product; ?></title>
	</head>
	<body>
		<?php require '../src/headers/header-nav.php';?>
		<div>
			<div class="mega">
				<?php require '../src/php/product-content.php';?>
		
<div class="big-container">      
    <div class="block">
        <p class="red-text"><?php
echo $number_like;
?> <i class="fas fa-thumbs-up"></i><a href="../../public/information.php?id=<?= $id_produit ?>&page=<?= $numero_page ?>&user-click-vote=1#vote-section" class="<?php
echo $class_like;
?>"><i class="fas fa-thumbs-up"></i> J'aime</a></p>
    </div>
    <div class="block">
        <p class="red-text"><?php
echo $number_dislike;
?> <i class="fas fa-thumbs-down"></i><a href="../../public/information.php?id=<?= $id_produit ?>&page=<?= $numero_page ?>&user-click-vote=0#vote-section" class="<?php
echo $class_dislike;
?>"><i class="fas fa-thumbs-down"></i> Je n'aime pas</a></p>
    </div>
</div>
				
                
				<div class="blue-box" id="section-comment">
	<div class="white-box">
        
		<form action="information.php?id=<?= $id_produit ?>&page=1#section-comment" method="post">
			<p class="left-text">
				<?php if (isset($_POST['valider'])) {
    if (!empty($_GET['id']) AND !empty($_POST['comment']) AND isset($_GET['page'])) {
        $comment     = htmlspecialchars($_POST['comment']);
        $id_membre   = $_SESSION['id'];
        $id_produit  = (int) $_GET['id'];
        $numero_page = (int) $_GET['page'];
        //insertion du commentaire
        $req = $db->prepare('INSERT INTO gbaf20_comments (id_membre, id_produit, comment, date_add) VALUES(:id_membre, :id_produit, :comment, NOW())') or die(print_r($bdd->errorInfo()));
        $req->execute(array(
            'id_membre' => $id_membre,
            'id_produit' => $id_produit,
            'comment' => $comment
        ));
        $message_comment = 'Merci de votre commentaire <i class="far fa-smile-wink red-text"></i>';
       echo $message_comment;
        
    } else {
        $message_comment = '<i class="fas fa-exclamation-circle red-text"></i> Vous avez oublié d\'écrire votre message !';
        echo $message_comment;
        
    }
} else {
    $message_comment = '<i class="far fa-comment red-text"></i> Laisser un commentaire';
    echo $message_comment;
};?>
			</p>
			<input type="text" id="comment" name="comment" class="comment">
			<input type="submit" value="Ajouter un commentaire" name="valider">
		</form>
	</div>
</div>
                <?php require '../src/php/product-comment.php';?>
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
			</div>
		</div>
            </div>
		<?php require '../src/php/footer.php';?>
	</body>
</html>