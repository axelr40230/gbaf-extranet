<?php

if (isset($_SESSION['id']) AND isset($_SESSION['user'])) {
    $user = $_SESSION['user'];    
    header('location:partners.php');
} else {
    $message = 'BIENVENUE sur la page d\'identification de votre Extranet </br>(espace réservé aux adhérents GBAF).';
    echo $message;
}

?>