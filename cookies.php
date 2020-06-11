<?php
setcookie("user", $_POST['user'], time() + 365*24*3600, null, null, false, true);
setcookie("pass", $_POST['pass'], time() + 365*24*3600, null, null, false, true);
session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['user'] = $user;
                Header('Location: produits.php');
?>
