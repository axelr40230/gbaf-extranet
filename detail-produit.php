<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
<link rel="stylesheet" href="style.css">
<title>Détails du produit</title>
</head>

<body>
    <?php require 'header3.php';?>
    <div class="mega">
        <div>
            <?php
            require 'db.php';
            if (isset($_GET['id'])){
                $id = (int) $_GET['id']; 
                $req = $db->query ("SELECT * FROM gbaf20_produits WHERE id = '$id'");
                while ($donnees = $req->fetch())
                {
            
            ?>
            <p><img src="<?php echo ($donnees['logo']); ?>" width="100%" alt="Banque numérique" class="illustration"><br /><br /></p>
            
        </div>
        <div>
            <h1 class="titre detail-produit"><?php echo htmlspecialchars($donnees['nom_produit']); ?></h1>
            <div>
                <p class="produit"><?php echo $donnees['description_produit']; ?></p>
                 </div>
        </div>
        <?php
                }
}
            
$req->closeCursor();
?>
                

           <div class="bloc">
                <p class="produit"><a href="produits.php" class="bouton"><img src="images/book.svg" width="20" height="20" alt="Retour aux produits" style="vertical-align:middle;"><span style="margin-left: 20px;">Retour aux produits</span></a></p>
            </div>
    </div>
    <?php require 'footer.php';?>
</body>
</html>