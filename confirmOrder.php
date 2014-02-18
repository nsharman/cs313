<?xml version = ?1.0? encoding "utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN""http://www.w3.org/TR/xhtml11
/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
  <title>Confirm Order</title>
  <link rel="stylesheet" type="text/css" href="assign04.css">
</head>
<body class="body">
  <a id="top">
  <div style = "font-family: 'Georgia'; margin:auto; text-align:center">
    <h1>Nate's Ice Cream</h1>
    <h3 style="color: red"><i>Enjoy the treats in life!</i></h3>
    <br />
    <button class="button" type="button" onclick = "location.href = 'iceCreamOrder.php'">
    <b>Edit Order</b></button> 
	 
   <?php
		$mysqli = new mysqli("localhost", "iceCream", "iceCreamPass", "iceCream");
	
		if ($mysqli->connect_errno) 
		{
			echo "Falied to connect to MySQL: " . $mysqli->connect_error;
		}
		
		$customer = $mysqli->query("select * from customer");
		$customerInfo = $customer->fetch_assoc();
		$cart = $mysqli->query("select * from cart where customerId=" . $customerInfo['id']);
	?>
	
  <div class="container" style="text-align:center">
      <form name="input" action="submit.html" method="get">
		
	<?php
	
		echo "<h2>" . $customerInfo['name'] . "</h2>";
		echo '<p style="font-size:16pt">Address: ' . $customerInfo['address'] . "</p>";
		
		echo '<div class="img" style="width: 170px; font-size:20pt;">Flavor</div>';
		echo '<div class="img" style="width: 100px; font-size:20pt;">Size</div>';
		echo '<div class="img" style="width: 120px; font-size:20pt;">Amount</div>';
		echo '<div class="img" style="width: 100px; font-size:20pt;">Price</div><br/>';
		
		while ($row = $cart->fetch_assoc())
		{
			$flavor = $mysqli->query("select * from flavor where id=" . $row["flavorId"]);
			$flavor = $flavor->fetch_assoc();
			$container = $mysqli->query("select * from container where size=" . $row["containerId"]);
			$container = $container->fetch_assoc();
			echo "<div class=\"img\" style=\"width: 170px\">" . $flavor['name'] . "</div>";
			echo "<div class=\"img\" style=\"width: 100px\">" . $container['name'] . "</div>";
			echo "<div class=\"img\" style=\"width: 120px\">" . $row['amount'] . "</div>";
			
			$price = $row['amount'] * $container['price'];
			$price = number_format($price, 2);
			$sum += $price;
			
			echo "<div class=\"img\" style=\"width: 100px\">$" . $price . "</div><br/>";
		}
		
		$sum = number_format($sum, 2);
		echo "<div class=\"img\"><h2>Total $" . $sum . "</h2></div>";
	?>
		</br/>
      <div class="boldi" style="margin:auto; text-align: center">
        <input class="button2" type="submit" value="Confirm Order">
      </div>
      </form>
	</div>
	</div>
  <br />
  <button class="button" type="button" onclick = "location.href = '#top'">
  <b>Top of Page<b></button><br /><br />
</body>
</html>