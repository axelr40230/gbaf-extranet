<?php
    
    if (isset($_SESSION['id']) AND isset($_SESSION['user'])){
        $user=$_SESSION['user'];
        
        header('location:partners.php');
    }
else{
    $message = 'BIENVENUE SUR L\'APPLICATION DÉDIÉE À LA PRÉSENTATION DES PRODUITS FINANCIERS DU GROUPE';
    echo $message;
}

?>