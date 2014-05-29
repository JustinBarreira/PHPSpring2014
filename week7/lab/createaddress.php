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
         
            echo '<table border="2">';     
            echo '<td><form name="mainform" action="index.php"><input type="submit" value="Login" /></form> </td>';
            echo '<td><form name="mainform" action="viewaddress.php"><input type="submit" value="View Address" /></form> </td>';
             
                        
         $address = new AddressBook();
         
         $state_list = States::getStates();         
         
         if ( Util::isPostRequest() ) {
             
              $AddressbookModel = new AddressbookModel(filter_input_array(INPUT_POST));
              
              if ( $address->create($AddressbookModel) ) {
                  echo '<p>Address created</p>';
              } else {
                   echo '<p>Address Could not be created</p>';
                   echo var_dump($AddressbookModel);
              }
          }         
          
          //print_r($addressResult);
         
        ?>
        
        <form name="mainform" action="#" method="post"> 
           <fieldset>
		<legend>Create:</legend>                  
                <label for="address">Address:</label> 
                <input id="address" type="text" name="address" value="" /> <br />
               
                <label for="city">City:</label> 
                <input id="city" type="text" name="city" value="" /> <br />
               
                <label for="state">State:</label> 
                <select id="state" type="text" name="state">
                    <?php 
                    
                    
                    if (count($state_list) ) {       
                        
                        foreach ($state_list as $key=>$value) {                            
                           
                            echo '<option value="',$key,'">',$value,'</option>';
                           
                        }
                    }
                            
                    ?>"> </select><br />
                              
                <label for="zip">ZIP:</label> 
                <input id="zip" type="text" name="zip" value="" /> <br />
                
                <label for="name">Name:</label> 
                <input id="name" type="text" name="name" value="" /> <br />
                <input type="submit" value="Submit" />
            </fieldset>
        </form>
        
        
    </body>
</html>
