<?php
	require_once('brains/global.php');
	require_once('models/article.php');
	/* Services doc */
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		/* Search */
		if(isset($_POST['term'])){
			$term = $_POST['term'];

			$article = new Article;
			$article->listArticles($term);
		}
	}else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		switch ($_GET['service']) {
			case 'articles':
				header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    			header('Content-Type: text/html');
    			header('Access-Control-Allow-Origin: *');

    			$article = new Article;

    			if(isset($_GET['term'])) 	$article->listArticlesJSON($_GET['term']);
    			else if(isset($_GE['id']))	$article->readJSON($_GET['id']);
    			else 						$article->listArticlesJSON();

				break;


			
			default:
				header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
				die();
				break;
		}
	}else{
		header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
		die();
	}
?>