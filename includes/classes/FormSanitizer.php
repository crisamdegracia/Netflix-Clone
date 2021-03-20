<?php 
class FormSanitizer {


	// static means - dont need to create an instance of the class in order to call it
    public static function sanitizeFormString($inputText) {
        $inputText = strip_tags($inputText); // Remove all the HTML tags.
        $inputText = str_replace(" ", "", $inputText); // Removing all spaces.
        // $inputText = trim($inputText) Remove all spaces after and before the text, but keep all the spaces inside.
        $inputText = strtolower($inputText);
        $inputText = ucfirst($inputText); // ucfirst()  converts the first character of a string to uppercase. 
        return $inputText;
    }

    public static function sanitizeFormUsername($inputText) {
        $inputText = strip_tags($inputText); // Remove all the HTML tags.
        $inputText = str_replace(" ", "", $inputText); // Removing all spaces.
        return $inputText;
    }

    public static function sanitizeFormPassword($inputText) {
        $inputText = strip_tags($inputText); // Remove all the HTML tags.
        return $inputText;
    }

    public static function sanitizeFormEmail($inputText) {
        $inputText = strip_tags($inputText); // Remove all the HTML tags.
        $inputText = str_replace(" ", "", $inputText); // Removing all spaces.
        return $inputText;
    }

}
?>