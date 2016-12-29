<?php
	/* Error hadnling */
	error_reporting(E_ALL);
 	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
 	error_reporting(-1);

 	if(isset($_SESSION['user'])) header('Location: index.php');

 	$user = new User;

 	if(isset($_POST['register'])){
 		$user->register($_POST);
 	}

 	if(isset($_POST['login'])){
 		$user->login($_POST);
 	}

?>	