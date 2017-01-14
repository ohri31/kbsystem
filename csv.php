<?php
	require_once('brains/global.php');
	
	require_once('controllers/MainController.php');
	
	$document = simplexml_load_file("data/xml/articles.xml");
	$csvfile = fopen('data/csv/data.csv', 'w');

	if($document != null){
		foreach ($document->article as $article) fputcsv($csvfile, get_object_vars($article),',','"');	
		fclose($f);
	}

	header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . basename("data/csv/data.csv") . "\""); 
    readfile("data/csv/data.csv");
    
    
		
?>