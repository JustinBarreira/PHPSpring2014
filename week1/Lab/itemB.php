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
        // array_count_values
        $array = array(1, "hello", 1, "world", "hello");
        print_r(array_count_values($array));
        ?>
        
        <?php
        // array_flip
        $trans = array("a" => 1, "b" => 1, "c" => 2);
        $trans = array_flip($trans);
        print_r($trans);
        ?>
        
        <?php
        // array_key_exists
        $search_array = array('first' => 1, 'second' => 4);
        if (array_key_exists('first', $search_array)) {
            echo "The 'first' element is in the array";
        }
        ?>
        
        <?php
        // array_map
        function cube($n)
        {
            return($n * $n * $n);
        }

        $a = array(1, 2, 3, 4, 5);
        $b = array_map("cube", $a);
        print_r($b);
        ?>
        
        <?php
        // array_rand
        $input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
        $rand_keys = array_rand($input, 2);
        echo $input[$rand_keys[0]] . "\n";
        echo $input[$rand_keys[1]] . "\n";
        ?>
        
        <?php
        // array_push
        $stack = array("orange", "banana");
        array_push($stack, "apple", "raspberry");
        print_r($stack);
        ?>
        
        <?php
        // in_array
        $os = array("Mac", "NT", "Irix", "Linux");
        if (in_array("Irix", $os)) {
            echo "Got Irix";
        }
        if (in_array("mac", $os)) {
            echo "Got mac";
        }
        ?>
        
        <?php
        // shuffle
        $numbers = range(1, 20);
        shuffle($numbers);
        foreach ($numbers as $number) {
            echo "$number ";
        }
        ?>
        
        <?php
        // count
        $a[0] = 1;
        $a[1] = 3;
        $a[2] = 5;
        $result = count($a);
        // $result == 3

        $b[0]  = 7;
        $b[5]  = 9;
        $b[10] = 11;
        $result = count($b);
        // $result == 3

        $result = count(null);
        // $result == 0

        $result = count(false);
        // $result == 1
        ?>
        
        <?php
        // sort
        $fruits = array("lemon", "orange", "banana", "apple");
        sort($fruits);
        foreach ($fruits as $key => $val) {
            echo "fruits[" . $key . "] = " . $val . "\n";
        }

        ?>
        
        <?php
        // in_array
        $os = array("Mac", "NT", "Irix", "Linux");
        if (in_array("Irix", $os)) {
            echo "Got Irix";
        }
        if (in_array("mac", $os)) {
            echo "Got mac";
        }
        ?>
    </body>
</html>
