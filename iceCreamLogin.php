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
    <button class="button" type="button" onclick = "location.href = 'iceCream.php'">
    <b>Home</b></button></br></br> 
	 
	 <?php
		$mysqli = new mysqli("localhost", "iceCream", "iceCreamPass", "iceCream");
	
		if ($mysqli->connect_errno) 
		{
			echo "Falied to connect to MySQL: " . $mysqli->connect_error;
		}
		
		session_destroy();
		
		$customer = $mysqli->query("select * from customer");
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$username2 = $_POST['username2'];
		$password2 = $_POST['password2'];
		$password3 = $_POST['password3'];
		$address = $_POST['content'];
		
		if ($username != null && $password != null)
		{
			while ($row = $customer->fetch_assoc())
			{
				if ($row['username'] == $username && $row['password'] == $password)
				{
					session_start();
					$_SESSION['username'] = $username;
					header("Location: iceCreamOrder.php");
					exit;
				}
			}
			$message = "<h4 style=\"color: red\">username or password incorrect!</h4>";
		}
		
		if ($name != null && $username2 != null && $password2 != null && $password3 != null && $address != null)
		{
			while ($row = $customer->fetch_assoc())
			{
				if ($row['username'] == $username2)
				{
					$message = "<h4 style=\"color: red\">That username is taken!</h4>";
					$badInfo = true;
					break;
				}
			}
			
			if ($password2 != $password3)
			{
				$message = "<h4 style=\"color: red\">The passwords did not match!</h4>";
				$badInfo = true;
			}
			
			if ($badInfo != true)
			{
				session_start();
				$_SESSION['username'] = $username2;
				$mysqli->query("insert into customer set name='" . $name . "', address='" . $address . "', username='" . 
									$username2 . "', password='" . $password2 . "'");
				header("Location: iceCreamOrder.php");
				exit;
			}
		}
		
		echo $message;		
	?>
	 
	 <div class="container" style="text-align:center">
      <form name="input" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
		
		<input type="text" name="username" placeholder="username" /><br/><input type="text" name="password" placeholder="password" /></br/>
		
		<div class="boldi" style="margin:auto; text-align: center">
        <input class="button2" type="submit" value="Login"></br></br>
      </div>
      </form>
	</div>
	<div class="container" style="text-align:center">
      <form name="input" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
		
		<input type="text" name="name" placeholder="Full Name" /><br/> 
		<input type="text" name="username2" placeholder="username" /><br/>
		<input type="text" name="password2" placeholder="password" /><br/>
		<input type="text" name="password3" placeholder="confirm password" /></br>Address</br>
		<textarea name="content"></textarea>
		
		</br/>
      <div class="boldi" style="margin:auto; text-align: center">
        <input class="button2" type="submit" value="Create Account">
      </div>
      </form>
	</div>
	</div>
</body>
</html>