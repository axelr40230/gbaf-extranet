<?php 
require '../src/php/db.php';
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
<link rel="stylesheet" href="css/style.css">
<title>Mise à jour du profil</title>
</head>

<body>
    
    <body  id="homebody">
    
    <?php require 'src/headers/header-index.php';?>
    
    <div class="mega">
        <div>
            <h1 class="titre texte-blanc"><?php require '../src/php/index-state.php';?></p></h1>
            <hr>            
        </div>
        
        <div class="gros-conteneur">
            
            <div class="bloc">
                
                <p class="contenu texte-blanc">Connectez vous à votre espace</p>
                <p class="contenu texte-blanc"><a href="../connexion.php" class="bouton blanc large">Connexion</a></p>
            </div>
            
            <div class="bloc">
                <p class="contenu texte-blanc">Première visite ? Inscrivez-vous</p>
                <p class="contenu texte-blanc"><a href="../inscription.php" class="bouton blanc large">Inscription</a></p>
            </div>
            
        </div> 
        
        <?php require '../src/php/footer.php';?>
    </div>
    
</body>
</html>