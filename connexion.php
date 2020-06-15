    <?php
    require 'db.php';
    if (isset($_COOKIE['user']) AND isset($_COOKIE['pass'])){
        $user = htmlspecialchars($_COOKIE['user']);
        $pass = htmlspecialchars($_COOKIE['pass']);
        $req = $db->prepare('SELECT id, pass FROM gbaf20_membres WHERE user = :user');
        $req->execute(array(
        'user' => $user));
        $resultat = $req->fetch();
        $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
            if (!$resultat){
                require 'formulaire-connexion.php';            
            }
        else{
            session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['user'] = $user;
                Header('Location: produits.php');
        }
    }
    else{
        require 'formulaire-connexion.php';
    }
    ?>
