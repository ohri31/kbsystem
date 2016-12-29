<?php

class User{
	private $id 			= null;
	private $email 			= null;
	private $password 		= null;
	private $organisation 	= null;

	public function register($array){
		/* Napravi dokument ili učitaj ako već postoji */
		if(!file_exists("data/xml/users.xml")){
		 	$document = new SimpleXMLElement('<root/>');
		 	$document->asXML("data/xml/users.xml");
		}

		$document = simplexml_load_file("data/xml/users.xml");	

		/* Now, I am generating some stuff, probably useful, but who knwos */
		self::generateId($document);
		$password = self::encrypt2017($array['password'], $array['email']);

    	/* Spremanje podataka */
    	$root = $document;

    	$article = $root->addChild('user');
    	$article->addChild('_id', $this->id);
    	$article->addChild('email', $array['email']);
    	$article->addChild('password', $password);
    	$article->addChild('organisation', $array['organisation']);
    	
    	/* Okay, please save, please... */
    	$document->asXML("data/xml/users.xml");

    	$credentials = array(
    		"email" 	=> $array['email'],
    		"password" 	=> $array['password']
    	);

    	self::login($credentials);
	}

	public function login($array){
		/* You shall not pass /*
		/* JK... */
		/* You should, cause if you pass, I wall also pass the exam */
		/* LOL */
		$document = simplexml_load_file("data/xml/users.xml");

		if($document == null) die('Sorry, there are no user registred yet. You wann go back <a href="index.php">home</a>?');

		foreach($document->user as $user){
			if((string)$user->email == $array['email']){
				$pass = self::encrypt2017($array['password'], $array['email']);
				if((string)$user->password == $pass){
					$_SESSION['user']['id'] 	= (string)$user->_id;
					$_SESSION['user']['email'] 	= (string)$user->email;
					break;
				}
			}	
		}

		header('Location: index.php');
		die();
	}

	/* Some private stuff */
	private function encrypt2017($password, $email){
		return md5($password."encrypt2017happynewyear").':'.md5("amozdaine".$email);
	}

	private function generateId($document){
		$this->id = 1;
		if($document == false) return false; 
		else{
			foreach($document->user as $user){
				if((int)$user->_id >= $this->id) $this->id = (int)$article->_id;
			}
			$this->id++;
		}
	}
}

?>