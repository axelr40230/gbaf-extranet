<?php
require '../src/php/db.php';
if (isset($_GET['id'])) {
    //recuperation de l'id du produit
    $id      = (int) $_GET['id'];
    $req     = $db->prepare("SELECT * FROM gbaf20_produits WHERE id = :id");
    $req->execute(array(
        'id' => $id
    ));
    $donnees = $req->fetch();
    $file    = $donnees['logo'];
    if (($file != "") AND (file_exists("images/" . basename($file)))) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        readfile("images/" . basename($file));
        exit;
    }
    
    
} else {
    header('location:partners.php');
}

?>