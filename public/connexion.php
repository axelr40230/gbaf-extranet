<?php 
require '../src/php/db.php';
session_start();
require '../src/php/connection-state.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
<link rel="stylesheet" href="css/style.css">
<title>Connexion à l'Extranet GBAF</title>
</head>

<body>
    <?php require '../src/headers/header-inscription-connexion.php';?>
    <div class="mega">
        <div>
            <h1 class="title shadow">Connectez-vous à votre espace personnalisé</h1>
            <p>Accédez en quelques clics aux dernières actualités du groupe<br />
            Découvrez de nouveaux produits à proposer à vos clients</p>
        </div>
        <div class="big-container column">
            <form action="" method="post">
                <div class="field-form">                
                <p class="red-text"><?php require '../src/php/processing-connection.php';?></p>
                <div class="field-form"><label for="user"><input type="text" name="user" id="user" placeholder="Votre nom d'utilisateur"></label></div>
                <div class="field-form"><label for="pass"><input type="password" name="pass" id="pass" placeholder="Votre mot de passe"></label><br/><br/></div>
                <div class="field-form"><label for="souvenir">Se souvenir de moi<br/><br/><input type="checkbox" name="souvenir"><br/><br/><br/></label></div>
                <div class="field-form"><input type="submit" value="valider" name="valider"></div>
                </div>
                
                <p><a href="forgot-password.php">Mot de passe oublié ?</a></p>
            </form>
            
        <div class="big-container column">
            
            <p>Première visite ? Inscrivez-vous</p>
            <p><a href="inscription.php" class="button blue">Je m'inscris !</a></p>
        </div>
        </div>
    </div>
    <?php require '../src/php/footer.php';?>
</body>
</html>