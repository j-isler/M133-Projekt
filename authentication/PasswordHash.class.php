<?php

class PasswordHash {
    
    public static function generatePassword($password) {
        #https://stackoverflow.com/questions/21480868/class-to-hash-password-using-bcrypt
            return password_hash($password, PASSWORD_DEFAULT);
    }
    
    public static function checkPassword($password, $hash) {
        if (password_verify ($password, $hash)){
            return true;
        }else{
            return false;
        }
        
    }
}




?>