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
<title><?php require '../src/php/product_name.php';?></title>
</head>

<body>    
    <?php require '../src/headers/header-nav.php';?>
    <div>
        <div class="mega">
            <?php require '../src/php/product-content.php';?>
            <?php require '../src/php/product-comment.php';?>
            <?php require '../src/php/form-comment.php';?>    
        </div>
    </div>
    <?php require '../src/php/footer.php';?>
</body>
</html>