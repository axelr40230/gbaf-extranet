<?php
require 'db.php';
session_start();

if (isset($_POST['valider'])){
    if (!empty($_POST['user']) AND !empty($_POST['pass'])){
        $user = htmlspecialchars($_POST['user']);
        $pass = htmlspecialchars($_POST['pass']);
        $passSaisi = password_hash($pass, PASSWORD_DEFAULT);
        $req = $db -> query("SELECT user FROM gbaf20_membres WHERE user = '$user'");
        $count = $req->rowCount();
        if($count == 0){
            $message = 'user non trouvé';
            echo $message;
        }
        else{
            $req = $db->prepare('SELECT id, pass FROM gbaf20_membres WHERE user = :user');
            $req->execute(array(
            'user' => $user));
            $resultat = $req->fetch();
            $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
            if (!$isPasswordCorrect)
            {
                $message = 'erreur de mot de passe';
                echo $message;
            }
            else{
                if (isset($_POST['souvenir'])){
                     require 'cookies.php';
                }
                else{
                    $_SESSION['id'] = $resultat['id'];
                    $_SESSION['user'] = $user;
                    header('location:produits.php');
                }
            }
        }
    }
    else{
        $message = 'Oops ! Vous avez oublié de remplir tous les champs :)';
        echo $message;
    }
}
else{
    $message = 'Merci de bien remplir tous les champs';
    echo $message;
}
?>