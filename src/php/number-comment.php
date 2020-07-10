<?php
$id_produit = (int) $_GET['id'];
$paging     = $db->prepare("SELECT id FROM gbaf20_comments WHERE id_produit=:id_produit");
$paging->execute(array(
    'id_produit' => $id_produit
));
$number = $paging->rowCount();
if ($number > 1) {
    $message = 'Il y a ' . $number . ' commentaires';
    echo $message;
} elseif ($number == 1) {
    $message = 'Il y a ' . $number . ' commentaire';
    echo $message;
} else {
    $message = 'Soyez le premier à laisser un commentaire ! ';
    echo $message;
}
?>