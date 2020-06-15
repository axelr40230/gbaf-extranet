<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
<link rel="stylesheet" href="style.css">
<title>Liste des produits GBAF</title>
</head>

<body>
    <?php require 'header3.php';?>
    <div class="mega">
        <div  class="gros-conteneur">
            <h1 class="titre texte-rouge shadow">GBAF extranet regroupement d'informations sur les différents produits financiers</h1>
            <hr>            
        </div>
        <div class="gros-conteneur">
            <div class="bloc">
                <p class="texte-rouge"><?php require 'etat-connexion.php';?></p>
                <p>Le GBAF est le représentant de la profession bancaire  et des assureurs  sur tous  les axes de la réglementation financière française. <br /><br />
Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.</p>
                <p><img src="images/banque.jpg" width="800px" alt="Banque numérique" class="illustration"></p>
            </div>
            <div class="bloc">
            <?php require 'contenus-produit.php'?>
            </div>
        </div>
    </div>
    <?php require 'footer.php';?>
</body>
</html>