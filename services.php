<?php
	require_once('brains/global.php');
	require_once('models/article.php');
	/* Services doc */
	if (isset($_POST)) {
		/* Search */
		if(isset($_POST['term'])){
			$term = $_POST['term'];

			$article = new Article;
			$article->listArticles($term);
		}
	}else if (isset($_GET)) {
		switch ($_GET['service']) {
			case 'articles':
				header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    			header('Content-Type: text/html');
    			header('Access-Control-Allow-Origin: *');

    			$article = new Article;

    			if(isset($_GET['term'])) 	$article->listArticlesJSON($_GET['term']);
    			else 						$article->listArticlesJSON();

				break;
			
			default:
				die("ERROR");
				break;
		}
	}else{
		header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
	}
?>