<?php
if (isset($_POST['valider'])) {
    if (!empty($_POST['user'])) {
        //récupération du nom utilisateur et de sa question pour controle en étape suivante
        $user = htmlspecialchars($_POST['user']);
        $req  = $db->prepare('SELECT id, question FROM gbaf20_membres WHERE user = :user');
        $req->execute(array(
            'user' => $user
        ));
        
        $count     = $req->rowCount();
            //dans le cas où aucun utilisateur est trouvé
            if ($count == 0) {
                $message = "Il y a une erreur dans le nom d'utilisateur";                
                
            }
        else
        {
            $resultat = $req->fetch();
        $id_user  = $resultat['id'];
        $question = $resultat['question'];
        header('location:../password-question.php?question=' . $id_user);
            }
    } else {
        $message = "Vous avez oublié de renseigner votre nom d'utilisateur";
        
    }
} else {
    $message = "Merci de renseigner votre nom d'utilisateur";
    
}
?>