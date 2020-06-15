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
                <h2>Formation&amp;Co</h2>
                <div><img src="images/formation_co.png" alt="Banque numérique" class="illustration"></div>
                <div><p class="produit">Formation&amp;co est une association française présente sur tout le territoire.<br /><br />
Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.</p></div>
            </div>
            <div class="bloc">
                <p class="produit"><a href="detail-produit.php" class="bouton"><img src="images/book.svg" width="20" height="20" alt="Lire la suite" style="vertical-align:middle;"><span style="margin-left: 20px;">Lire la suite</span></a></p>
            </div>
            <div class="bloc">
                <p class="produit"><a href="detail-produit.php" class="bouton bleu"><img src="images/download.svg" width="20" height="20" alt="Télécharger le logo" style="vertical-align:middle;"><span style="margin-left: 20px;">Télécharger le logo</span></a></p>
            </div>
        </div>
    </div>
    <?php require 'footer.php';?>
</body>
</html>