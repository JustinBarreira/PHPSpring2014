<?php

class Users extends DB {
    
    function __construct() {
        $this->setDb();
    }
    
    public function websiteTaken(UsersModel $usersModel) {
        
        $website = $usersModel->getWebsite();
        $isTaken = false;
        
            if ( null !== $this->getDB() ) {

                $dbs = $this->getDB()->prepare('select website from users where website = :website limit 1');
                $dbs->bindParam(':website', $website, PDO::PARAM_STR);

                if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                    $isTaken = true;
                } 

             }
         
         return $isTaken;
    }
    
    /**
    * A public method to create a new entry into the users
    * database.
    *
    * @param object $UsersModel must be an instanceof UsersModel
    *
    * @return boolean
    */  
    public function create($UsersModel) {
        $result = false;
        
        //INSERT INTO USERS VALUES
         if ( null !== $this->getDB() && $UsersModel instanceof UsersModel) {
            $dbs = $this->getDB()->prepare('insert into users set website = :website, email = :email, password = :password');
            $dbs->bindParam(':website', $UsersModel->website, PDO::PARAM_STR);
            $dbs->bindParam(':email', $UsersModel->email, PDO::PARAM_STR);
            $dbs->bindParam(':password', $UsersModel->password, PDO::PARAM_STR);
            
            $dbs2 = $this->getDB()->prepare('insert into about_page set user_id = :user_id, title = Title, theme = Theme 1, address = Address, phone = 555-867-5309, email = :email, content = About, active = :active');
            $dbs2->bindParam(':user_id', $UsersModel->userid, PDO::PARAM_INT);
            $dbs2->bindParam("Title", $UsersModel->title, PDO::PARAM_STR);
            $dbs2->bindParam("Theme 1", $UsersModel->theme, PDO::PARAM_STR);
            $dbs2->bindParam("Address", $UsersModel->address, PDO::PARAM_STR);
            $dbs2->bindParam("555-867-5309", $UsersModel->phone, PDO::PARAM_STR);
            $dbs2->bindParam(':email', $UsersModel->email, PDO::PARAM_STR);
            $dbs2->bindParam("About", $UsersModel->content, PDO::PARAM_STR);
            $dbs2->bindParam(':active', $UsersModel->active, PDO::PARAM_INT);
            
                        
            if ( $dbs->execute() && $dbs->rowCount() > 0 && $dbs2->execute() && $dbs2->rowCount() > 0 ) {
                $result = true;
            }        
        
         }   
        
        return $result;
    }
    
    public function save( SignupModel $dataModel) {
        $result = false;
         
        $email = $dataModel->getEmail();
        $username = $dataModel->getUsername();
        $password = sha1($dataModel->getPassword());
               
         if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('insert into signup set username = :username, email = :email, password = :password');
            $dbs->bindParam(':username', $username, PDO::PARAM_STR);
            $dbs->bindParam(':email', $email, PDO::PARAM_STR);
            $dbs->bindParam(':password', $password, PDO::PARAM_STR);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = intval($this->getDB()->lastInsertId());
            } else {
                $error = $dbs->errorInfo();
                error_log($error[2], 3, "logs/errors.log");
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
}
