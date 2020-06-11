<?php
    require 'db.php'; // connexion à la base de données
session_start();

if (isset($_POST['user']) AND isset($_POST['pass'])){
    $user = htmlspecialchars($_POST['user']);
    $pass = htmlspecialchars($_POST['pass']);
    //  Récupération de l'utilisateur et de son pass hashé
    $req = $db->prepare('SELECT id, pass FROM gbaf20_membres WHERE user = :user');
    $req->execute(array(
        'user' => $user));
    $resultat = $req->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) {
                if (isset($_POST['souvenir'])){
                    require 'cookies.php';
                    
                }
                else{
                    
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['user'] = $user;
                Header('Location: produits.php');
                }
            }
            else {
                require 'erreur-connexion.php';
            }
        }
}
else{
    require 'erreur-connexion.php';
}
?>