<?php
   session_start();
   $timeout = 600;

   if (isset($_SESSION['timeout'])) 
	{
		$duration = time() - (int)$_SESSION['timeout'];
		if ($duration > $timeout) 
		{
			session_destroy();
			session_start();
		}
		else 
		{
			echo '<script type="text/javascript" language="javascript">window.open("assign1results.php","_self");</script>';
		}
   }

   $_SESSION['timeout'] = time();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Survey</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/master.css" type="text/css" rel="stylesheet">

    <!-- Used for IE 9 -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  </head>
  <body class="background">
    
    <div class="center">  
		<br /><h2 class="font">Survey</h2><br/>
		<a class="btn btn-lg btn-success" href="assign1results.php">Results</a>
			<div class="font">
				<form name="input" action="assign1results.php" method="POST">
					<h3>Do you play video games often?</h3>
						<input type="radio" name="vg" value="yes"></input><label>Yes</label><br/>
						<input type="radio" name="vg" value="no"></input><label>No</label><br/>
					<h3>Are you married?</h3>
						<input type="radio" name="married" value="yes"></input><label>Yes</label><br/>
						<input type="radio" name="married" value="no"></input><label>No</label><br/>
					<h3>Do you play sports competitively?</h3>
						<input type="radio" name="sports" value="yes"></input><label>Yes</label><br/>
						<input type="radio" name="sports" value="no"></input><label>No</label><br/>
					<h3>Do you wear glasses?</h3>
						<input type="radio" name="glasses" value="yes"></input><label>Yes</label><br/>
						<input type="radio" name="glasses" value="no"></input><label>No</label><br/>
					<h3>Do you like the snow?</h3>
						<input type="radio" name="snow" value="yes"></input><label>Yes</label><br/>
						<input type="radio" name="snow" value="no"></input><label>No</label><br/><br/>
					<input class="btn btn-lg btn-success" type="submit" value="Vote">
				</form> 
				<br/>
			</div>
      </div>
  </body>
</html>