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
        <title>SaaS Project - Admin</title>
        <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>
                 
        <?php
        // put your code here
        
        if ( $_SESSION['userID'] <= 0 ) {               
                session_destroy();
                header('Location: login.php');
                exit;
            }
         
        $users = new Users();
        
         
         if ( Util::isPostRequest() ) {
             
              $aboutPageModel = new AboutPageModel(filter_input_array(INPUT_POST));
              $aboutPageModel->user_id = $_SESSION['userID'];
              
              if ( $users->update($aboutPageModel) ) {
                  
                  
              } else {
                  
                   echo '<p>Page could not update</p>';
              }
          }         
         $aboutPage = $users->read($_SESSION['userID']);
         //$id = filter_input(INPUT_GET , 'id', FILTER_VALIDATE_INT);
                   
         //if ( !is_array($aboutPageModel) || count($aboutPageModel) <= 0 ) {
             //Util::redirect('viewaddress');
         //}            
            
        ?>
        
        <h1 id="logo"><span>&#x2728;</span>SaaS Project</h1>
        
        <div id="corner"><a href="?logout=1">Logout</a></div>
        
        <fieldset>
        
        <legend> Edit your Page</legend>
                
        
        <div id="preview"> <a href="index.php?page=test" target="popup">View Page</a></div><span class="update"></span>
        
         <form name="mainform" action="#" method="post">
            
             <label> Title:</label> <input id="title" type="text" name="title" value="<?php echo $aboutPage['title']; ?>" /><br />            
             <label> Theme:</label> <select id="theme" name="theme">
                 <?php
                 
                 $theme = array( 'Theme 1', 'Theme 2', 'Theme 3');
                 
                    if (count($theme) ) {
                        foreach ($theme as $value) {
                            echo '<option>',$value,'</option>';
                        }
                    }
                 
                 ?>
                 </select>
            <br />
            
            <label> Address:</label> <input id="address" type="text" name="address" value="<?php echo $aboutPage['address']; ?>" /><br /> 
            <label> Phone:</label> <input id="phone" type="text" name="phone" value="<?php echo $aboutPage['phone']; ?>" /><br /> 
            <label> Email:</label> <input id="email" type="text" name="email" value="<?php echo $aboutPage['email']; ?>" /><br /> 
            <label> About:</label><br />
            <textarea id="content" name="content" cols="50" rows="10" value="<?php echo $aboutPage['content']; ?>"></textarea><br /> 
            
            <input type="submit" value="Submit" />
            
        </form>
        
         </fieldset>
        
    </body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->
