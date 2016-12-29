<?php
	require_once('models/article.php');
	/* Services doc */
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		/* Search */
		if(isset($_POST['term'])){
			$term = $_POST['term'];

			$article = new Article;
			$article->listArticles($term);
		}
	}else die('Not ajax!!!');
?>