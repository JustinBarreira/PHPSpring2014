<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        // used for security, regenerates a cookie session ID and links
        // it back to the user.
        // session is only alive while the browser to still open
        session_regenerate_id();
        
        
      // session_destroy();
        
        print_r($_SESSION);
        
       
        // serialize converts variable object(any type) to a string
        // can be used to save session data into the database or save
        // to a file
        $save = serialize($_SESSION);
         var_dump($save);
         echo '<h1>';
         var_dump(unserialize($save));
       // session_encode()
        ?>
        
        <a href="page1.php">Page1</a>
        
        <script>
            var my_var = "<?php echo $_SESSION['myVar']; ?>";
            alert(my_var);
        </script>
        
    </body>
</html>
