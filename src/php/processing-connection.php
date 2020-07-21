<?php
try {
    //validation de l'envoi du formualire
    if (isset($_POST['valider'])) {
        if (!empty($_POST['user']) AND !empty($_POST['pass'])) {
            $user      = htmlspecialchars($_POST['user']);
            $pass      = htmlspecialchars($_POST['pass']); 
            //vérification de la présence du nom utilisateur
            $req_count       = $db->prepare('SELECT * FROM gbaf20_membres WHERE user = :user');
            $req_count->execute(array(
                            'user' => $user
                        ));
            $count     = $req_count->rowCount();
            //dans le cas où aucun utilisateur est trouvé
            if ($count == 0) {
                $message = 'user non trouvé';                
                $req_count->closeCursor();
            } else {
                //si utilisateur existe, on vérifie le mot de passe
                $req = $db->prepare('SELECT id, pass FROM gbaf20_membres WHERE user = :user');
                $req->execute(array(
                    'user' => $user
                ));
                $resultat          = $req->fetch();                
                $hash              = $resultat['pass'];                
                $isPasswordCorrect = password_verify($pass, $hash);                
                if (!$isPasswordCorrect) {
                    $message = 'erreur de mot de passe';                    
                } else {
                    //demande de génération de cookies ?
                    if (isset($_POST['souvenir'])) {
                        require 'cookies.php';
                        $req->closeCursor();
                        header('location:partners.php');
                    } else {
                        $_SESSION['id']   = $resultat['id'];
                        $_SESSION['user'] = $user;
                        $req->closeCursor();
                        header('location:partners.php');                       
                    }
                }
            }
        } else {
            $message = 'Oops ! Vous avez oublié de remplir tous les champs :)';            
        }
    } else {
        //si pas encore appuyé sur valider : 
        $message = 'Merci de bien remplir tous les champs';        
    }
}catch (PDOException $e) {
    echo 'erreur. <br />';
    echo $e->getMessage() . '<br />';
    echo 'Ligne : ' . $e->getLine();
}
?>