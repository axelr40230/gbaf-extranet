<?php
    require 'db.php'; // connexion à la base de données

if (isset($_POST['valider'])){
    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['user']) AND !empty($_POST['pass']) AND !empty($_POST['pass-confirm']) AND !empty($_POST['question']) AND !empty($_POST['reponse'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $user = htmlspecialchars($_POST['user']);
        $question = htmlspecialchars($_POST['question']);
        $reponse = htmlspecialchars($_POST['reponse']);
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass-confirm'];
        if($pass==$pass_confirm){
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $req = $db -> query("SELECT user FROM gbaf20_membres WHERE user = '$user'");
                $count = $req->rowCount();
                if($count == 0){
                    $req = $db->prepare("INSERT INTO gbaf20_membres(nom, prenom, user, pass, question, reponse) VALUES(:nom, :prenom, :user, :pass, :question, :reponse)") or die('error '.var_dump($req->errorInfo()));;
                        $req->execute(array(
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'user' => $user,
                        'pass' => $pass,
                        'question' => $question,
                        'reponse' => $reponse
                        ))or die('error '.var_dump($req->errorInfo()));;
                        header('Location: confirmation-inscription.php');
                }
            else{
                echo 'Ce nom d\'utilisateur est déjà pris';
            }
        }
        else{
            echo 'Les mots de passe ne sont pas identiques';
        }

    }else{
        echo 'Tous les champs ne sont pas complétés';
    }
}
?>