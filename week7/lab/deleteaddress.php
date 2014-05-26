<?php include 'dependency.php'; ?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        Util::confirmAccess();
        
        $address = new AddressBook();
        
        if ( Util::isPostRequest() ) {
             
              $AddressbookModel = new AddressbookModel(filter_input_array(INPUT_POST));
              
              if ( $address->delete($AddressbookModel) ) {
                  echo '<p>Address updated</p>';
              } else {
                   echo '<p>Address Could not update</p>';
              }
          }
         
         
         $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
         
         $addressResult = $address->read($id);
          //print_r($addressResult);
          
         if ( !is_array($addressResult) || count($addressResult) < 0 ) {
             Util::redirect('index');
         }
                         
            echo '<td><form name="mainform" action="index.php"><input type="submit" value="Login" /></form> </td>';
            echo '<td><form name="mainform" action="viewaddress.php"><input type="submit" value="View Address" /></form> </td>';
            
            echo "Are you sure you want to delete?";
            echo '<table border="2">';
            echo '<td><form name="mainform" action=""><input type="submit" value="Yes" /></form> </td>';
            echo '<td><form name="mainform" action=""><input type="submit" value="No" /></form> </td>';
            
         ?>
        
    </body>
</html>