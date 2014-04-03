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
        // Explode
        // Example 1
        $pizza  = "pepperoni sausage bacon cheese peppers onion";
        $pieces = explode(" ", $pizza);
        echo $pieces[0]; // pepperoni
        echo $pieces[1]; // sausage
        echo $pieces[2]; // bacon

        // Example 2
        $data = "Justin:*:1023:1000::/home/foo:/bin/sh";
        list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
        echo $user; // Justin
        echo $pass; // *
        ?>
        
        <?php
        // sha1        
        $str = 'apple';
        if (sha1($str) === 'd0be2dc421be4fcd0172e5afceea3970e2f3d940') {
            echo "Would you like a green or red apple?";
        }       
        ?>

        <?php
        // htmlentities
        // Example 1
        $str2 = "A 'quote' is <b>bold</b>";

        // Outputs: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
        echo htmlentities($str2);

        // Outputs: A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;
        echo htmlentities($str2, ENT_QUOTES);
        ?>

        <?php
        // htmlentities
        // Example 2
        $str3 = "\x8F!!!";

        // Outputs an empty string
        echo htmlentities($str3, ENT_QUOTES, "UTF-8");

        // Outputs "!!!"
        echo htmlentities($str3, ENT_QUOTES | ENT_IGNORE, "UTF-8");
        ?>
        
        <?php
        // md5
        $str4 = 'apple';

        if (md5($str4) === '1f3870be274f6c49b3e31a0c6728957f') {
            echo "Would you like a green or red apple?";
        }
        ?>
        
        <?php
        // strip_tags
        $text = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>';
        echo strip_tags($text);
        echo "\n";

        // Allow <p> and <a>
        echo strip_tags($text, '<p><a>');
        ?>
        
        <?php
        //trim
        $text   = "\t\tThese are a few words :) ...  ";
        $binary = "\x09Example string\x0A";
        $hello  = "Hello World";
        var_dump($text, $binary, $hello);

        print "\n";

        $trimmed = trim($text);
        var_dump($trimmed);

        $trimmed = trim($text, " \t.");
        var_dump($trimmed);

        $trimmed = trim($hello, "Hdle");
        var_dump($trimmed);

        $trimmed = trim($hello, 'HdWr');
        var_dump($trimmed);

        // trim the ASCII control characters at the beginning and end of $binary
        // (from 0 to 31 inclusive)
        $clean = trim($binary, "\x00..\x1F");
        var_dump($clean);
        ?>
        
        <?php
        // ucwords
        $foo = 'hello world!';
        $foo = ucwords($foo);             // Hello World!

        $bar = 'HELLO WORLD!';
        $bar = ucwords($bar);             // HELLO WORLD!
        $bar = ucwords(strtolower($bar)); // Hello World!
        ?>
        
        <?php
        // strlen
        $str = 'abcdef';
        echo strlen($str); // 6

        $str = ' ab cd ';
        echo strlen($str); // 7
        ?>
        
        <?php
        // str_shuffle
        $str = 'abcdef';
        $shuffled = str_shuffle($str);

        // This will echo something like: bfdaec
        echo $shuffled;
        ?>
        
        <?php
        // ord
        $str = "\n";
        if (ord($str) == 10) {
            echo "The first character of \$str is a line feed.\n";
        }
        ?>
    </body>
</html>
