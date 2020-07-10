<?php
if (isset($_GET['id'])) {
    $id_user = (int) $_GET['id'];
    if (isset($_POST['valider'])) {
        if (!empty($_POST['pass']) AND !empty($_POST['pass-confirm'])) {
            $pass         = $_POST['pass'];
            $pass_confirm = $_POST['pass-confirm'];
            if ($pass == $pass_confirm) {
                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                $req  = $db->prepare("UPDATE gbaf20_membres SET pass = '$pass' WHERE id = :id_user");
                $req->execute(array(
                    'id_user' => $id_user
                ));
                header('location:../../public/connexion.php');
            } else {
                echo 'Les mots de passe ne sont pas identiques';
            }
        } else {
            echo 'Vous n\'avez pas entré de nouveau mot de passe !';
        }
    } else {
        $message = ' ';
        echo $message;
    }
} else {
    header('location:../../public/forgot-password.php');
}
?>