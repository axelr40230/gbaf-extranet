<?php
if(isset($_GET['id']) AND isset($_GET['user-click-vote'])){
    $id_produit = (int)$_GET['id'];
    $id_user = $_SESSION['id'];
    $user_click_vote = (int)$_GET['user-click-vote'];
    
    $user_vote = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND id_user = :id_user");
    $user_vote->execute(array(
    'id_produit'=>$id_produit,
    'id_user'=>$id_user
    ));
    $number_user_vote = $user_vote->rowCount();
    if ($number_user_vote <> 0){
        $delete_user_vote = $db->prepare('DELETE FROM gbaf20_vote WHERE id_user = :id_user');
        $delete_user_vote->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $delete_user_vote->execute();
        $class_like = 'like';
        $class_dislike = 'like';
        $like = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 1");
        $like->execute(array(
        'id_produit'=>$id_produit,
        ));
        $number_like = $like->rowCount();
        
        $dislike = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 0");
        $dislike->execute(array(
        'id_produit'=>$id_produit,
        ));
        $number_dislike = $dislike->rowCount();
        
    }else{
        $enter_user_vote = $db->prepare("INSERT INTO gbaf20_vote (id_user, id_produit, vote) VALUES (:id_user, :id_produit, :vote)");
        $enter_user_vote->execute(array(
        'id_user'=>$id_user,
        'id_produit'=>$id_produit,
        'vote'=>$user_click_vote
        ));
        
        if($user_click_vote==0){
            $class_like = 'like';
            $class_dislike = 'dislike';
            $like = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 1");
            $like->execute(array(
            'id_produit'=>$id_produit,
            ));
            $number_like = $like->rowCount();

            $dislike = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 0");
            $dislike->execute(array(
            'id_produit'=>$id_produit,
            ));
            $number_dislike = $dislike->rowCount();
            
            
            
        }else{
            $class_like = 'user-like';
            $class_dislike = 'like';
            $like = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 1");
            $like->execute(array(
            'id_produit'=>$id_produit,
            ));
            $number_like = $like->rowCount();

            $dislike = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 0");
            $dislike->execute(array(
            'id_produit'=>$id_produit,
            ));
            $number_dislike = $dislike->rowCount();
           
        }
    }
}elseif(isset($_GET['id'])){
    $id_produit = (int)$_GET['id'];
    $id_user = $_SESSION['id'];
    
    $like = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 1");
    $like->execute(array(
    'id_produit'=>$id_produit,
    ));
    $number_like = $like->rowCount();
    
    $dislike = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND vote = 0");
    $dislike->execute(array(
    'id_produit'=>$id_produit,
    ));
    $number_dislike = $dislike->rowCount();
    
    $user_vote = $db->prepare("SELECT * FROM gbaf20_vote WHERE id_produit = :id_produit AND id_user = :id_user");
    $user_vote->execute(array(
    'id_produit'=>$id_produit,
        'id_user'=>$id_user
    ));
    $number_user_vote = $user_vote->rowCount();
    if ($number_user_vote == 0){
        $class_like = 'like';
        $class_dislike = 'like';
    }
    else{
        $donnees = $user_vote->fetch();
        if($donnees['vote'] == 0){
            $class_like = 'like';
            $class_dislike = 'dislike';
        }
        elseif($donnees['vote'] == 1){
            $class_like = 'user-like';
            $class_dislike = 'like';
        }
    }
}else{
    header('location:partners.php');
}
?>
<div class="big-container">      
    <div class="block">
        <p class="red-text"><?php echo $number_like ?> <i class="fas fa-thumbs-up"></i><a href="information.php?id=<?=$id_produit?>&page=1&user-click-vote=1#vote-section" class="<?php echo $class_like ?>"><i class="fas fa-thumbs-up"></i> J'aime</a></p>
    </div>
    <div class="block">
        <p class="red-text"><?php echo $number_dislike ?> <i class="fas fa-thumbs-down"></i><a href="information.php?id=<?=$id_produit?>&page=1&user-click-vote=0#vote-section" class="<?php echo $class_dislike ?>"><i class="fas fa-thumbs-down"></i> Je n'aime pas</a></p>
    </div>
</div>