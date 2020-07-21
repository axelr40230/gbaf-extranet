<?php
//récupération des informations utilisateurs pour le menu et le rappel du non dans la page partners
if (isset($_SESSION['id'])) {
    $id_user = (int) $_SESSION['id'];
    $req     = $db->prepare("SELECT * FROM gbaf20_membres WHERE id = :id_user");
    $req->execute(array(
        'id_user' => $id_user
    ));
    $donnees = $req->fetch();
    $nom     = $donnees['nom'];
    $prenom  = $donnees['prenom'];
    $identity =  $nom . ' ' . $prenom;    
}
?>