<?php
	session_start();
	require_once('brains/global.php');

	/* Prebacit ćemo prvo sve članke */
	$document = simplexml_load_file("data/xml/articles.xml");
	foreach($document->article as $article){

		$article->id 			= (int)$article->id;
		$article->title 		= (string)$article->title;
		$article->description 	= (string)$article->description;
		$article->kb 			= (int)$article->kb;
		$article->category 		= (int)$article->category;
		$article->content 		= (string)$article->content;

		// Provjera d li je u bazi
		$check = $db->query("SELECT _id FROM article WHERE title = '{$article->title}' AND description = '{$article->description}' AND kb = {$article->kb} AND category = {$article->category} AND content = '{$article->content}'")->num_rows;

		if($check == 0){
			$db->query("INSERT INTO article
			(_id, title, description, kb, category, content, autor)
			VALUES
			({$article->id}, '{$article->title}', '{$article->description}', '{$article->kb}', '{$article->category}', '{$article->content}', {$_SESSION['user']['id']})");
		}
	}

	// Prebacit ćemo sada sve usere
	$document = simplexml_load_file("data/xml/users.xml");
	foreach($document->user as $user){

		$user->email 		= (string)$user->email;
		$user->password 	= (string)$user->password;
		$user->organisation	= (string)$user->organisation;

		$check = $db->query("SELECT _id FROM user WHERE email = '{$user->email}' AND password = '{$user->password}' AND organisation = '{$user->organisation}'")->num_rows;

		if($check == 0){
			
			$db->query("INSERT INTO user (_id, email, password, organisation) VALUES ('null', '{$user->email}', '{$user->password}', '{$user->organisation}')");
		}

		die($db->error);
	}
?>