<?php
    
    $key = "visits";
    $visits = 0;

    if (isset($_COOKIE["visits"]))
    {
        $visits = $_COOKIE[$key];
    }
    else
    {
        $visits = 0;
    }
    
    $visits++;
    setcookie($key, $visits, time() + 6000);
?>

<!DOCTYPE html>
<html>
<body>
    This is the cookie page.<br/>
    
    <?php
        echo "This page has been visited $visits time(s)";
        
        // for files! Gets the file as a giant string.
        $content = file_get_contents("file.txt");
        print "$content";
        
        // a better way. Makes a line array of the file. 
        if ($content = file("file.txt"))
        {
            foreach ($content as $value)
            {
                print "$value<br/>";
            }
        }
        
        // line by line. Dont forget permissions.
        $file = fopen("file.txt", "r+");
        if ($file)
        {
            while (!feof($file))
            {
                $line = fgets($file);
                print "$line <br/>";
            }
        }
        
        fwrite($file, "New Content");
        fclose($file);
        
    ?>
    
</body>
</html>