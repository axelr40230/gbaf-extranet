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
<title><?php require '../src/php/product_name.php';?></title>
</head>

<body>
    
        <?php require '../src/headers/header-nav.php';?>
    <div class="mega">
        <div>
            <?php
            
            if (isset($_GET['id'])){
                $id = (int) $_GET['id']; 
                $req = $db->query ("SELECT * FROM gbaf20_produits WHERE id = '$id'");
                $id_following = (int) $_GET['id'] + 1;
                if ($donnees = $req->fetch())
                {
            
            ?>
            <p><img src="<?php echo ($donnees['logo']); ?>" width="100%" height="100%" alt="Banque numérique" class="illustration"><br /><br /></p>
            
        </div>
        <div>
            <h1 class="title product-detail"><?php echo htmlspecialchars($donnees['nom_produit']); ?></h1>
            <div>
                <p class="product"><?php echo $donnees['description_produit']; ?></p>
                 </div>
        </div>
        <div class="big-container">   

           <div class="block">
                <p class="product"><a href="partners.php" class="button">Retour aux Partenaires</a></p>
            </div>
        <div class="block">
                <p class="product"><a href="information.php?id=<?=$id_following?>" class="button">Partenaire suivant</a></p>
            </div>
    </div>
        <div class="blue-box">
            <?php 
                $id_produit = (int)$_GET['id'];
                $comment_per_page = 3;
                    $paging = $db->query("SELECT COUNT(*) AS nb_comments FROM gbaf20_comments WHERE id_produit='$id_produit'");                    
                    $read = $paging->fetch();
                    $nb_pages = ceil(($read['nb_comments'])/$comment_per_page);
                    $number = $read['nb_comments'];
                    if (isset($_GET['page']) and ($_GET['page'] < 0)){
                        $page = (int)$_GET['page'];
                    }
                    else{
                        $page = 1;
                    }
                    $base = ($page-1)+$comment_per_page;
                    $req = $db->query("SELECT m.user user_name, c.comment comment, DATE_FORMAT(c.date_add, '%d/%m/%Y') AS date_add_fr FROM gbaf20_membres m INNER JOIN gbaf20_comments c ON c.id_membre = m.id WHERE c.id_produit=$id_produit ORDER BY date_add DESC LIMIT $base, $comment_per_page") or die(print_r($db->errorInfo()));
                    while ($donnees = $req->fetch()){
			?>
                <h2 class="title-comment"><?php echo $number; ?> commentaires</h2>
                    <div class="white-box">
                        <p class="left-text">Le <?php echo htmlspecialchars($donnees['date_add_fr']); ?>, <?php echo htmlspecialchars($donnees['user_name']); ?> a écrit</p>
                        <hr class="left">
                        <p class="left-text"><?php echo htmlspecialchars($donnees['comment']); ?></p>
                    </div>
            <?php
                    }
                    for($page=1; $page<= $nb_pages ; $page++)
		{
			echo '<a class="white-text" href="information.php?id='. $id . '&page='. $page . '" style="margin:5px;">' . $page . '</a>';
		}
		$req->closeCursor();
$paging->closeCursor();
		?>
                    <div class="white-box">
                      <form action="" method="post">
                           <p class="left-text"><?php require '../src/php/processing-comment.php';?></p>
                               <input type="text" id="comment" name="comment" class="comment">
                          <input type="submit" value="Ajouter un commentaire" name="valider">
                        </form>
                    </div>
            </div>
        <div class="big-container">   

           <div class="block">
                <p class="product"><a href="partners.php" class="button">Retour aux Partenaires</a></p>
            </div>
        <div class="block">
                <p class="product"><a href="information.php?id=<?=$id_following?>" class="button">Partenaire suivant</a></p>
            </div>
    </div>
        <?php
                }
                else
                {
                    header('Location:partners.php');
                }
               
                
}
            

?>
             
    </div>
    <?php require '../src/php/footer.php';?>
</body>
</html>