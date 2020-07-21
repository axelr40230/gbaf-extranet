<?php 
require '../src/php/db.php';
session_start();
include '../src/php/user-name.php';
include '../src/php/number-comment.php';
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
		<link rel="stylesheet" href="css/style.css">
		<script src="https://kit.fontawesome.com/a98611f8ee.js" crossorigin="anonymous"></script>
		<title><?php require '../src/php/product_name.php';?></title>
	</head>
	<body>
		<?php require '../src/headers/header-nav.php';?>
		<div>
			<div class="mega">
				<div>
    <?php
if (isset($_GET['id'])) {
    $id_product           = (int) $_GET['id'];
    $content_product          = $db->prepare("SELECT * FROM gbaf20_produits WHERE id = :id_product");
    $content_product->execute(array(
            'id_product' => $id_product
        ));
    $id_following = (int) $_GET['id'] + 1;
    if ($data_content = $content_product->fetch()) {
?>
   <p>
        <img src="<?php
        echo ($data_content['logo']);
?>" width="100%" height="100%" alt="Banque numérique" class="illustration">
        <br />
        <br />
    </p>
</div>
<div>
    <h1 class="title product-detail"  id="vote-section"><?php
        echo htmlspecialchars($data_content['nom_produit']);
?></h1>
    <div>
        <p class="product">
            <?php
        echo $data_content['description_produit'];
?>
       </p>
    </div>
</div>
<?php
    } else {
        header('Location:partners.php');
    }
}
?>
				<?php require '../src/php/like.php';?>
				<div class="blue-box" id="section-comments">
    <?php
                    $id_product           = (int) $_GET['id'];
$commentPerPage = 3;
$paging         = $db->prepare("SELECT * FROM gbaf20_comments WHERE id_produit=:id_product");
                    $paging->execute(array(
            'id_product' => $id_product
        ));
$totalComment   = $paging->rowCount();
$pagesTotales   = ceil($totalComment / $commentPerPage);
if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
    $_GET['page'] = intval($_GET['page']);
    $pageCourante = $_GET['page'];
} else {
    $pageCourante = 1;
}
$base = ($pageCourante - 1) * $commentPerPage;
?>
   <h2 class="title product-detail"><i class="fab fa-readme fa-5x"></i></br><?php
echo $number_comment;
?></h2>
    <?php
                $id_product           = (int) $_GET['id'];
$req = $db->prepare("SELECT m.user user_name, c.comment comment, DATE_FORMAT(c.date_add, '%d/%m/%Y') AS date_add_fr FROM gbaf20_membres m INNER JOIN gbaf20_comments c ON c.id_membre = m.id WHERE c.id_produit=:id_product ORDER BY date_add DESC LIMIT $base, $commentPerPage") or die(print_r($db->errorInfo()));
         $req->execute(array(
            'id_product' => $id_product
        ));       
while ($donnees = $req->fetch()) {
?>
   <div class="white-box">
        <p class="left-text">
            <i class="fas fa-comment"></i>
             Le 
            <?php
    echo htmlspecialchars($donnees['date_add_fr']);
?>
           , 
            <?php
    echo htmlspecialchars($donnees['user_name']);
?>
            a écrit
        </p>
        <hr class="left">
        <p class="left-text">
            <?php
    echo htmlspecialchars($donnees['comment']);
?>
       </p>
    </div>
    <?php
}
?>
   <div class="center">
        <ul class="pagination">
            <?php
for ($i = 1; $i <= $pagesTotales; $i++) {
    if ($i == $pageCourante) {
?>
           <?php
        echo '<li><a class="content paging" href="#section-comment">' . $i . '</a> </li>';
?><?php
    } else {
?><?php
        echo '<li><a class="content paging" href="information.php?id=' . $id . '&page=' . $i . '#section-comments">' . $i . '</a> </li>';
?><?php
    }
}
?></ul></div>
        </div>
				<?php require '../src/php/form-comment.php';?>
			</div>
		</div>
		<?php require '../src/php/footer.php';?>
	</body>
</html>