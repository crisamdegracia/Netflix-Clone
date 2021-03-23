<?php

class Account
{
    private $con; // connection to the database
    private $errorArray = array();  // an empty array to store errors

    public function __construct($con)
    {
        $this->con = $con;
    }


    public function register($fn, $ln, $un, $em, $em2, $pw, $pw2)
    {
        // after all these are called 2 things gonna happen
        // 1. error array are empty, no error happend
        // 2. if no error it will write it into the database
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUsername($un);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);




        //if there is no error from above, we insert everything into the database
        if (empty($this->errorArray)) {
            return $this->insertUserDetails($fn, $ln, $un, $em, $pw);
        }

        // To debug:
        //   $query->execute();
        //   var_dump($query->errorInfo());


        // it it doesnt match daw ung if  empty($this->errorArray) it will return false
        // but when the above if is successful it wont go on this part
        return false;
    }

    public function login($un, $pw) {
        $pw = hash("sha512", $pw);
        
        $query = $this->con->prepare("SELECT * FROM users WHERE username=:un AND password=:pw");

        $query->bindValue(":un", $un);
        $query->bindValue(":pw", $pw);

        $query->execute();

        if ($query->rowCount() == 1) {
            return true;
        }        
        
        array_push($this->errorArray, Constants::$loginFailed);
        return false;
    }


    private function insertUserDetails($fn, $ln, $un, $em, $pw)
    {
        // encrypting the password
        $pw = hash("sha512", $pw);

        $query = $this->con->prepare(
            "INSERT INTO users (firstName, lastName, username, email, password) 
            VALUES (:fn, :ln, :un, :em, :pw)"
        );

        $query->bindValue(":fn", $fn);
        $query->bindValue(":ln", $ln);
        $query->bindValue(":un", $un);
        $query->bindValue(":em", $em);
        $query->bindValue(":pw", $pw);



        return $query->execute();
    }

    //if the firstname is < | > length of 2 and 20, then display an error
    private  function validateFirstName($fn)
    {
        if (strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($this->errorArray, "Incorrect length");
            array_push($this->errorArray, Constants::$firstNameCharacters);
        }
    }

    private function validateLastName($ln)
    {
        if (strlen($ln) < 2 || strlen($ln) > 25) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
        }
    }

    // d2 ichechek din natin kung existing na ung new user
    private function validateUsername($un)
    {
        if (strlen($un) < 2 || strlen($un) > 25) {
            array_push($this->errorArray, Constants::$usernameCharacters);

            //kaya my return dito is gagana parin sa baba ung susunod na mangyayare
            return;
        }


        //ung username=:un - we need to bindValue muna para tumamaung value
        $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
        $query->bindValue(":un", $un);
        $query->execute();

        if ($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
        }
    }


    private function validateEmails($em, $em2)
    {
        if ($em != $em2) {
            array_push($this->errorArray, Constants::$emailsDontMatch);
            return;
        }

        if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE email=:em");
        $query->bindValue(":em", $em);
        $query->execute();

        if ($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
        }
    }



    private function validatePasswords($pw, $pw2)
    {
        if ($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDontMatch);
            return;
        }

        if (strlen($pw) < 5 || strlen($pw) > 25) {
            array_push($this->errorArray, Constants::$passwordLength);
            return;
        }
    }

    // if inside an array (2nd args is the array that we check)
    public function getError($error)
    {
        if (in_array($error, $this->errorArray)) {
            return "<span class='errorMessage'>$error</span>";
        }
    }
}
