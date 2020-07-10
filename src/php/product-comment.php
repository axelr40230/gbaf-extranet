<div class="blue-box" id="section-comments">
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
?>
   <h2 class="title product-detail"><i class="fab fa-readme fa-5x"></i></br><?php
require '../src/php/number-comment.php';
?></h2>
    <?php
$req = $db->query("SELECT m.user user_name, c.comment comment, DATE_FORMAT(c.date_add, '%d/%m/%Y') AS date_add_fr FROM gbaf20_membres m INNER JOIN gbaf20_comments c ON c.id_membre = m.id WHERE c.id_produit=$id_produit ORDER BY date_add DESC LIMIT $base, $commentPerPage") or die(print_r($db->errorInfo()));
while ($donnees = $req->fetch()) {
?>
   <div class="white-box">
        <p class="left-text">
            <i class="fas fa-comment"></i>
             Le 
            <?php
    echo htmlspecialchars($donnees['date_add_fr']);
?>
           , 
            <?php
    echo htmlspecialchars($donnees['user_name']);
?>
            a écrit
        </p>
        <hr class="left">
        <p class="left-text">
            <?php
    echo htmlspecialchars($donnees['comment']);
?>
       </p>
    </div>
    <?php
}
?>
   <div class="center">
        <ul class="pagination">
            <?php
for ($i = 1; $i <= $pagesTotales; $i++) {
    if ($i == $pageCourante) {
?>
           <?php
        echo '<li><a class="content paging" href="#section-comment">' . $i . '</a> </li>';
?><?php
    } else {
?><?php
        echo '<li><a class="content paging" href="information.php?id=' . $id . '&page=' . $i . '#section-comments">' . $i . '</a> </li>';
?><?php
    }
}
?></ul></div>
        </div>