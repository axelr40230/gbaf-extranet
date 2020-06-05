<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
<link rel="stylesheet" href="style.css">
<title>Mon profil</title>
</head>

<body>
    <?php require 'header3.php';?>
    <div class="mega">
        <div>
            <h1 class="titre-profil"><img src="images/user.svg" width="50" height="50" alt="Télécharger le logo" style="vertical-align:middle;"><span style="margin-left: 20px;">Nom prénom</span></h1>
        </div>
        <div>
            <p>Vous pouvez ici modifier les informations vous concernant ainsi que votre mot de passe et votre question secrète en cas de besoin</p>
            <h2 class="titre-profil2 shadow">Mettre à jour vos informations</h2>
            <div class="gros-conteneur">
            <form action="confirmation-inscription.php" method="post">
                <div class="champ-formulaire"><label for="nom"><input type="text" name="nom" id="nom" placeholder="Votre nom"></label></div>
                <div class="champ-formulaire"><label for="prenom"><input type="text" name="prenom" id="prenom" placeholder="Votre prénom"></label></div>
                <div class="champ-formulaire"><label for="user"><input type="text" name="user" id="user" placeholder="Votre nom d'utilisateur"></label></div>
                <label for="mobile">Modifier le mot de passe ?</label>
                <input type="checkbox" id="mobile" role="button">
                <ul>
                <div class="champ-formulaire"><label for="passold"><input type="password" name="passold" id="passold" placeholder="Votre ancien mot de passe"></label></div>
                <div class="champ-formulaire"><label for="pass"><input type="password" name="pass" id="pass" placeholder="Votre nouveau mot de passe"></label></div>
                <div class="champ-formulaire"><label for="pass-confirm"><input type="password" name="pass-confirm" id="pass-confirm" placeholder="Répétez votre mot de passe"></label></div></ul>
              <div class="champ-formulaire">
                    <label for="question"></label>
                        <select name="question" id="question" class="question">
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
                <p class="contenu">Conservez bien votre question secrète ainsi que sa réponse pour pouvoir récupérer votre mot de passe au besoin.</p>
                <div class="champ-formulaire"><input type="submit" value="Valider" class="bouton rouge"></div>
            </form> 
        </div>
            
        </div>
    </div>
    <?php require 'footer.php';?>
</body>
</html>