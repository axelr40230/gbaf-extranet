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
<title>Accès Extranet GBAF</title>
</head>

<body>
    
    <body  id="homebody">
    
    <?php require '../src/headers/header-index.php';?>
    
    <div class="mega">
        <div>
            <h1 class="title white-text"><?php require '../src/php/index-state.php';?></p></h1>
            <hr>            
        </div>
        
        <div class="big-container">
            
            <div class="block">
                
                <p class="content white-text">Connectez vous à votre espace</p>
                <p class="content white-text"><a href="connexion.php" class="button white large">Connexion</a></p>
            </div>
            
            <div class="block">
                <p class="content white-text">Première visite ? Inscrivez-vous</p>
                <p class="content white-text"><a href="inscription.php" class="button white large">Inscription</a></p>
            </div>
            
        </div> 
        
        <?php require '../src/php/footer.php';?>
    </div>
    
</body>
</html>