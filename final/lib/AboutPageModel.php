<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AboutPageModel
 *
 * @author bean2_000
 */
class AboutPageModel {
    
    public $about_page_id;
    public $user_id;
    public $title;
    public $theme;
    public $address;
    public $phone;
    public $email;
    public $content;
    public $active;
    
    function __construct($paramArr) {
        $this->map($paramArr);
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

    
    public function getAbout_page_id() {
        return $this->about_page_id;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getTheme() {
        return $this->theme;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getContent() {
        return $this->content;
    }

    public function getActive() {
        return $this->active;
    }

    public function setAbout_page_id($about_page_id) {
        $this->about_page_id = $about_page_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setTheme($theme) {
        $this->theme = $theme;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setActive($active) {
        $this->active = $active;
    }


}
