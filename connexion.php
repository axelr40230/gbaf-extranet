<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>Connexion</title>
</head>

<body>
   <?php require 'header2.php';?>
    <div class="mega">
        <div>
            <h1 class="titre">Connectez-vous à votre espace personnalisé</h1>
            <p>Accédez en quelques clics aux dernières actualités du groupe<br />
            Découvrez de nouveaux produits à proposer à vos clients</p>
        </div>
        <div class="gros-conteneur colonne">
            <form action="produits.php" method="post">
                <div class="champ-formulaire">
                <div class="champ-formulaire"><label for="user"><input type="text" name="user" id="user" placeholder="Votre nom d'utilisateur"></label></div>
                <div class="champ-formulaire"><label for="pass"><input type="password" name="pass" id="pass" placeholder="Votre mot de passe"></label></div>
                <div class="champ-formulaire"><label for="souvenir">Se souvenir de moi<input type="checkbox" name="souvenir"></label></div>
                <div class="champ-formulaire"><input type="submit" value="Se connecter"></div>
                </div>
            </form>
            
        <div class="gros-conteneur colonne">
            
            <p>Première visite ? Inscrivez-vous</p>
            <p><a href="inscription.php" class="bouton bleu">S'inscrire</a></p>
        </div>
        </div>
    </div>
    <?php require 'footer.php';?>
</body>
</html>