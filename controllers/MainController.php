<?php
	set_time_limit(30);
	session_start();

	error_reporting(E_ALL);
 	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
 	error_reporting(-1);

	/* Authentication regulation */
	$current = basename($_SERVER["SCRIPT_FILENAME"], '.php').".php";	

	$auth_must = array(
		"create.php",
		"edit.php",
		"csv.php",
		"pdf.php",
		"logout.php"
	);

	$auth_must_not = array(
		"liftoff.php"
	);

	/* What if I am in auth_must area */
	if(in_array($current, $auth_must)){
		/* Okay, I will check if I am logged in */
		if(!isset($_SESSION['user'])){
			header('Location: index.php');
			return;	
		} 
	}

	/* And If I am logged in gdje ne trebam biti */
	if(in_array($current, $auth_must_not)){
		if(isset($_SESSION['user'])){
			header('Location: index.php');	
			return;
		}
	}
?>