<?php

/*
 * Description of Passcode
 */
class Passcode {
    //put your code here
    
    private $passcode;
    
    function __construct() {
        $this->setPasscode(filter_input(INPUT_POST, 'passcode'));
    }
    
    /*
     * A public function to get the passcode 
     * 
     * @return string
     */
    
    public function getPasscode() {
        return $this->passcode;
    }
    
    /*
     * A public function to set the passcode
     * 
     * @return void
     */
    public function setPasscode($passcode) {
        $this->passcode = $passcode;
    }
    
    /*
     * A public function to check if the passcode is valid
     * 
     * @return boolean
     */
    public function isValidPasscode(){
        // shortcut for if else checks to see if true (else) : false
        return ( $this->getPasscode() === Config::PASS_CODE ? true : false );
    }
}
