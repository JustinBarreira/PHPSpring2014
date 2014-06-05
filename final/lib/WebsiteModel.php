<?php

class WebsiteModel {
    //put your code here
    
    public $userid;
    public $website;
    public $email;
    public $password;
    public $active;
            
    function __construct() { 
    }        
    
    /**
    * A public method to map all the variables to a value
    *
    * @param Array $paramArr
    *
    * @return Void
    */ 
    public function map($paramArr) {        
        if ( is_array($paramArr) && count($paramArr) ) {                   
            foreach ($paramArr as $key => $value) {
                $method = 'set'.ucfirst($key);
                if( method_exists($this, $method) ) {
                    $this->$method($value);
                }
            }
        }       
    }

    public function getUserID() {
        return $this->userid;
    }
    
    public function getWebsite() {
        return $this->website;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function getActive() {
        return $this->active;
    }
    
    public function setUserID($userid) {
        if (is_string($userid) && !empty($userid) )
        {
            $this->website = $userid;
        }
    }

    public function setWebsite($website) {
        if (is_string($website) && !empty($website)/* && preg_match(preg_match("^[a-zA-Z]+$", $website))*/)
        {
            $this->website = $website;
        }
    }

    public function setEmail($email) {    //Find RegEx
        if ( is_string($email) && !empty($email) && strlen($email) > 10/* && preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/", $email)*/ )
        {
            $this->email = $email;
        }
    }

    public function setPassword($password) {
        if ( is_string($password)) /*&& !empty($password) && strlen($password) > 6 */
        {
            $this->password = $password;
        }   
    }
    
    public function setActive($active) {
        $this->active = $active;
    }
}
