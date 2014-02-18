<!DOCTYPE html>
<html>
  <head>
    <title>Scriptures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/master.css" type="text/css" rel="stylesheet">

    <!-- Used for IE 9 -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  </head>
  <body style="text-align:center">
  
  <?php
		$mysqli = new mysqli("localhost", "php", "php-pass", "scriptures");
	
		if ($mysqli->connect_errno) 
		{
			echo "Falied to connect to MySQL: " . $mysqli->connect_error;
		}
		
		$topic = $mysqli->query("select * from topic");
		$scripture = $mysqli->query("select * from scriptures");
		$link = $mysqli->query("select * from link");
		
		if ($_POST['book'] != null)
		{
			$book = $_POST['book'];
			$chapter = $_POST['chapter'];
			$verse = $_POST['verse'];
			$content = $_POST['content'];
			//$topic = $_POST['topic'];
			
			$queryStr = "insert into scriptures (book, chapter, verse, content) values ('$book', $chapter, $verse, '$content')";
			
			//echo "running this query: " . $queryStr;
			
			$mysqli->query($queryStr);
			
			//foreach ($topic as $name)
			//{
			//	
			//}
		}
	?>
  
	<h1> Scriptures </h1>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
		<input type="text" name="book" placeholder="Book" /><br/>
		<input type="text" name="chapter" placeholder="Chapter" /><br/>
		<input type="text" name="verse" placeholder="Verse" /><br/>
		<textarea name="content"></textarea><br/>
		
		<?php
		while ($row = $topic->fetch_assoc())
		{
			echo '<input type="checkbox" name="topic[]" value="' . $row['name'] . '" />' . $row['name'] . "   ";
		}
		?>
			
		<br/><input type="submit"><br/></br/>
	</form>
	
	<?php
		
		while ($row = $scripture->fetch_assoc())
		{
			echo '<center><font color="blue">' . '<b>' . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . '</b></font><br/>';
			echo '<font color="green">' . '<p>' . $row['content'] . "</p>" . '</font></center>';
		}
	?>
	
	</body>
</html>