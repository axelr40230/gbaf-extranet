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
<?php
                }
                else
                {
                    header('Location:partners.php');
                }
               
                
}
            

?>