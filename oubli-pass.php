<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>Récupération du mot de passe</title>
</head>

<body>
    <?php require 'header2.php';?>
    <div class="mega">
        <div>
            <h1 class="titre">Récupération du mot de passe</h1>
            <p>Répondez à la question secrète et récupérez votre mot de passe<br />
            Accédez de nouveau à votre application dédiée aux produits financiers du groupe GBAF</p>
        </div>
        <div class="gros-conteneur colonne">
            <form action="produits.php" method="post">
                <div class="champ-formulaire"><label for="user"><input type="text" name="user" id="user" placeholder="Votre nom d'utilisateur"></label></div>
                                <div class="champ-formulaire">
                    <label for="question"></label>
                        <select name="question" id="question">
                            <option value="">Sélectionnez votre question secrète</option>
                            <option value="animal">Quel est le nom de votre premier animal de compagnie ?</option>
                            <option value="prenom">Comment s'appelle votre mère ?</option>
                            <option value="naissance">Où êtes-vous né.e ?</option>
                            <option value="couleur">Quelle est votre couleur préférée ?</option>
                        </select>
                </div>
                
                <div class="champ-formulaire">
                <label for="reponse"><input type="text" name="reponse" id="reponse" placeholder="Votre réponse"></label>
                </div>
                <div class="champ-formulaire"><input type="submit" value="valider"></div>
                </div>
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