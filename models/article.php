<?php

class Article{
	private $id 			= null;
	private $title 			= null;
	private $description	= null;
	private $kb				= null;
	private $category		= null;
	private $content 		= null;

	/* Public functions */
	public function create($array){
		/* ne dati da se ubaci > ili < */
		foreach($array as $a => $b){
			$helper = str_replace("<", "", $b);
			$helper = str_replace(">", "", $helper);
		 	$array[$a] = $helper;
		}

		/* Napravi dokument ili učitaj ako već postoji */
		if(!file_exists("data/xml/articles.xml")){
		 	$document = new SimpleXMLElement('<root/>');
		 	$document->asXML("data/xml/articles.xml");
		}
		
		$document = simplexml_load_file("data/xml/articles.xml");

    	self::generateId($document);

    	/* Spremanje podataka */
    	$root = $document;

    	$article = $root->addChild('article');
    	$article->addChild('_id', $this->id);
    	$article->addChild('title', $array['title']);
    	$article->addChild('description', $array['description']);
    	$article->addChild('kb', $array['kb']);
    	$article->addChild('category', $array['category']);
    	$article->addChild('content', $array['content']);

    	$document->asXML("data/xml/articles.xml");

		header('Location: articles.php');
		die();
	}


	public function read($id){
		$document = simplexml_load_file("data/xml/articles.xml");

		if($document == null){
			die("Nothing to read here. Go back!");
		}

		foreach($document->article as $article){
			if((int)$article->_id == $id){
				$this->id 			= $id;
				$this->title 		= $article->title;
				$this->description  = nl2br(htmlspecialchars($article->description));
				$this->kb 			= $article->kb;
				$this->category 	= $article->category;
				$this->content 		= nl2br(htmlspecialchars($article->content));
			}
		}
	}

	public function update($array){
		/* Check everything */
		foreach($array as $a => $b){
			$helper = str_replace("<", "", $b);
			$helper = str_replace(">", "", $helper);
		 	$array[$a] = $helper;
		}

		$document = simplexml_load_file("data/xml/articles.xml");

		if($document == null){
			echo "Nothing to update";
			return;
		}

		foreach($document->article as $article){
			if((int)$article->_id == $this->id){
				$article->title 		= $array['title'];
				$article->description  	= $array['description'];
				$article->kb 			= $array['kb'];
				$article->category 		= $array['category'];
				$article->content 		= $array['content'];
			}
		}

		$document->asXML("data/xml/articles.xml");

		header('Location: articles.php');
	}

	public function delete(){
		$document = simplexml_load_file("data/xml/articles.xml");

		if($document == null){
			echo "Nothing to delete";
			return;
		}

		foreach($document->article as $article){
			if((int)$article->_id == $this->id){
				$domelement = dom_import_simplexml($article);
        		$domelement->parentNode->removeChild($domelement);
			}
		}

		$document->asXML("data/xml/articles.xml");

		header('Location: articles.php');
	}

	public function listArticles($term = null){
		$document = simplexml_load_file($_SERVER["DOCUMENT_ROOT"]."data/xml/articles.xml");

		if($document == null){
			echo "No articles";
			return;
		}

		$kbs = array(
    		0 => "Undefined",
    		1 => "Dummy KB Library",
    		2 => "Public Library"
    	);

    	$cats = array(
    		0 => "Undefined",
    		1 => "Web development",
    		2 => "Web design",
    		3 => "Fund raising",
    		4 => "Marketing",
    		5 => "Social media"
    	);

		if($term == null){
			foreach($document->article as $article){
				?> 
				<div class="article-item">
					<a href="article.php?id=<?=$article->_id;?>"><h3><?=$article->title;?></h3></a>
					<p style="font-size: 13px;color:#d5d5d5;line-height: 18px;margin-bottom: 5px;"><?=$article->description;?></p>
					<p><?=$kbs[(int)$article->kb];?> | <?=$cats[(int)$article->category];?></p>
				</div>
				<?php
			}
		}else{
			$term 	= strtolower($term);
			$output = false;

			foreach($document->article as $article){
				if(preg_match('/^'.$term.'(.*)/', strtolower($article->title))){
					$output = true;
					?> 
					<div class="article-item">
						<a href="article.php?id=<?=$article->_id;?>"><h3><?=$article->title;?></h3></a>
						<p style="font-size: 13px;color:#d5d5d5;line-height: 18px;margin-bottom: 5px;"><?=$article->description;?></p>
						<p><?=$kbs[(int)$article->kb];?> | <?=$cats[(int)$article->category];?></p>
					</div>
					<?php
				}else{
					$exploded = explode(" ", $article->description);
					foreach ($exploded as $key => $value) {
						if(preg_match('/^'.$term.'(.*)/', strtolower($value))){
							$des = str_replace($value, "<b style='color:#5d5d5d;'>".$value."</b>", $article->description);
							?> 
							<div class="article-item">
								<a href="article.php?id=<?=$article->_id;?>"><h3><?=$article->title;?></h3></a>
								<p style="font-size: 13px;color:#d5d5d5;line-height: 18px;margin-bottom: 5px;"><?=$des;?></p>
								<p><?=$kbs[(int)$article->kb];?> | <?=$cats[(int)$article->category];?></p>
							</div>
							<?php
							$output = true;
							break;
						}
					}
				}
			}

			if(!$output) echo "Nema rezultata.";
		}
	}

	/* Private functions */
	private function generateId($document){
		$this->id = 1;
		if($document == false) return false; 
		else{
			foreach($document->article as $article){
				if((int)$article->_id >= $this->id) $this->id = (int)$article->_id;
			}
			$this->id++;
		}
	}

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Gets the value of description	.
     *
     * @return mixed
     */
    public function getDescription	()
    {
        return $this->description	;
    }

    /**
     * Gets the value of kb				.
     *
     * @return mixed
     */
    public function getKb				()
    {
        return $this->kb				;
    }

    public function getKbName(){
    	$kbs = array(
    		0 => "Undefined",
    		1 => "Dummy KB Library",
    		2 => "Public Library"
    	);

    	return $kbs[(int)$this->kb];
    }

    /**
     * Gets the value of category		.
     *
     * @return mixed
     */
    public function getCategory		()
    {
        return $this->category		;
    }

    public function getCategoryName(){
    	$cats = array(
    		0 => "Undefined",
    		1 => "Web development",
    		2 => "Web design",
    		3 => "Fund raising",
    		4 => "Marketing",
    		5 => "Social media"
    	);

    	return $cats[(int)$this->category];
    }

    /**
     * Gets the value of content.
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
}

?>