<?php

class InputProcessor {

    public static function processString(string $string, int $max = 0): array {

        if (empty($string)) {
            return self::returnInput("String is empty.", false);
        }
        //Sanitize
        $string = htmlspecialchars($string);;

        //validate
        $max = $max == 0 ? strlen($string) : $max;
        
        if (strlen($string) <= $max) {
            return self::returnInput($string, true);
        } else {
            return self::returnInput("String cannot be more than $max characters.", false);
        }
               
    }

    public static function processEmail(string $email): array {

        if (empty($email)) {
            return self::returnInput("Email is empty.", false);
        }
        //Sanitize
        $value = filter_var($email, FILTER_SANITIZE_EMAIL);

        //validate
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return self::returnInput($email, true);
        } else {
            return self::returnInput("Email is invalid.", false);
        }
               
    }

    public static function processPassword(string $password, string $password_v = null) {

        if (!empty($password_v)) {
            if ($password != $password_v) {
                return self::returnInput("Passwords do not match.", false);
            }
        }

        if (empty($password)) {
            return self::returnInput("Password is empty.", false);
        }

        $password = htmlspecialchars($password);

        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
            return self::returnInput($password, true);
        } else {
            return self::returnInput('Password must have a minimum of 8 characters, at least 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character', false);
        }

    }

    
    public static function processFile(array $file) : array {

        if (empty($file)) {
            return self::returnInput(false, "File is empty.");
        }

        return self::returnInput(true, $file['name']);

    }

    private static function returnInput(string $value, bool $isValid) : array {
        return [
            'value' => $isValid ? $value : '',
            'error' => $isValid ? '' : $value,
            'valid' => $isValid
        ];
    }

}

?>