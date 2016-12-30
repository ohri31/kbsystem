<?php
	session_start();

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