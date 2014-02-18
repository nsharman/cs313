<!DOCTYPE html>
<html>
  <head>
    <title>Movies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/master.css" type="text/css" rel="stylesheet">

    <!-- Used for IE 9 -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	 
	 <script src="movie.js"></script>
	 
  </head>
  <body class="background" textalign="center">
	<br/>
	<form id="form1">
   <center><select onchange="handleChange(this);">
	
	<?php
		$mysqli = new mysqli("localhost", "phpUser", "movie", "hollywood");
	
		if ($mysqli->connect_errno) 
		{
			echo "Falied to connect to MySQL: " . $mysqli->connect_error;
		}
		
		$result = $mysqli->query("select * from actor");
		
		while ($row = $result->fetch_assoc())
		{
			echo "<option value=\"" . $row["id"] . "\">" . $row["name"] . "</option>\n";
		}
	?>
	
	 </select></center>
	 </form>
	</body>
</html>