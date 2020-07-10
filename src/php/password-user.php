<?php
if (isset($_POST['valider'])) {
    if (!empty($_POST['user'])) {
        $user = htmlspecialchars($_POST['user']);
        $req  = $db->prepare('SELECT id, question FROM gbaf20_membres WHERE user = :user');
        $req->execute(array(
            'user' => $user
        ));
        $resultat = $req->fetch();
        $id_user  = $resultat['id'];
        $question = $resultat['question'];
        header('location:../src/php/password-question.php?question=' . $id_user);
    } else {
        $message = 'Vous avez oublié de renseigner votre nom d\'utilisateur';
        echo $message;
    }
} else {
    $message = 'Merci de renseigner votre nom d\'utilisateur';
    echo $message;
}
?>