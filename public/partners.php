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
<script src="https://kit.fontawesome.com/a98611f8ee.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">
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
                <p>Le GBAF est le représentant de la profession bancaire  et des assureurs  sur tous  les axes de la réglementation financière française. <br /><br />
Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.</p>
                <p><img src="images/banque.jpg" width="800px" alt="Banque numérique" class="illustration"></p>
            </div>
    <?php

$req = $db->query ('SELECT * FROM gbaf20_produits');

while ($donnees = $req->fetch())
{
    $id = (int) $donnees['id'];
    
?>

        
            <div class="block">
                <h2><?php echo htmlspecialchars($donnees['nom_produit']); ?></h2>
                <div><img src="<?php echo htmlspecialchars($donnees['logo']); ?>" alt="Banque numérique" class="illustration"></div>
                <div><p class="product"><?php echo substr($donnees['description_produit'],0, 200).'...'; ?></p></div>
            </div>
            <div class="block">
                <p class="product"><a href="../src/php/download.php?id=<?=$id?>" class="button blue"><i class="fas fa-download"></i> Télécharger le logo</a></p>
            </div>
            <div class="block">
                <p class="product"><a href="information.php?id=<?=$id?>&page=1" class="button">Lire la suite <i class="fas fa-arrow-right"></i></a></p>
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