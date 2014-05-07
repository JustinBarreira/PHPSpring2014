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
        <link href="style.css" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        // put your code here
        $signup = new Signup();
             
       // print_r($_SERVER); 
        
        $errors = array();
        if ( Util::isPostRequest() ){
            
            if ( $signup->entryIsValid() ) {
                echo '<p class="success">Data would be process and a sucess message is displayed</p>';
            } else {
                $errors = $signup->getErrors();
            }
        }
        
            if (count($errors) ) {
                echo '<ul class="error">';
                foreach ($errors as $value) {
                    echo '<li>',$value,'</li>';
                }
                echo '</ul>';
        }      
                
                        class Signup {                            
                        
                        public $fullname;
                        public $state;
                        public $comments;

                        public function __construct() {
                            $this->fullname = filter_input(INPUT_POST, 'fullname');
                            $this->state = filter_input(INPUT_POST, 'state');
                            $this->comments = filter_input(INPUT_POST, 'comments');      
                        }
                        }
        ?>
        
        <form name="mainform" action="#" method="post"> 
           <fieldset>
		<legend>Comment Form:</legend>
                <label for="fullname">Full Name:</label> 
                <input id="fullname" type="text" name="fullname" /> <br />
                
                <label for="state">State:</label>
                <select id="state" name="state">
                    <?php
                    
                        foreach ($state_list as $value) {
                            echo '<option>',$value,'</option>';
                        }                            
                    ?>
                </select><br /> 
                <label for="comments">Comments:</label>
                <textarea id="comments" type="text" name="comments" rows="4" cols="50">
                </textarea><br />
                
                <div class="Preview" hidden="true">
                <h1 class="preview" for="display">Preview</h1>
                    <?php 
                        echo "<h3> First Name: $signup->fullname <br />",
                             "State: $signup->state <br />",
                             'Posted On: <br />',   
                             "Comments: $signup->comments <br /></h3>";
                                 
                             /*'<h2>',"First Name: ", $signup->fullname, "\n",
                             "State: ", $signup->state, "\n\n",
                             "Posted On: ", DateTime::RFC1036, "\n\n",
                             "Comments: ", $signup->comments, '</h2>';*/
                    ?>
                </div>
                
                <input type="submit" value="Submit"/>
            </fieldset>
        </form>
    </body>
</html>
