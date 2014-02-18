<?xml version = ?1.0? encoding "utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN""http://www.w3.org/TR/xhtml11
/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
  <title>Payment</title>
  <link rel="stylesheet" type="text/css" href="assign04.css">
</head>
<body class="body">
  <a id="top">
  <div style = "font-family: 'Georgia'; margin:auto; text-align:center">
    <h1>Nate's Ice Cream</h1>
    <h3 style="color: red"><i>Enjoy the treats in life!</i></h3>
    <br />
	 
   <?php
		$mysqli = new mysqli("localhost", "iceCream", "iceCreamPass", "iceCream");
	
		if ($mysqli->connect_errno) 
		{
			echo "Falied to connect to MySQL: " . $mysqli->connect_error;
		}
		
		$customer = $mysqli->query("select * from customer");
		$customerInfo = $customer->fetch_assoc();
		
		$cart = $mysqli->query("select * from cart where customerId=" . $customerInfo['id']);

		while ($row = $cart->fetch_assoc())
		{
			$flavor = $mysqli->query("select * from flavor where id=" . $row["flavorId"]);
			$flavor = $flavor->fetch_assoc();
			$container = $mysqli->query("select * from container where size=" . $row["containerId"]);
			$container = $container->fetch_assoc();
			$storageInfo = $mysqli->query("select * from storage where flavorId=" . $flavor['id'] . " and containerId=" .
													$container['id']);
			$stock = $storageInfo->fetch_assoc();
			
			$amount = $stock['available'] - $row['amount'];			
			$mysqli->query("update storage set available=" . $amount . " where flavorId=" . $flavor['id'] . 
								" and containerId=" . $container['id']);
		}
		header("Location: https://www.paypal.com/login");
	?>

	</div>
</body>
</html>