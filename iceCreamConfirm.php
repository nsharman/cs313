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
		
		session_start();
		$username = $_SESSION['username'];
		
		$radio1 = 0;
		$radio2 = 0;
		$radio3 = 0;
		$radio4 = 0;
		$radio5 = 0;
		$radio6 = 0;
		$radio7 = 0;
		$radio8 = 0;
		$radio9 = 0;
		$radio10 = 0;
		$radio11 = 0;
		$radio12 = 0;
		
		parse_str($_SERVER['QUERY_STRING']);
		
		$customer = $mysqli->query("select * from customer where username='" . $username . "'");
		$customerInfo = $customer->fetch_assoc();
		$flavorInfo = $mysqli->query("select * from flavor");
		
		$mysqli->query("delete from cart where customerId=" . $customerInfo['id']);
		
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio1 != 0 && $option1 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio1 . ", amount=" . $option1);
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio2 != 0 && $option2 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio2 . ", amount=" . $option2);
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio3 != 0 && $option3 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio3 . ", amount=" . $option3);
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio4 != 0 && $option4 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio4 . ", amount=" . $option4);
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio5 != 0 && $option5 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio5 . ", amount=" . $option5);
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio6 != 0 && $option6 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio6 . ", amount=" . $option6);
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio7 != 0 && $option7 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio7 . ", amount=" . $option7);
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio8 != 0 && $option8 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio8 . ", amount=" . $option8);
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio9 != 0 && $option9 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio9 . ", amount=" . $option9);
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio10 != 0 && $option10 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio10 . ", amount=" . $option10);
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio11 != 0 && $option11 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio11 . ", amount=" . $option11);
		$flavor = $flavorInfo->fetch_assoc();
		if ($radio12 != 0 && $option12 != 0)
			$mysqli->query("insert into cart set customerId=" . $customerInfo['id'] . ", flavorId=" . $flavor['id']
								. ", containerId=" . $radio12 . ", amount=" . $option12);
		
		$cart = $mysqli->query("select * from cart where customerId=" . $customerInfo['id']);
	
		echo "<div class=\"container\" style=\"text-align:center\">";
      echo "<form name=\"input\" action=\"iceCreamPay.php\" method=\"get\">";
		
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