<?php
//vérifie si l'utilisateur est connecté
if (isset($_SESSION['id']) AND isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    //si oui, envoie directement à la page des partenaires
    
    
} else {
    //si non, reste sur la page index et affiche ce message
    header('location:index.php');
    $info = 'BIENVENUE sur la page d\'identification de votre Extranet </br>(espace réservé aux adhérents GBAF).';
    }

?>