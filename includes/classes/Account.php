<?php

class Account
{
	private $con; // connection to the database
    private $errorArray = array();  // an empty array to store errors

	public function __construct($con)
	{
		$this->con = $con;
	}


	public function register($fn, $ln, $un, $em, $em2, $pw, $pw2) {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUsername($un);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);

        /*
            To debug:
            $query->execute();
            var_dump($query->errorInfo());
        */

        if (empty($this->errorArray)) {
            return $this->insertUserDetails($fn, $ln, $un, $em, $pw);
        }

        return false;
    }


	//if the firstname is < | > length of 2 and 20, then display an error
	private  function validateFirstName($fn) {
        if (strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($this->errorArray, "Incorrect length");
            array_push($this->errorArray, Constants::$firstNameCharacters);
        }
    }

	private function validateLastName($ln) {
        if (strlen($ln) < 2 || strlen($ln) > 25) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
        }
    }

	// if inside an array (2nd args is the array that we check)
	public function getError($error) {
        if (in_array($error, $this->errorArray)) {
            return "<span class='errorMessage'>$error</span>";
        }
    }


}
