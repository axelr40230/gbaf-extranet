<?php
require 'db.php';

$req = $db->query ('SELECT * FROM gbaf20_produits');

while ($donnees = $req->fetch())
{
?>

            
            
                <h2><?php echo htmlspecialchars($donnees['nom_produit']); ?></h2>
                <div><img src="<?php echo htmlspecialchars($donnees['logo']); ?>" alt="Banque numérique" class="illustration"></div>
                <div><p class="produit"><?php echo htmlspecialchars($donnees['description_produit']); ?></p></div>
                <div class="bloc">
                <p class="produit"><a href="detail-produit.php" class="bouton"><img src="images/book.svg" width="20" height="20" alt="Lire la suite" style="vertical-align:middle;"><span style="margin-left: 20px;">Lire la suite</span></a></p>
            </div>
            <div class="bloc">
                <p class="produit"><a href="detail-produit.php" class="bouton bleu"><img src="images/download.svg" width="20" height="20" alt="Télécharger le logo" style="vertical-align:middle;"><span style="margin-left: 20px;">Télécharger le logo</span></a></p>
            </div>
          
            


<?php
}
$req->closeCursor();
?>