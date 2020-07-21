<?php
if (isset($_GET['id'])){
    $id_produit     = (int) $_GET['id'];
    //Vairiable pour le lien partenaire suivant
    $id_following = (int) $_GET['id'] + 1;
    //gestion de la pagination des commentaires
    $commentPerPage = 3;
    $paging         = $db->query("SELECT id FROM gbaf20_comments WHERE id_produit=$id_produit");
    $totalComment   = $paging->rowCount();
    $pagesTotales   = ceil($totalComment / $commentPerPage);
    if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales){
        $_GET['page'] = intval($_GET['page']);
        $pageCourante = $_GET['page'];
        for ($i = 1; $i <= $pagesTotales; $i++){
            if ($i == $pageCourante){
                $page_en_cours = '<li><a class="content paging" href="#section-comment">' . $i . '</a> </li>';
            }else{
                $page_suivante = '<li><a class="content paging" href="information.php?id=' . $id . '&page=' . $i . '#section-comments">' . $i . '</a> </li>';
            }
        }
    }else{
        $pageCourante = 1;
    }
    $base = ($pageCourante - 1) * $commentPerPage;
    //gestion de l'affichage des informations produits
    $product_content          = $db->prepare('SELECT * FROM gbaf20_produits WHERE id = :id_produit');
    $product_content->execute(array(
            'id' => $id_produit
        ));
    $donnees = $product_content->fetch();
    $logo = ($donnees['logo']);
    $product_name = htmlspecialchars($donnees['nom_produit']);
    $description = $donnees['description_produit'];
    //gestion de l'affichage des commentaires
    $req_comment = $db->query("SELECT m.user user_name, c.comment comment, DATE_FORMAT(c.date_add, '%d/%m/%Y') AS date_add_fr FROM gbaf20_membres m INNER JOIN gbaf20_comments c ON c.id_membre = m.id WHERE c.id_produit=$id_produit ORDER BY date_add DESC LIMIT $base, $commentPerPage") or die(print_r($db->errorInfo()));
    while ($donnees = $req_comment->fetch()){
        $date_add = $donnees['date_add_fr'];
        var_dump($date_add);
        exit();
        $user_name= $donnees['user_name'];
        $comment_post = $donnees['comment'];
    }
}else{
    header('Location:partners.php');
}
    ?>