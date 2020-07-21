<?php
//gestion de la mise à jour des données utilisateur
if (isset($_SESSION['id'])) {
    echo 'Modifiez les informations que vous souhaitez mettre à jour';
    $message = '';
    $id_user = (int) $_SESSION['id'];
    //requette pour afficher les informations de l'utilisateur dans le formulaire
    $req     = $db->prepare("SELECT * FROM gbaf20_membres WHERE id = :id_user");
    $req->execute(array(
        'id_user' => $id_user
    ));
    $resultat = $req->fetch();
    $id_user  = $resultat['id'];
    $nom      = $resultat['nom'];
    $prenom   = $resultat['prenom'];
    $username = $resultat['user'];
    $pass     = $resultat['pass'];
    $question = $resultat['question'];
    $reponse  = $resultat['reponse'];
    //si envoi de nouvelles données en validant le formulaire
    if (isset($_POST['valider'])) {
        $new_name      = $_POST['nom'];
        $new_firstname = $_POST['prenom'];
        $new_username  = $_POST['user'];
        $new_question  = $_POST['question'];
        $new_reponse   = $_POST['reponse'];
        //requete insertion dans la BDD des nouvelles infos
        $update_name   = $db->prepare("UPDATE gbaf20_membres SET nom = :new_name, prenom = :new_firstname, user = :new_username, question = :new_question, reponse = :new_reponse WHERE id = :id_user");
        $update_name->execute(array(
            'new_name' => $new_name,
            'new_firstname' => $new_firstname,
            'new_username' => $new_username,
            'new_question' => $new_question,
            'new_reponse' => $new_reponse,
            'id_user' => $id_user
        ));
        $question = $new_question;
        $reponse  = $new_reponse;
        $message  = 'Votre profil a bien été mis à jour';
        
        
        
    } else {
        $new_message = '';
    }
    
} else {
    header('location:connexion.php');
}
?>