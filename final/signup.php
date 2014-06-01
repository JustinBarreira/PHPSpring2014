<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>SaaS Project - Sign-up</title>
         <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>
                
        
        <h1 id="logo"><span>&#x2728;</span>SaaS Project</h1>
        
        <fieldset>
            <legend>Signup</legend>
        <p> Already a member, <a href="index.php">Login</a></p>
         <form name="mainform" action="#" method="post">            
             
                         <label for="website">Web Site:</label>
                         <input id="website" type="text" name="website" maxlength="30" value="" /> <span class="websitetaken">Span</span> <br />             
            
                         <label for="email">Email:</label>
                         <input id="email" type="text" name="email" /> <br />
            
                         <label for="password">Password:</label>
                         <input id="password" type="password" name="password" /> <br />
               
            <input type="submit" value="Submit" />
                        
         </form>        
         </fieldset>        
        
        <script src="js/script.js" type="text/javascript"></script>        
    </body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->
