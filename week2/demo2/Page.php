<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author GFORTI
 */
class Page {
    //put your code here
    
    //property (variable)
    public $title = '';
    private $nav = array();
    
    
    public function setNav($navArr) {
        
        if (is_array($navArr) && count($navArr) ) {
            
            //
            $this->nav = array_merge($this->nav,$navArr);
            return true;
        }
        return false;
    }
    
    private function isNavSet(){
       return (is_array($this->nav) && count($this->nav));
       
    }


    //medthod (function)
    function buildNav(){
        $returnStr = "";
        if ( $this->isNavSet() ) {
            $returnStr .= '<ul>';
            foreach ($this->nav as $value) {
                $returnStr .= "<li>$value</li>";
            }
              $returnStr .= '</ul>';
        }
      return $returnStr;
    }
    
    
}
