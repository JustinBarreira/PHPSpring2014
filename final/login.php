<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SaaS Project - Login</title>
         <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>
        
        <?php
        // put your code here
            $msg = '';
            if ( ! isset($_SESSION['login']) ) {
                $_SESSION['login'] = false;
            }
            if ( Util::isPostRequest() ) {
                $checkcode = new Passcode();
                if ( $checkcode->isValidLogin($checkcode) ) {                    
                    $_SESSION['login'] = true;
                    Util::redirect('admin');                   
                } else {     
                    var_dump($checkcode);
                    $msg = 'Password is not valid.';
                    $_SESSION['userID'] = 0;
                }
            }

            if ( !empty($msg)) {
                echo '<p>', $msg, '</p>';
            }
        ?>
                
        <h1 id="logo"><span>&#x2728;</span>SaaS Project</h1>
        
        <fieldset>
            <legend>Login</legend>
            <p> Not a member, <a href="signup.php">Signup</a></p>

                        
            <form name="mainform" action="#" method="post">

                <label>Email:</label> <input type="text" name="email" /> <br />
                <label>Password:</label> <input type="password" name="password" /> <br />

                <input type="submit" value="Submit" />

            </form>
        </fieldset>
    </body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->
