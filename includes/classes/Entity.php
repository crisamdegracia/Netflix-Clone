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

		// this is how we get data from a single query in PHP
        // get the data and store it in assiotive_array -- like a key value pair
       	$this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
		}
	}
}
