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
        
        $state_list = array('AL'=>"Alabama",  
			'AK'=>"Alaska",  
			'AZ'=>"Arizona",  
			'AR'=>"Arkansas",  
			'CA'=>"California",  
			'CO'=>"Colorado",  
			'CT'=>"Connecticut",  
			'DE'=>"Delaware",  
			'DC'=>"District Of Columbia",  
			'FL'=>"Florida",  
			'GA'=>"Georgia",  
			'HI'=>"Hawaii",  
			'ID'=>"Idaho",  
			'IL'=>"Illinois",  
			'IN'=>"Indiana",  
			'IA'=>"Iowa",  
			'KS'=>"Kansas",  
			'KY'=>"Kentucky",  
			'LA'=>"Louisiana",  
			'ME'=>"Maine",  
			'MD'=>"Maryland",  
			'MA'=>"Massachusetts",  
			'MI'=>"Michigan",  
			'MN'=>"Minnesota",  
			'MS'=>"Mississippi",  
			'MO'=>"Missouri",  
			'MT'=>"Montana",
			'NE'=>"Nebraska",
			'NV'=>"Nevada",
			'NH'=>"New Hampshire",
			'NJ'=>"New Jersey",
			'NM'=>"New Mexico",
			'NY'=>"New York",
			'NC'=>"North Carolina",
			'ND'=>"North Dakota",
			'OH'=>"Ohio",  
			'OK'=>"Oklahoma",  
			'OR'=>"Oregon",  
			'PA'=>"Pennsylvania",  
			'RI'=>"Rhode Island",  
			'SC'=>"South Carolina",  
			'SD'=>"South Dakota",
			'TN'=>"Tennessee",  
			'TX'=>"Texas",  
			'UT'=>"Utah",  
			'VT'=>"Vermont",  
			'VA'=>"Virginia",  
			'WA'=>"Washington",  
			'WV'=>"West Virginia",  
			'WI'=>"Wisconsin",  
			'WY'=>"Wyoming");
        
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
		<legend>Comments Form:</legend>
                <label for="fullname">Full Name:</label> 
                <input id="fullname" type="text" name="fullname" /> <br />
                
                <label for="state">State:</label>
                <select id="state" name="state">
                    <?php 
                    
                    /*$count = count($state_list);
                    for ($i = 0; $i < $count; $i++) {
                        echo '<option>',$state_list[0], '</option>';
                    } */
                    
                    if (count($state_list) ) {
                        foreach ($state_list as $value) {
                            echo '<option>',$value,'</option>';
                        }
                    }
                            
                    ?>
                </select><br /> 
                <label for="comments">Comments:</label>
                <textarea id="comments" type="text" name="comments" rows="4" cols="50">
                </textarea><br />
                
                <label for="display">Display:</label>
                <textarea id="display" type="text" name="display" rows="10" cols="50" readonly/>
                    <?php 
                        echo $signup->fullname, "\n\n",
                             $signup->state, "\n\n",
                             $signup->comments;
                    ?>
                </textarea>

                <input type="submit" value="Submit" />
            </fieldset>
        </form>
    </body>
</html>
