<?php 
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('user', '');
setcookie('pass', '');

header('Location: ../../public/connexion.php');
?>