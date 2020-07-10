<?php
if (isset($_GET['id'])) {
    $id      = (int) $_GET['id'];
    $req     = $db->query("SELECT * FROM gbaf20_produits WHERE id = '$id'");
    $donnees = $req->fetch();
    echo htmlspecialchars($donnees['nom_produit']);
}
?>