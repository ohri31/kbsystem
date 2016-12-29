<?php
	/* Error hadnling */
	error_reporting(E_ALL);
 	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
 	error_reporting(-1);

	/* Class objects */
	$article = new Article;

	/* Handling pozivi */
	if(isset($_GET['id'])){		
		$article->read($_GET['id']);
	}else Header('Location index.php');
	

	if(isset($_POST['create'])){
		$article->create($_POST);
	}

	if(isset($_POST['update'])){
		$article->update($_POST);
	}

	if(isset($_POST['delete'])){
		$article->delete();
	}
	
?>