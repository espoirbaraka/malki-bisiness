<?php
	include 'sessionoutconnected.php';
	$conn = $app->getPDO();

	if(isset($_POST['submit'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
		$password = sha1($_POST['password']);
		    $data = [$username, $email, $password, 2];
            $sql = "INSERT INTO t_user(Username,Email,Password, CodeCategorie) VALUES(?,?,?,?)";
            if ($app->prepare($sql, $data, 1)) {
                $_SESSION['success'] = 'Compte enregistré';
            }
            header("Location: ../user.php");
                }
                else{
                    $_SESSION['error'] = 'Entrez vos identifiants de connexion d\'abord';
                }
                header('location: ../login.php');

?>
