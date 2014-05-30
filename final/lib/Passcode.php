<?php

/*
 * Description of Passcode
 */
class Passcode {
    //put your code here
    
    private $password;
    private $email;
    
    function __construct() {
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
}