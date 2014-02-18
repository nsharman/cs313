<?xml version = ?1.0? encoding "utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN""http://www.w3.org/TR/xhtml11
/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
  <title>Flavor's in Stock</title>
  <link rel="stylesheet" type="text/css" href="assign04.css">
</head>
<body class="body">
  <a id="top">
  <div style = "font-family: 'Georgia'; margin:auto; text-align:center">
    <h1>Nate's Ice Cream</h1>
    <h3 style="color: red"><i>Enjoy the treats in life!</i></h3>
    <br />
    <button class="button" type="button" onclick = "location.href = 'iceCream.php'">
    <b>Home</b></button> 
	 
   <?php
		$mysqli = new mysqli("localhost", "iceCream", "iceCreamPass", "iceCream");
	
		if ($mysqli->connect_errno) 
		{
			echo "Falied to connect to MySQL: " . $mysqli->connect_error;
		}
		
		$storage = $mysqli->query("select * from storage");
	?>
	
  <div class="container" style="text-align:center">
		
	<?php
	
		echo '<br/><div class="img" style="width: 170px; font-size:20pt;">Flavor</div>';
		echo '<div class="img" style="width: 100px; font-size:20pt;">Size</div>';
		echo '<div class="img" style="width: 170px; font-size:20pt;">Stock</div><br/>';
		
		while ($row = $storage->fetch_assoc())
		{
			$flavor = $mysqli->query("select * from flavor where id=" . $row["flavorId"]);
			$flavor = $flavor->fetch_assoc();
			
			for ($i = 0; $i < 3; $i++)
			{
				$container = $mysqli->query("select * from container where id=" . $row["containerId"]);
				$container = $container->fetch_assoc();
				
				if ($i == 1)
				{
					echo "<div class=\"img\" style=\"width: 170px\">" . $flavor['name'] . "</div>";
				}
				else
				{
					echo "<div class=\"img\" style=\"width: 170px\"></div>";
				}
				
				echo "<div class=\"img\" style=\"width: 100px\">" . $container['name'] . "</div>";
				echo "<div class=\"img\" style=\"width: 170px\">" . $row['available'] . "</div><br/>";
				
				if ($i != 2)
				{
					$row = $storage->fetch_assoc();
				}
			}
			echo "<br/>";
		}
	?>
	</div>
	</div>
  <button class="button" type="button" onclick = "location.href = '#top'">
  <b>Top of Page<b></button><br /><br />
</body>
</html>