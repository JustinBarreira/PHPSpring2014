<?php

class Validator extends DB {
    //put your code here
    
    function __construct() {
        $this->setDb();
    }

    
        
   /**
  * A static method to check if an email is valid.
  *
  * @param string $email must be a valid email
  *
  * @return boolean
  */    
    public static function emailIsValid($email) {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) != false );
    }
    
    
     /**
    * A static method to check if a name is valid.
    *
    * @param string $name must be a valid name
    *
    * @return boolean
    */    
    public static function nameIsValid($name) {
        return ( is_string($name) && !empty($name) );       
    }
    
    /**
    * A static method to check if comments are valid.
    *
    * @param string $comment must be a valid Length
    *
    * @return boolean
    */    
    public static function commentIsValid($comment) {
        return ( is_string($comment) && !empty($comment) && strlen($comment) <= 150 );    
       
    }   

    /*
    * A public function to check if the passcode is valid
    * 
    * @return boolean
    */
    public function isValidLogin(Passcode $loginModel ){
        // shortcut for if else checks to see if true (else) : false
        $username = $loginModel->getUsername();
        $password = $loginModel->getPassword();
        $isValid = false;
        
            if ( null !== $this->getDB() ) {

                $dbs = $this->getDB()->prepare('select username, password from signup where username = :username AND password = :password limit 1');
                $dbs->bindParam(':username', $username, PDO::PARAM_STR);
                $dbs->bindParam(':password', $password, PDO::PARAM_STR);

                if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                    $isValid = true;
                } 

             }
         
         return $isValid;
    }
}
