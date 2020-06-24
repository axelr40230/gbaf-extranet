<?php
    // Connexion à la base de donnée
     
        try
        {
            $host = 'localhost';
            $database = 'referencfqbdd19';
            $identifiant = 'root';
            $password = '';
            $dsn = 'mysql:host='.$host.';dbname='.$database.';charset=utf8';
            $db = new PDO($dsn, $identifiant, $password);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch(PDOException $e){
            echo 'La base de donnée n\'est pas disponible pour le moment. <br />';
            echo $e->getMessage().'<br />';
            echo 'Ligne : '.$e->getLine();
        }
 
    // Fin de la connexion à la base de donnée
?>