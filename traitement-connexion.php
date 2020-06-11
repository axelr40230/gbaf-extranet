<?php
require 'db.php'; // connexion à la base de données
session_start();

if (isset($_POST['user']) AND isset($_POST['pass'])){
    $user = htmlspecialchars($_POST['user']);
    $pass = htmlspecialchars($_POST['pass']);
    $req = $db -> query("SELECT user FROM gbaf20_membres WHERE user = '$user'");
            $count = $req->rowCount();
            if($count == 0){
                header('Location: erreur-connexion.php');
            }
            else{
            //  Récupération de l'utilisateur et de son pass hashé
            $req = $db->prepare('SELECT id, user, pass FROM gbaf20_membres WHERE user = :user');
            $req->execute(array(
            'user' => $user));
            $resultat = $req->fetch();

            // Comparaison du pass envoyé via le formulaire avec la base
            $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
                if (!$resultat){
                    header('Location: erreur-connexion.php');
                }
                else{
                    if ($isPasswordCorrect){
                        if (isset($_POST['souvenir'])){
                            require 'cookies.php';
                        }
                        else{
                            $_SESSION['id'] = $resultat['id'];
                            $_SESSION['user'] = $user;
                            Header('Location: produits.php');
                        }
                    }
                    else{
                        header('Location: erreur-connexion.php');
                    }
                }
    }
}
else{
    header('Location: erreur-connexion.php');
}
?>