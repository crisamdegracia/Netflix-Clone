<?php
class Entity
{

	private $con, $sqlData;

	public function __contruct($con, $input)
	{
		$this->con = $con;

		if(is_array($input)){
			$this->sqlData = $input;
		} else {
			$query = $this->con->prepare("SELECT * FROM entities WHERE id=:id");
			$query->bindValue(":id", $input);
			$query->execute();
		
		// f4v41
		// this is how we get data from a single query in PHP
        // get the data and store it in assiotive_array -- like a key value pair
       	$this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
		}
	}


	//f4v43 - 
	public function getId(){
		return $this->sqlData["id"];
	}

	public function getName(){
		return $this->sqlData['name'];
	}

	public function getThumbnail(){
		return $this->sqlData['thumbnail'];
	}

	public function getPreview(){
		return	$this->sqlData['preview'];
	}

}
