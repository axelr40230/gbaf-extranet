<?php
$id_produit = (int)$_GET['id'];
$paging = $db->query("SELECT id FROM gbaf20_comments WHERE id_produit='$id_produit'"); 
$number = $paging->rowCount();
if ($number>1){
    $message = 'Il y a '.$number.' commentaires';
    echo $message;
}
elseif ($number==1){
    $message = 'Il y a '.$number.' commentaire';
    echo $message;
}
else{
    $message = 'Aucun commentaire pour le moment ! ';
    echo $message;
}
?>