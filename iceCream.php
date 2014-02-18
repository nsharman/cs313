<?xml version = ?1.0? encoding "utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN""http://www.w3.org/TR/xhtml11
/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
  <title>Nate's Ice Cream</title>
  <link rel="stylesheet" type="text/css" href="assign04.css">
</head>
<body class="body">
  <a id="top">
  <div style = "font-family: 'Georgia'; margin:auto; text-align:center">
    <h1>Nate's Ice Cream</h1>
    <h3 style="color: red"><i>Enjoy the treats in life!</i></h3>
    <br />
    <button class="button" type="button" 
            onclick = "location.href = 'iceCreamLogin.php'">
    <b>Place Your Order</b></button>&nbsp&nbsp&nbsp
	 <button class="button" type="button" 
            onclick = "location.href = 'iceCreamStorage.php'">
    <b>Flavor's in Stock</b></button>
    
  </div>
  <br />
  <div class="container">
      
	 <?php
		$mysqli = new mysqli("localhost", "iceCream", "iceCreamPass", "iceCream");
	
		if ($mysqli->connect_errno) 
		{
			echo "Falied to connect to MySQL: " . $mysqli->connect_error;
		}
		
		$result = $mysqli->query("select * from flavor");
		$i = 0;
	 
		while ($row = $result->fetch_assoc())
		{
			echo "<div class=\"img\"><img src=\"pics/" . $row["picture"] . "\" alt=\"" . $row["name"] . "\" width = \"269\" height = \"215\"> &nbsp<br/><div id=\"title\">" . $row["name"] . "</div><p></p></div>";
				  
			if ($i == 2)
			{
				echo "<br/>";
				$i = 0;
			}
			else
			{
				$i += 1;
			}
		}
		
	?>
	 
    <button class="button" type="button" onclick = "location.href = '#top'">
    <b>Top of Page<b></button><br /><br />
  </div>
</body>
</html>
