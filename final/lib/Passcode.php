<?php

/*
 * Description of Passcode
 */
class Passcode extends DB{
    //put your code here
    
    private $password;
    private $email;
    
    function __construct() {
        $this->setDb();
        $this->setPassword(filter_input(INPUT_POST, 'password'));
        $this->setEmail(filter_input(INPUT_POST, 'email'));
    }
    
    /*
     * A public function to get the passcode 
     */
    public function getPassword() {
        return $this->password;
    }
    
    /*
     * A public function to set the passcode
     */
    public function setPassword($password) {
        $this->passcode = $password;
    }
    
    /*
     * A public function to get the email 
     */
    public function getEmail() {
        return $this->email;
    }

    /*
     * A public function to set the email
     */
    public function setEmail($email) {
        $this->email = $email;
    }
    
    /*
    * A public function to check if the passcode is valid
    * 
    * @return boolean
    */
    public function isValidLogin(Passcode $loginModel ){
        //$userid = 0;
        $username = $loginModel->getEmail();
        $password = $loginModel->getPassword();
        $isValid = false;
        
            if ( null !== $this->getDB() && $loginModel instanceof Passcode) {

                $dbs = $this->getDB()->prepare('select user_id, email, password from users where email = :email');
                //$dbs->bindParam(':userid', $userid, PDO::PARAM_INT);
                $dbs->bindParam(':username', $username, PDO::PARAM_STR);
                $dbs->bindParam(':password', $password, PDO::PARAM_STR);

                if ( $dbs->execute() && $dbs->rowCount() > 0 ) {                    
                    $isValid = true;
                } 
                    var_dump($dbs);
             }
         
         return $isValid;
    }
}