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
                while ($donnees = $req->fetch())
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
        <?php
                }
}
            
$req->closeCursor();
?>
                

           <div class="block">
                <p class="product"><a href="../../public/partners.php" class="button"><img src="../../public/images/book.svg" width="20" height="20" alt="Retour aux produits" style="vertical-align:middle;"><span style="margin-left: 20px;">Retour aux Partenaires</span></a></p>
            </div>
    </div>
    <?php require '../src/php/footer.php';?>
</body>
</html>