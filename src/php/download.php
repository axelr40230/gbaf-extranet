<?php
require 'db.php';

if (isset($_GET['id'])){
    $id = (int) $_GET['id'];
    $req = $db->query ("SELECT * FROM gbaf20_produits WHERE id = '$id'");
    $donnees = $req->fetch();
    $file = $donnees['logo'];
    if ($file !=""){
        $file_name =  basename($file);
        if (file_exists("images/".$file_name)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
            else{
                echo "Le fichier $file_name n'existe pas et $file.";
            }
    }
        else{
            echo "Le fichier $file_name n'existe pas.";
        }
}else{
    header('Location:partners.php');
}



?>
