<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        Util::confirmAccess();
                         
            echo '<td><form name="mainform" action="index.php"><input type="submit" value="Login" /></form> </td>';
            echo '<td><form name="mainform" action="viewaddress.php"><input type="submit" value="View Address" /></form> </td>';
            
            echo "Are you sure you want to delete?";
            echo '<table border="2">';
            echo '<td><form name="mainform" action=""><input type="submit" value="true" /></form> </td>';
            echo '<td><form name="mainform" action=""><input type="submit" value="false" /></form> </td>';
            
            
      
        ?>
        
    </body>
</html>