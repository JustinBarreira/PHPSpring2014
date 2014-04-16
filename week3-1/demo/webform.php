<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Web Form</title>
    </head>
    <body>
        
        <?php
        
            print_r($_POST);
            echo '<hr>';
            $email = filter_input(INPUT_POST, 'email');
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            
            var_dump($email);
             echo '<hr>';
            var_dump($username);
             echo '<hr>';
            var_dump($password);
             echo '<hr>';
        
        ?>
        <h2> My Form Demo </h2>
       <form name="mainform" action="#" method="post">            
            Email: <input type="text" name="email" /> <br />           
            Username: <input type="text" name="username" /> <br />          
            Password: <input type="password" name="password" /> <br />           
            <input type="submit" value="Submit" />                        
        </form>
    </body>
</html>
