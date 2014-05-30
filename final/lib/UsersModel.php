<?php
/**
 * Description of LoginModel
 *
 * @author bean2_000
 */
class UsersModel {
    //put your code here
    
    private $userid;
    private $website;
    private $email;
    private $password;    
    private $active;
    
    public function getUserid() {
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

    public function setUserid($userid) {
        $this->userid = $userid;
    }

    public function setWebsite($website) {
        $this->website = $website;
    }

    public function setEmail($email) {    //Find RegEx
        if ( is_string($email) && !empty($email) && strlen($email) > 10 )
        {
            $this->email = $email;
        }
    }

    public function setPassword($password) {
        if ( is_string($username) && !empty($username) && strlen($username) > 6 )
        {
            $this->password = $password;
        }
    }

    public function setActive($active) {
        $this->active = $active;
    }




}
