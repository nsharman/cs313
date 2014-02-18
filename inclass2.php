<!DOCTYPE html>

<html>
<head>
    <title>PHP Test Page</title>
</head>

<body>
    <h2>Your Information:</h2>
    <?php
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $major = $_POST["major"];
        $visited = $_POST["visited"];
        $comment = htmlspecialchars($_POST["comments"]);
        
        echo "<table>";
        
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<td>$name</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Email</th>";
        echo "<td>$email</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Major</th>";
        echo "<td>$major</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Places Visited</th>";
        
        foreach ($visited as $place)
        {
            echo "<td>$place</td>";
        }
        
        echo "</tr>";
        echo "<tr>";
        echo "<th>Comments</th>";
        echo "<td>$comment</td>";
        echo "</tr>";
        echo "</table>";
    ?>

</body>
</html>
