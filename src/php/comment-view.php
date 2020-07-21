<?php
$id_produit     = (int) $_GET['id'];
$commentPerPage = 3;
$paging         = $db->query("SELECT id FROM gbaf20_comments WHERE id_produit='$id_produit'");
$totalComment   = $paging->rowCount();
$pagesTotales   = ceil($totalComment / $commentPerPage);
if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
    $_GET['page'] = intval($_GET['page']);
    $pageCourante = $_GET['page'];
} else {
    $pageCourante = 1;
}
$base = ($pageCourante - 1) * $commentPerPage;


$com = $db->prepare("SELECT m.user user_name, c.comment comment, DATE_FORMAT(c.date_add, '%d/%m/%Y') AS date_add_fr FROM gbaf20_membres m INNER JOIN gbaf20_comments c ON c.id_membre = m.id WHERE c.id_produit=:id_produit ORDER BY date_add DESC LIMIT $base, $commentPerPage") or die(print_r($db->errorInfo()));
$com->execute(array(            
            'id_produit' => $id_produit            
        )); 
while ($data = $com->fetch())
            {
            ?>
             Le <?php echo htmlspecialchars($data['date_add_fr']);?>, <?php echo htmlspecialchars($data['user_name']);?>
            a écrit
        </p>
        <hr class="left">
        <p class="left-text">
            <?php echo htmlspecialchars($data['comment']); ?>
       </p>
            <?php
        }
$com->closeCursor();
?>