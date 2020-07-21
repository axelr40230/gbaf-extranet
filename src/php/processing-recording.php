<?php
try {
    if (isset($_POST['valider'])) {
        if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['user']) AND !empty($_POST['pass']) AND !empty($_POST['pass-confirm']) AND !empty($_POST['question']) AND !empty($_POST['reponse'])) {
            //validation des données envoyées par l'utilisateur
            $nom          = htmlspecialchars($_POST['nom']);
            $prenom       = htmlspecialchars($_POST['prenom']);
            $user         = htmlspecialchars($_POST['user']);
            $question     = htmlspecialchars($_POST['question']);
            $reponse      = htmlspecialchars($_POST['reponse']);
            $pass         = htmlspecialchars($_POST['pass']);
            $pass_confirm = htmlspecialchars($_POST['pass-confirm']);
            //vérification mots de passe identiques
            if ($pass == $pass_confirm) {
                //hashage du mot de passe
                $options = [
                'cost' => 10,
                ];
                $pass_hash  = password_hash($pass, PASSWORD_DEFAULT, $options);
                $req   = $db->prepare("SELECT * FROM gbaf20_membres WHERE user = :user");
                $req->execute(array(
                        'user' => $user
                    ));
                //vérification user libre
                $count = $req->rowCount();                
                if ($count == 0) {
                    $req->closeCursor();
                    //preparation requete insertion dans la BDD
                    $registrer = $db->prepare("INSERT INTO gbaf20_membres(nom, prenom, user, pass, question, reponse) VALUES(:nom, :prenom, :user, :pass, :question, :reponse)");
                    $registrer->execute(array(
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'user' => $user,
                        'pass' => $pass_hash,
                        'question' => $question,
                        'reponse' => $reponse
                    ));
                    $registrer->closeCursor();
                    header('Location: confirmation-inscription.php');                    
                } else {
                    $message = 'Ce nom d\'utilisateur est déjà pris';
                    
                }
            } else {
                $message = 'Les mots de passe ne sont pas identiques';
                                
            }

        } else {
            $message = 'Tous les champs ne sont pas complétés';
                       
        }
    }
}catch (PDOException $e) {
    echo 'erreur. <br />';
    echo $e->getMessage() . '<br />';
    echo 'Ligne : ' . $e->getLine();
}
?>