<?php
session_start();
require '../../manager/bd_class.php';
$event=$_POST['event'];


 if($event=='ANNULER_COMMANDE'){
    $data=[$_POST['id']];
    $sql="DELETE FROM t_paiement WHERE CodePaiement=?";
    if($app->prepare($sql,$data,1)){
     $_SESSION['success'] = 'Commande annulee';
    }
    header("Location: ../paiement.php");
 }

if($event=='DELETE_PUBLICATION'){
    $data=[$_POST['id']];
    $sql="DELETE FROM t_publication WHERE CodePub=?";
    if($app->prepare($sql,$data,1)){
        $_SESSION['success'] = 'Publication supprimée';
    }
    header("Location: ../publication.php");
}

 
?>