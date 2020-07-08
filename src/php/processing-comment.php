<?php
if (isset($_POST['valider'])){
    if (!empty($_GET['id']) AND !empty($_POST['comment'])){
        $comment = htmlspecialchars($_POST['comment']);
        $id_membre = $_SESSION['id'];
        $id_produit = (int) $_GET['id'];
        $req = $db->prepare('INSERT INTO gbaf20_comments (id_membre, id_produit, comment, date_add) VALUES(:id_membre, :id_produit, :comment, NOW())')or die(print_r($bdd->errorInfo()));
        $req->execute(array(
		'id_membre'=>$id_membre,
		'id_produit'=>$id_produit,
		'comment'=>$comment
		));
        
    }
    else{
        $message = 'Vous avez oublié d\'écrire votre message !';
        echo $message;
        
    }
}
else{
    $message = 'Laisser un commentaire';
    echo $message;
}
?>