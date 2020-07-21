<?php
if (isset($_POST['valider'])) {
    if (!empty($_GET['id']) AND !empty($_POST['comment']) AND isset($_GET['page'])) {
        $comment     = htmlspecialchars($_POST['comment']);
        $id_membre   = $_SESSION['id'];
        $id_produit  = (int) $_GET['id'];
        $numero_page = (int) $_GET['page'];
        $req = $db->prepare('INSERT INTO gbaf20_comments (id_membre, id_produit, comment, date_add) VALUES(:id_membre, :id_produit, :comment, NOW())') or die(print_r($bdd->errorInfo()));
        $req->execute(array(
            'id_membre' => $id_membre,
            'id_produit' => $id_produit,
            'comment' => $comment
        ));
        $message_comment = 'Merci de votre commentaire <i class="far fa-smile-wink"></i>';
       
    } else {
        $message_comment = '<i class="fas fa-exclamation-circle"></i> Vous avez oublié d\'écrire votre message !';
        
        
    }
} else {
    $message_comment = '<i class="far fa-comment"></i> Laisser un commentaire';
    
}
?>