<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SaaS Project - Sign-up</title>
         <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>
        
        <?php 
        
        $users = new Users();  
         
         if ( Util::isPostRequest() ) {
             
              $usersModel = new UsersModel(filter_input_array(INPUT_POST));
              $_SESSION['userID'] = $users->createUser($usersModel);
              
              if ( null !== $_SESSION['userID'] ) {  
                  $users->createAboutPage($_SESSION['userID']);
                  $_SESSION['login'] = true;
                  Util::redirect('admin');
              } else {
                   echo '<p>User could not be created</p>';
              }
          }
        
        
        ?>
                
        
        <h1 id="logo"><span>&#x2728;</span>SaaS Project</h1>
        
        <fieldset>
            <legend>Signup</legend>
        <p> Already a member, <a href="login.php">Login</a></p>
         <form name="mainform" action="#" method="post">            
             
                         <label for="website">Web Site:</label>
                         <input id="website" type="text" name="website" maxlength="30" value="" /> <span class="websitetaken"></span> <br />             
            
                         <label for="email">Email:</label>
                         <input id="email" type="text" name="email" /> <span class="email"></span> <br />
            
                         <label for="password">Password:</label>
                         <input id="password" type="password" name="password" /> <span class="password"></span> <br />
               
            <input type="submit" value="Submit" />
                        
         </form>        
         </fieldset>        
        
        <script src="js/script.js" type="text/javascript"></script>        
    </body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->
