<?php

class Account
{
	private $con; // connection to the database
    private $errorArray = array();  // an empty array to store errors

	public function __construct($con)
	{
		$this->con = $con;
	}

	private function validateFirstName($fn) {
        if (strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
        }
    }
}
