<?php
$id_produit = (int) $_GET['id'];
$paging     = $db->prepare("SELECT id FROM gbaf20_comments WHERE id_produit=:id_produit");
$paging->execute(array(
    'id_produit' => $id_produit
));
$number = $paging->rowCount();
if ($number > 1) {
    echo 'Il y a ' . $number . ' commentaires';
    
} elseif ($number == 1) {
    echo 'Il y a ' . $number . ' commentaire';
    
} else {
    echo 'Soyez le premier à laisser un commentaire ! ';
    
}
