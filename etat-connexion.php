<?php
require 'db.php';
session_start();
    
    if (isset($_SESSION['id']) AND isset($_SESSION['user'])){
        $user=$_SESSION['user'];
        
        $message = 'Bienvenue dans votre espace dédié '.$user.'';
        echo $message;
    }
else{
    header('location:connexion.php');
}
?>