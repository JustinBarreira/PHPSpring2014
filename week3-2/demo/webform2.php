<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <link href="css/style.css" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        // put your code here
        $signup2 = new Signup2();
              
        $errors = array();
        if ( Util::isPostRequest() ){
            
            if ( $signup2->entryIsValid() ) {
                echo '<p class="success">Data would be process and a sucess message is displayed</p>';
            } else {
                $errors = $signup2->getErrors();
            }
                       
        }
        
        
        //$signup2->displayErrors();
        
            if ( count($errors) ) {
                echo '<ul class="error">';
                foreach ($errors as $value) {
                    echo '<li>',$value,'</li>';
                }
                echo '</ul>';
            }
        ?>
        
       
       <form name="mainform" action="#" method="post"> 
           <fieldset>
		<legend>Sign-up Form:</legend>
                <label for="email">E-mail:</label> 
                <input id="email" type="text" name="email" value="<?php echo $signup2->getEmail(); ?>" /> <br />
               
                <label for="username">Username:</label>
                <input id="username" type="text" name="username" value="<?php echo $signup2->getUsername(); ?>" /> <br /> 
                
                <label for="password">Password:</label>
                <input id="password" type="password" name="password" /> <br />           
                
                <label for="confirmpassword">Confirm Password:</label>
                <input id="confirmpassword" type="password" name="confirmpassword" /> <br />           
                
                <input type="submit" value="Submit" />
            </fieldset>
        </form>
    </body>
</html>
