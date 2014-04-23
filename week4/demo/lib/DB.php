<?php

/**
 * Description of DB
 *
 * @author GForti
 */
class DB {
    
    protected $db = null;

    public function getDB() { 
        if ( null != $this->db ) {
            return $this->db;
        }
        try {
            $this->db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        } catch (Exception $ex) {
           $this->closeDB();
        }
        return $this->db;        
    }
    
     public function closeDB() {        
        $this->db = null;        
    }
    
    
}
