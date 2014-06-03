<?php

class Signup extends DB {
    
    public function __construct() {
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
            
            $dbs2 = $this->getDB()->prepare('insert into about_page set user_id = :user_id, title = title, theme = Theme 1, address = address, phone = 555-867-5309, email = :email, content = about, active = :active');
            
                        
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
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
    

   
}
