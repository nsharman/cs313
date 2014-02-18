<?xml version = ?1.0? encoding "utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN""http://www.w3.org/TR/xhtml11
/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
  <title>Your Order</title>
  <link rel="stylesheet" type="text/css" href="assign04.css">
</head>
<body class="body">
  <a id="top">
  <div style = "font-family: 'Georgia'; margin:auto; text-align:center">
    <h1>Nate's Ice Cream</h1>
    <h3 style="color: red"><i>Enjoy the treats in life!</i></h3>
    <br />
    <button class="button" type="button" onclick = "location.href = 'iceCreamLogin.php'">
    <b>Logout</b></button> 
	 
   <?php
		$mysqli = new mysqli("localhost", "iceCream", "iceCreamPass", "iceCream");
	
		if ($mysqli->connect_errno) 
		{
			echo "Falied to connect to MySQL: " . $mysqli->connect_error;
		}
		
		session_start();
		$username = $_SESSION['username'];
		
		$result = $mysqli->query("select * from container");
	 
		while ($row = $result->fetch_assoc())
		{
			echo "<p style=\"font-size: 20pt\">One " . $row["name"] . " is <span>$" . $row["price"] . "</span> (size " . 
				  $row["size"] . ")</p>";
		}
		
	?>
	
  
  <div class="container">
      <form name="input" action="iceCreamConfirm.php" method="get">
		
		<div class="img" style="width: 170px; font-size:20pt;">Flavor</div>
		<div class="img" style="width: 150px; font-size:20pt;">Size</div>
		<div class="img" style="width: 100px; font-size:20pt;">Amount</div><br/>
		
	<?php
		$mysql = new mysqli("localhost", "iceCream", "iceCreamPass", "iceCream");
	
		if ($mysql->connect_errno) 
		{
			echo "Falied to connect to MySQL: " . $mysql->connect_error;
		}
		
		$results = $mysql->query("select * from flavor");
		$i = 1;
	 
		while ($row = $results->fetch_assoc())
		{
			echo "<div class=\"img\" style=\"width: 170px\">" . $row["name"] . "</div>"; 
			echo "<div class=\"img\" style=\"width: 150px\"> 
					<input type=\"radio\" name=\"radio" . $i . "\" value=\"1\">1 
					<input type=\"radio\" name=\"radio" . $i . "\" value=\"2\">2 
					<input type=\"radio\" name=\"radio" . $i . "\" value=\"3\">3 
					</div> 
					<div class=\"img\" style=\"width: 100px\"><select name=\"option" . $i . "\">
					<option value=\"0\">0</option>
					<option value=\"1\">1</option>
					<option value=\"2\">2</option>
					<option value=\"3\">3</option>
					<option value=\"4\">4</option>
					<option value=\"5\">5</option>
					<option value=\"6\">6</option>
					<option value=\"7\">7</option>
					<option value=\"8\">8</option>
					<option value=\"9\">9</option>
					<option value=\"10\">10</option>
					</select></div><br/>";
			
			$i += 1;
		}
		
	?>
		</br/>
      <div class="boldi" style="margin:auto; text-align: center">
        <input class="button2" type="reset" value="Reset">
        <input class="button2" type="submit" value="Continue">
      </div>
      </form>
	</div>
	</div>
  <br />
  <button class="button" type="button" onclick = "location.href = '#top'">
  <b>Top of Page<b></button><br /><br />
</body>
</html>