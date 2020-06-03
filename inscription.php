<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="style.css">
<title>S'inscrire sur GBAF</title>
</head>

<body>
    <?php require 'header2.php';?>
    <div id="mega">
        <div>
        <h1 class="titre shadow">Formulaire à compléter pour valider votre inscription</h1>
        <p>En créant un compte, vous accèderez à une bibliothèque régulièrement mise à jour comprenant les dernières informations en matière de produits bancaires<br />
        Toute l'information du groupe centralisée accessible en quelques clics !</p>
        </div>
        <div class="gros-conteneur">
            <form action="confirmation-inscription.php" method="post">
                <div class="champ-formulaire"><label for="nom"><input type="text" name="nom" id="nom" placeholder="Votre nom"></label></div>
                <div class="champ-formulaire"><label for="prenom"><input type="text" name="prenom" id="prenom" placeholder="Votre prénom"></label></div>
                <div class="champ-formulaire"><label for="user"><input type="text" name="user" id="user" placeholder="Votre nom d'utilisateur"></label></div>
                <div class="champ-formulaire"><label for="pass"><input type="password" name="pass" id="pass" placeholder="Votre mot de passe"></label></div>
                <div class="champ-formulaire"><label for="pass-confirm"><input type="password" name="pass-confirm" id="pass-confirm" placeholder="Répétez votre mot de passe"></label></div>
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
                <p>Conservez bien votre question secrète ainsi que sa réponse pour pouvoir récupérer votre mot de passe au besoin.</p>
                <div class="champ-formulaire"><input type="submit" value="Je m'inscris !" class="bouton rouge"></div>
            </form> 
        </div>
    </div>
    <?php require 'footer.php';?>
</body>
</html>
