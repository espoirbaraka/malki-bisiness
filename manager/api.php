<?php
session_start();
require 'bd_class.php';
$event = $_POST['event'];

// ALL CREATE REQUEST

if ($event == 'CREATE_CLIENT') {
   $data = [$_POST['email'], $_POST['username'], $_POST['tel'], sha1($_POST['password']), 2];
   $sql = "INSERT INTO t_user(Email, Username, Contact, Password, CodeCategorie) VALUES(?,?,?,?,?)";
   
      if ($app->prepare($sql, $data, 1)) {
         $_SESSION['success'] = 'Votre compte est crée';
      } else {
         $_SESSION['error'] = 'Error';
      }
   header("Location: ../register.php");
}

// ALL UPDATE REQUEST

if ($event == 'UPDATE_ENTREPRISE') {
   $data = [$_POST['designation'], $_POST['contact'], $_POST['email'], $_POST['site'], $_POST['adresse'], $_POST['id']];
   $sql = "UPDATE t_entreprise SET DesignationEntreprise=?, ContactEntreprise=?, EmailEntreprise=?, SiteWebEntreprise=?, AdresseEntreprise=? WHERE CodeEntreprise=?";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Entreprise modifiée';
   } else {
      $_SESSION['error'] = 'Entreprise non modifiée';
   }
   header("Location: ../entreprise.php");
}

// ALL DELETE REQUEST

if ($event == 'DELETE_ENTREPRISE') {
   $data = [$_POST['id']];
   $sql = "DELETE FROM t_entreprise WHERE CodeEntreprise=?";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Entreprise supprimée';
   }
   header("Location: ../entreprise.php");
}




