<!DOCTYPE html>
<html>
	<head>
		<title>Results</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
      
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<link href="css/master.css" type="text/css" rel="stylesheet">

		<!-- Used for IE 9 -->
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	</head>
	<body class="background">
      <div class="center">
			<br /><h2 class="font">Results</h2><br/>	
			<?php			
				$filename = "assign1.txt";
				$lines = file($filename, FILE_IGNORE_NEW_LINES);
				$values = array_values($_POST);
				$lineNum = 0;
				$j = 0;
				
				for ($i = 0; $i < 5; $i++) 
				{
					if ($values[$i] == "yes")
						$lines[$lineNum] += 1;
					else if ($values[$i] == "no")
						$lines[$lineNum + 1] += 1;
					$lineNum += 2;
				}
		
				$openfile = fopen($filename, "w+");
				foreach ($lines as $value) 
				{
					fwrite($openfile,$value."\r\n");
				}
				fclose($file);
				
				echo "<div class=\"font\"> \n";                               
				echo "<h3>Do you play video games often?</h3> \n";
				echo "<h5>Yes: {$lines[$j++]}<h5> \n";
				echo "<h5>No: {$lines[$j++]}<h5> \n";
				echo "<h3>Are you married?</h3> \n";
				echo "<h5>Yes: {$lines[$j++]}<h5> \n";
				echo "<h5>No: {$lines[$j++]}<h5> \n";
				echo "<h3>Do you play sports competitively?</h3> \n";
				echo "<h5>Yes: {$lines[$j++]}<h5> \n";
				echo "<h5>No: {$lines[$j++]}<h5> \n";
				echo "<h3>Do you wear glasses?</h3> \n";
				echo "<h5>Yes: {$lines[$j++]}<h5> \n";
				echo "<h5>No: {$lines[$j++]}<h5> \n";
				echo "<h3>Do you like the snow?</h3> \n";
				echo "<h5>Yes: {$lines[$j++]}<h5> \n";
				echo "<h5>No: {$lines[$j++]}<h5> \n";
			?>
			</div>
		</div>   
	</body>
</html>