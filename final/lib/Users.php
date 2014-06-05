<?php

class Users extends DB {
    
    function __construct() {
        $this->setDb();
    }
    
    public function websiteTaken(WebsiteModel $websiteModel) {
        
        $website = $websiteModel->getWebsite();
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
    public function createUser(UsersModel $UsersModel) {
        $result = 0;
        $active = 1;
        //INSERT INTO USERS VALUES
         if ( null !== $this->getDB() && $UsersModel instanceof UsersModel) {
            $dbs = $this->getDB()->prepare('insert into users set website = :website, email = :email, password = :password');
            $dbs->bindParam(':website', $UsersModel->website, PDO::PARAM_STR);
            $dbs->bindParam(':email', $UsersModel->email, PDO::PARAM_STR);
            $dbs->bindParam(':password', $UsersModel->password, PDO::PARAM_STR);
                        
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = intval($this->getDB()->lastInsertId());
            }        
        
         }   
        
        return $result;
    }
    
    /**
    * A public method to create a new entry into the about_page
    * database.
    *
    * @param int $id
    *
    * @return boolean
    */  
    public function createAboutPage( $id ) {
        $result = false;
        $title = 'Title';
        $theme = 'Theme 1';
        $address = 'Address';
        $phone = '555-5555';
        $email = 'Email';
        $content = 'Add your content';
        
        //INSERT INTO ABOUT_PAGE VALUES
         if ( null !== $this->getDB() ) {
            
            $dbs = $this->getDB()->prepare('insert into about_page set user_id = :user_id, title = :title, theme = :theme, address = :address, phone = :phone, email = :email, content = :content');
            $dbs->bindParam(':user_id', $_SESSION['userID'], PDO::PARAM_INT);
            $dbs->bindParam(':title', $title, PDO::PARAM_STR);
            $dbs->bindParam(':theme', $theme, PDO::PARAM_STR);
            $dbs->bindParam(':address', $address, PDO::PARAM_STR);
            $dbs->bindParam(':phone', $phone, PDO::PARAM_STR);
            $dbs->bindParam(':email', $email, PDO::PARAM_STR);
            $dbs->bindParam(':content', $content, PDO::PARAM_STR);
            
                        
            if ( $dbs->execute() && $dbs->rowCount()) {
                $result = true;
            }        
        
         }   
        
        return $result;
    }
    
    public function update( $aboutPageModel ) {
        $result = false;
         
        //$about_page_id = $aboutPageModel->getAbout_page_id();
        //$user_id = $aboutPageModel->getUser_id();
        //$title = $aboutPageModel->getTitle();
        //$theme = $aboutPageModel->getTheme();
        //$address = $aboutPageModel->getAddress();
        //$phone = $aboutPageModel->getPhone();
        //$email = $aboutPageModel->getEmail();
        //$content = $aboutPageModel->getContent();
        //$active = $aboutPageModel->getActive();
               
         if ( null !== $this->getDB() && $aboutPageModel instanceof AboutPageModel ) {
            $dbs = $this->getDB()->prepare('update about_page set title = :title, theme = :theme, address = :address, phone = :phone, email = :email, content = :content where user_id = :user_id');
            $dbs->bindParam(':user_id', $aboutPageModel->user_id, PDO::PARAM_INT);
            $dbs->bindParam(':title', $aboutPageModel->title, PDO::PARAM_STR);
            $dbs->bindParam(':theme', $aboutPageModel->theme, PDO::PARAM_STR);
            $dbs->bindParam(':address', $aboutPageModel->address, PDO::PARAM_STR);
            $dbs->bindParam(':phone', $aboutPageModel->phone, PDO::PARAM_STR);
            $dbs->bindParam(':email', $aboutPageModel->email, PDO::PARAM_STR);
            $dbs->bindParam(':content', $aboutPageModel->content, PDO::PARAM_STR);
            
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
            $dbs = $this->getDB()->prepare('select * from about_page where user_id = :id limit 1');
            $dbs->bindParam(':id', $id, PDO::PARAM_INT);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $results = $dbs->fetch(PDO::FETCH_ASSOC);
            }
        
         }   
           
           return $results;
     }
}
