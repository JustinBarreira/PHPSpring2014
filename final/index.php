<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Justin</title>
        <link rel="stylesheet" type="text/css" href="css/theme2.css" />
    </head>
    <body>
        
        <?php
        
            $users = new Users();
            $aboutPageModel = new AboutPageModel(filter_input_array(INPUT_POST));
            $aboutPageModel->user_id = $_SESSION['userID'];
            $aboutPage = $users->read($_SESSION['userID']);
        
        ?>
        
        <div id="icon">&#x270d;</div>
        
        <h1><span>What we are all</span>
            About</h1>
        
        
        <div id='about'>  
            <h2>Welcome to our website</h2> 
            <p><a href="login.php">Edit</a></p>
              
        </div>
        
        <div id="contact">
           
            <div id="email"> 
                 <div class="iconHeader">&#x2709;</div>
                <?php echo $aboutPage['email']; ?>            </div>
            <div id="phone"> 
                 <div class="iconHeader">&#x2706;</div>
                <?php echo $aboutPage['phone']; ?>
            </div>
             <div id="address">
                <div class="iconHeader">&#x270e;</div>
                <?php echo $aboutPage['address']; ?>            </div>
        </div>
        

    </body>
</html>
