<?php 
ob_start(); // Turns on output buffering. it will leave a comment there 
            // basically daw it awaits untill all of the period executed before outputting it to the page
            // parang sa ES6 - ung await ata un.
            // wait daw muna all the PHP code has been executed before output
session_start(); // We are able to use sessions.
                // even after the page been closed -
                // by default until the browser is closed
// session_destroy();
date_default_timezone_set("Asia/Manila"); // Setting the default time zone.  

try {
    $con = new PDO("mysql:dbname=reeceflix;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		// set the error reporting 
		// PDO :: ATTR_ERRMODE - we are accesing a static property on the PDO object called attribute error mode
		//						- we are setting -
		// PDO::ERRMODE_WARNING - we are setting the value of PDO :: ATTR_ERRMODE
		// ERRMODE_WARNING - means it can help any errors for us and maybe continue the rest of the script depending on what the code is
	} catch (PDOException $e) {
    exit("Connection failed: " . $e->getMessage());
}
?>