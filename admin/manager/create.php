<?php
require '../../manager/bd_class.php';
$headers = "From: esbarakabigega@gmail.com";
$sujet = "Soft-recencement";
$event = $_POST['event'];


if ($event == 'CREATE_USER') {
   $data = [$_POST['username'], $_POST['email'], sha1($_POST['password']), 1];
   $sql = "INSERT INTO t_user(Username,Email,Password, CodeCategorie) VALUES(?,?,?,?)";
  if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Utilisateur enregistré';
   }
   header("Location: ../user.php");
}

if ($event == 'CREATE_PUBLICATION') {
    $filename = $_FILES['image']['name'];
    if (!empty($filename)) {
        move_uploaded_file($_FILES['image']['tmp_name'], '../img/' . $filename);
    }
    $data = [$_POST['titre'],$_POST['detail'], $filename];
    $sql = "INSERT INTO t_publication(Titre, Detail, Photo) VALUES(?,?,?)";
    if ($app->prepare($sql, $data, 1)) {
        $_SESSION['success'] = 'Publication';
    }
    header("Location: ../publication.php");
}

if ($event == 'CREATE_CATEGORIE') {
   $filename = $_FILES['photo']['name'];
   if (!empty($filename)) {
      move_uploaded_file($_FILES['photo']['tmp_name'], '../img/' . $filename);
   }
   $data = [$_POST['categorie'], $filename];
   $sql = "INSERT INTO t_categorie_produit(Categorie,Image) VALUES(?,?)";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Categorie enregistrée';
   }
   header("Location: ../categorie_produit.php");
}


if ($event == 'CREATE_PRODUIT') {
   $filename = $_FILES['photo']['name'];
   if (!empty($filename)) {
      move_uploaded_file($_FILES['photo']['tmp_name'], '../img/' . $filename);
   }
   $data = [$_POST['produit'], $_POST['description'], $_POST['prix'], $_POST['categorie'], $filename];
   $sql = "INSERT INTO t_produit(Produit,Description, Prix, CodeCategorie, Photo) VALUES(?,?,?,?,?)";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Produit enregistré';
   }else{
      $_SESSION['error'] = 'Produit non enregistré';
   }
   header("Location: ../produit.php");
}

if ($event == 'CREATE_APPROV') {
   $data = [$_POST['produit'], $_POST['prix'], $_POST['quantite']];
   $sql = "INSERT INTO t_approvisionnement(CodeProduit,Cout, Quantite) VALUES(?,?,?)";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Produit achete';
   }else{
      $_SESSION['error'] = 'Produit non achete';
   }
   header("Location: ../approv.php");
}
