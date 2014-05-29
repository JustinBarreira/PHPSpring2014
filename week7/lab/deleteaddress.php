<?php include 'dependency.php'; ?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        Util::confirmAccess();     
               
         $address = new AddressBook();
         
         $state_list = States::getStates();
         
         
         if ( Util::isPostRequest() ) {
             
              $AddressbookModel = new AddressbookModel(filter_input_array(INPUT_POST));
              
              if ( $address->delete($AddressbookModel) ) {
                  echo '<p>Address deleted</p>';
              } else {
                   echo '<p>Address Could not delete</p>';
              }
          }
         
         
         $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
         
         $addressResult = $address->read($id);
          //print_r($addressResult);
          
         /*if ( !is_array($addressResult) || count($addressResult) <= 0 ) {
             Util::redirect('viewaddress');
         }*/
         
        ?>
        <td><form name="mainform" action="index.php"><input type="submit" value="Login" /></form> </td>
        <td><form name="mainform" action="viewaddress.php"><input type="submit" value="View Address" /></form> </td>
            
        "Are you sure you want to delete?"
        <table border="2">'
            <td><form name="mainform" action="<?php $address->delete($AddressbookModel) ?>"><input type="submit" value="Yes" /></form> </td>
            <td><form name="mainform" action="viewaddress.php"><input type="submit" value="No" /></form> </td>
    </body>
</html>