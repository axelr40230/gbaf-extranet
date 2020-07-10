<?php

if (isset($_SESSION['id']) AND isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    header('Location:partners.php?info=connected');
}

?>