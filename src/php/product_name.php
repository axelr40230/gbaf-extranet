<?php
//recuperation du nom du produit pour personnaliser le titre de la page
if (isset($_GET['id'])) {
    $id      = (int) $_GET['id'];
    $product_name     = $db->prepare('SELECT * FROM gbaf20_produits WHERE id = :id');
    $product_name->execute(array(
        'id' => $id
    ));
    $data_product = $product_name->fetch();
    $name_product = htmlspecialchars($data_product['nom_produit']);    
}
