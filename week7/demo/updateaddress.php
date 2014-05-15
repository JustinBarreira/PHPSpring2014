<?php include 'dependency.php'; ?>
<!DOCTYPE html>
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
         
         $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
         //$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
         
         $addressResult = $address->read($id);
          print_r($addressResult);
          
          
          if ( Util::isPostRequest() ) {
              
              $AddressbookModel = new AddressbookModel($_POST);
              
              
          }
          
         // echo $addressResult['address'];
          
        
        ?>
        
        <form name="mainform" action="#" method="post"> 
           <fieldset>
		<legend>Update:</legend>
                <label for="name">Name:</label> 
                <input id="name" type="text" name="name" value="<?php echo $addressResult['address']; ?>" /> <br />
                
                <legend>Update:</legend>
                <label for="address">Address:</label> 
                <input id="address" type="text" name="address" value="<?php echo $addressResult['address']; ?>" /> <br />
                
                <legend>Update:</legend>
                <label for="city">Address:</label> 
                <input id="city" type="text" name="city" value="<?php echo $addressResult['address']; ?>" /> <br />
                
                <legend>Update:</legend>
                <label for="state">Address:</label> 
                <input id="state" type="text" name="state" value="<?php echo $addressResult['address']; ?>" /> <br />
                
                <legend>Update:</legend>
                <label for="zip">Address:</label> 
                <input id="zip" type="text" name="zip" value="<?php echo $addressResult['address']; ?>" /> <br />
               
                <input type="hidden" name="id" value="<?php echo $addressResult['id']; ?>"/>
                <input type="submit" value="Submit" />
            </fieldset>
        </form>
        
        
    </body>
</html>
