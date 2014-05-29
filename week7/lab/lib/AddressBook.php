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
    
    /**
    * A public method to create a new entry into the addressbook
    * database.
    *
    * @param object $AddressbookModel must be an instanceof AddressbookModel
    *
    * @return boolean
    */  
    public function create($AddressbookModel) {
        $result = false;
        
        //INSERT INTO LARGE_SLIP VALUES
         if ( null !== $this->getDB() && $AddressbookModel instanceof AddressbookModel) {
            $dbs = $this->getDB()->prepare('insert into addressbook set address = :address, city = :city, state = :state, zip = :zip, name = :name');
            $dbs->bindParam(':address', $AddressbookModel->address, PDO::PARAM_STR);
            $dbs->bindParam(':city', $AddressbookModel->city, PDO::PARAM_STR);
            $dbs->bindParam(':state', $AddressbookModel->state, PDO::PARAM_STR);
            $dbs->bindParam(':zip', $AddressbookModel->zip, PDO::PARAM_STR);
            $dbs->bindParam(':name', $AddressbookModel->name, PDO::PARAM_STR);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = true;
            }
        
         }   
        
        return $result;
    }
    
    /**
    * A public method to update an entry in the addressbook
    * database.
    *
    * @param object $AddressbookModel must be an instanceof AddressbookModel
    *
    * @return boolean
    */
    public function update($AddressbookModel) {
        $result = false;
        
        
         if ( null !== $this->getDB() && $AddressbookModel instanceof AddressbookModel ) {
            $dbs = $this->getDB()->prepare('update addressbook set address = :address, city = :city, state = :state, zip = :zip, name = :name where id = :id');
            $dbs->bindParam(':id', $AddressbookModel->id, PDO::PARAM_INT);
            $dbs->bindParam(':address', $AddressbookModel->address, PDO::PARAM_STR);
            $dbs->bindParam(':city', $AddressbookModel->city, PDO::PARAM_STR);
            $dbs->bindParam(':state', $AddressbookModel->state, PDO::PARAM_STR);
            $dbs->bindParam(':zip', $AddressbookModel->zip, PDO::PARAM_STR);
            $dbs->bindParam(':name', $AddressbookModel->name, PDO::PARAM_STR);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = true;
            }
        
         }   
        
        return $result;
    }
    
    /**
    * A public method to return an entry in the addressbook
    * database.
    *
    * @param int $id 
    *
    * @return array
    */
    public function read($id = 0) {
       if ($id !== 0) {
           return $this->readByID($id);
       } else {
           return $this->readAll();
       }
        
    }
    
    /**
    * A private method to return a record from the database by the id
    *
    * @return array
    */
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
    
    /**
    * A private method to return an array of all the records from the database
    *
    * @return array
    */
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

    
    /*
     * A public method to delete a database entry
     * 
     * @return boolean
     * 
     */

    public function delete($AddressbookModel) {
        $result = false;        
        
         if ( null !== $this->getDB() && $AddressbookModel instanceof AddressbookModel ) {
            $dbs = $this->getDB()->prepare('delete from addressbook where id = :id'); 
            $dbs->bindParam(':id', $AddressbookModel->id, PDO::PARAM_INT);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = true;
            }
         }   
        
        return $result;
    }

}