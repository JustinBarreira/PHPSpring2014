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
        
        <table>
        <?php
        
            
            $number = 1; 
            for ($i = 0; $i < 100; $i++){
               
                             
               $date = date("m d Y");
               
               if($number % 2 === 0){
               echo '<tr style="background-color: silver";>';
               echo "<td>'$number'</td>   <td>'$date'</td>";
               echo '</tr>';
               }
               else{
               echo '<tr>';
               echo     "<td>'$number'</td>   <td>'$date'</td>";
               echo     '</tr>';
               }
                
               $number++;
            }
            
        ?>
        </table>
        
    </body>
</html>
