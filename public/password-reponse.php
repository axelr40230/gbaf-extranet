<?php
//affichage de la question
if (isset($_GET['question'])) {
    $id_user = (int) $_GET['question'];
    $req     = $db->prepare('SELECT * FROM gbaf20_membres WHERE id = :id_user');
    $req->execute(array(
        'id_user' => $id_user
    ));
    $resultat = $req->fetch();
    $id_user  = $resultat['id'];
    $question = $resultat['question'];
    if (isset($_POST['valider'])) {
        if (!empty($_POST['reponse'])) {
            $user_reponse = htmlspecialchars($_POST['reponse']);
            $valid         = $db->prepare('SELECT * FROM gbaf20_membres WHERE id = :id_user');
            $valid->execute(array(
                'id_user' => $id_user
            ));
            $resultat2     = $valid->fetch();           
            $id_user_check = $resultat2['id'];
            $reponse       = $resultat2['reponse'];
            
            if ($user_reponse == $reponse) {
                header('location:password-reset.php?id=' . $id_user_check);
            } else {
                $message = 'Mauvaise réponse';
            }
        } else {
            $message = 'Il manque votre réponse';
        }
    } else {
        $message = '';
    }
    
} else {
    header('location:../../public/forgot-password.php');
}
?>