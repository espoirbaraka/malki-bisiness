<?php
	session_start();
	// session_destroy();
    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
    }else{
        unset($_SESSION['client']);
    }

	header('location: ../login.php');
?>