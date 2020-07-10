<?php
if (isset($_SESSION['id'])) {
    $id_user = (int) $_SESSION['id'];
    $req     = $db->prepare("SELECT * FROM gbaf20_membres WHERE id = :id_user");
    $req->execute(array(
        'id_user' => $id_user
    ));
    $donnees = $req->fetch();
    $nom     = htmlspecialchars($donnees['nom']);
    $prenom  = htmlspecialchars($donnees['prenom']);
    echo $nom . ' ' . $prenom;
    
} else {
    header('location:index.php');
}
?>