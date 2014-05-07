<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Formvalidator
 *
 * @author GFORTI
 */
class Signup {
    
    protected $errors = array();
    
    public $fullname;
    public $state;
    public $comments;
    
    public function __construct() {
        $this->fullname = filter_input(INPUT_POST, 'email');
        $this->username = filter_input(INPUT_POST, 'username');
        $this->password = filter_input(INPUT_POST, 'password');
        $this->confirmPassword = filter_input(INPUT_POST, 'confirmPassword');        
    }




    /**
    * A method to check if a posted email is valid.
    * Adds a custom message to the errors list key["email"]
    *
    * @return boolean
    */ 
    public function entryIsValid(){
        $this->emailEntryIsValid();
        $this->usernameEntryIsValid();
        $this->passwordEntryIsValid();
        $this->ComfirmPasswordEntryIsValid();
        return ( count($this->errors) ? false : true );
    }
    
    
    /**
    * A method to check if a posted username is valid.
    * Adds a custom message to the errors list key["username"]
    *
    * @return boolean
    */    
    public function usernameEntryIsValid() {
                
        if ( empty($this->username) ) {
            $this->errors["username"] = "Username is missing.";
         } else if ( !Validator::usernameIsValid($this->username) ) {
            $this->errors["username"] = "Username is not valid.";                
         } 
        
        return ( empty($this->errors["username"]) ? true : false ) ;
    }
    
    /**
    * A method to check if a posted password is valid.
    * Adds a custom message to the errors list key["username"]
    *
    * @return boolean
    */    
    public function passwordEntryIsValid() {
                
        if ( empty($this->password) ) {
            $this->errors["password"] = "Password is missing.";
         } else if ( !Validator::passwordIsValid($this->password) ) {
            $this->errors["password"] = "Password is not valid.";                
         } 
        
        return ( empty($this->errors["password"]) ? true : false ) ;
    }
    
    /**
    * A method to check if a posted confirm password is valid.
    * Adds a custom message to the errors list key["confirmpassword"]
    *
    * @return boolean
    */    
    public function ComfirmPasswordEntryIsValid() {
                
        if /*( empty($this->confirmPassword) ) {
            $this->errors["confirmPassword"] = "Password is missing.";
         } else if ( !Validator::passwordIsValid($this->confirmPassword) ) {
            $this->errors["confirmPassword"] = "Password is not valid.";                
         } else if */($this->confirmPassword != $this->password) {
            $this->errors["confirmPassword"] = "Passwords do not match.";
         }
        
        return ( empty($this->errors["confirmPassword"]) ? true : false ) ;
    }
    
    /**
    * A method to check if a posted email is valid.
    * Adds a custom message to the errors list key["email"]
    *
    * @return boolean
    */    
    public function emailEntryIsValid() {
         
         if ( empty($this->email) ) {
            $this->errors["email"] = "Email is missing.";
         } else if ( !Validator::emailIsValid($this->email) ) {
            $this->errors["email"] = "Email is not valid.";                
         } 
        
        return ( empty($this->errors["email"]) ? true : false ) ;
    }
    
    
    /**
    * A method to return all errors found in the post
    *
    * @return array
    */  
    public function getErrors() {
        return $this->errors;
    }
    
    public function getStates() {
        
        $state_list = array('AL'=>"Alabama",  
			'AK'=>"Alaska",  
			'AZ'=>"Arizona",  
			'AR'=>"Arkansas",  
			'CA'=>"California",  
			'CO'=>"Colorado",  
			'CT'=>"Connecticut",  
			'DE'=>"Delaware",  
			'DC'=>"District Of Columbia",  
			'FL'=>"Florida",  
			'GA'=>"Georgia",  
			'HI'=>"Hawaii",  
			'ID'=>"Idaho",  
			'IL'=>"Illinois",  
			'IN'=>"Indiana",  
			'IA'=>"Iowa",  
			'KS'=>"Kansas",  
			'KY'=>"Kentucky",  
			'LA'=>"Louisiana",  
			'ME'=>"Maine",  
			'MD'=>"Maryland",  
			'MA'=>"Massachusetts",  
			'MI'=>"Michigan",  
			'MN'=>"Minnesota",  
			'MS'=>"Mississippi",  
			'MO'=>"Missouri",  
			'MT'=>"Montana",
			'NE'=>"Nebraska",
			'NV'=>"Nevada",
			'NH'=>"New Hampshire",
			'NJ'=>"New Jersey",
			'NM'=>"New Mexico",
			'NY'=>"New York",
			'NC'=>"North Carolina",
			'ND'=>"North Dakota",
			'OH'=>"Ohio",  
			'OK'=>"Oklahoma",  
			'OR'=>"Oregon",  
			'PA'=>"Pennsylvania",  
			'RI'=>"Rhode Island",  
			'SC'=>"South Carolina",  
			'SD'=>"South Dakota",
			'TN'=>"Tennessee",  
			'TX'=>"Texas",  
			'UT'=>"Utah",  
			'VT'=>"Vermont",  
			'VA'=>"Virginia",  
			'WA'=>"Washington",  
			'WV'=>"West Virginia",  
			'WI'=>"Wisconsin",  
			'WY'=>"Wyoming");    
    }
}
