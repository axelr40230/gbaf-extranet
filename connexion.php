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
                if (isset($_GET['erreur'])){
                    $message = 'alerte';
   
                    require 'formulaire-connexion.php?erreur='.$message.'';
                }
                else{
                   session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['user'] = $user;
                Header('Location: produits.php'); 
                }                
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
