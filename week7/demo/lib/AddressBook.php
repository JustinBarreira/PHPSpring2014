<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Adress
 *
 * @author GFORTI
 */
class AddressBook extends DB {
    //put your code here
    
    
    function __construct() {
        $this->setDb();
    }
    
    public function create() {
        
    }
    
    public function update($AddressbookModel) {
        $result = false;
        
        if ( null !== $this->getDB() && $AddressbookModel instanceof AddressbookModel) {
            $dbs = $this->getDB()->prepare('update addressbook set name = :name, address = :address, city = :city, state = :state, zip = :zip where id = :id');
            $dbs->bindParam(':id', $AddressbookModel->getId(), PDO::PARAM_INT);
            $dbs->bindParam(':name', $AddressbookModel->getName(), PDO::PARAM_INT);
            $dbs->bindParam(':address', $AddressbookModel->getAddress(), PDO::PARAM_INT);
            $dbs->bindParam(':city', $AddressbookModel->getCity(), PDO::PARAM_INT);
            $dbs->bindParam(':state', $AddressbookModel->getState(), PDO::PARAM_INT);
            $dbs->bindParam(':zip', $id, PDO::PARAM_INT);
            
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                return $result;
            }        
         }          
    }
    
    public function read($id = 0) {
       if ($id !== 0) {
           return $this->readByID($id);
       } else {
           return $this->readAll();
       }
        
    }
    
     private function readByID($id){
           $results = array();
           
            if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('select * from addressbook where id = :id limit 1');
            $dbs->bindParam(':id', $id, PDO::PARAM_INT);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $results = $dbs->fetch(PDO::FETCH_ASSOC);
            }
        
         }   
           
           return $results;
     }
    
    private function readAll(){
         $results = array();
        
         if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('select * from addressbook');
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $results = $dbs->fetchAll(PDO::FETCH_ASSOC);
            }
        
         }        
        return $results;
    }




    public function delete() {
        
    }

}