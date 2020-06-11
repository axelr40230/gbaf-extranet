<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
<link rel="stylesheet" href="style.css">
<title>Connexion</title>
</head>

<body>
   <?php require 'header2.php';?>
    <div class="mega">
        <div>
            <h1 class="titre shadow">Connectez-vous à votre espace personnalisé</h1>
            <p>Accédez en quelques clics aux dernières actualités du groupe<br />
            Découvrez de nouveaux produits à proposer à vos clients</p>
        </div>
        <div class="gros-conteneur colonne">
            <form action="traitement-connexion.php" method="post">
                <div class="champ-formulaire">
                <div class="champ-formulaire"><label for="user"><input type="text" name="user" id="user" placeholder="Votre nom d'utilisateur"></label></div>
                <div class="champ-formulaire"><label for="pass"><input type="password" name="pass" id="pass" placeholder="Votre mot de passe"></label><br/><br/></div>
                <div class="champ-formulaire"><label for="souvenir">Se souvenir de moi<br/><br/><input type="checkbox" name="souvenir"><br/><br/><br/></label></div>
                <div class="champ-formulaire"><input type="submit" value="Valider"></div>
                </div>
                <p><a href="oubli-pass.php">Mot de passe oublié ?</a></p>
            </form>
            
        <div class="gros-conteneur colonne">
            
            <p>Première visite ? Inscrivez-vous</p>
            <p><a href="inscription.php" class="bouton bleu">Je m'inscris !</a></p>
        </div>
        </div>
    </div>
    <?php require 'footer.php';?>
</body>
</html>