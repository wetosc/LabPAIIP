<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/colors.css" rel="stylesheet">
	<link href="css/fonts.css" rel="stylesheet">

	<link href="css/memo.css" rel="stylesheet">

	<title>Memo</title>
</head>

<body class="bg-clouds">

	<div class="content-header">

		<nav class="navbar navbar-fixed-top bg-clear bg-faded">
			
			<a class="navbar-brand font-nord color-midnightblue font-large2" href="index.html">Cernei Eugeniu</a>

			<ul class="nav navbar-nav navbar-right font-scifly">
				<li>
					<a class="font-large color-midnightblue" type="button" data-toggle="dropdown"> worked on <span class="caret"></span> </a>
					<ul class="dropdown-menu bg-faded font-large">
						<li><a href="#">iOS</a></li>
						<li><a href="#">android</a></li>
						<li><a href="#">unity</a></li>
					</ul>
				</li>

				<li><a class="font-large color-midnightblue" href="#">posts</a></li>	

				<li><a class="font-large color-midnightblue" href="memo.php">memos</a></li>	

				<li><a class="font-large color-midnightblue"  href="about.html">about</a></li>	

				<li><a class="font-large color-midnightblue" href="login.php">log in</a></li>	
			</ul>
		</nav>
	</div>

	<div class="content-main">
		<div style="height: 50px"></div>
		

		<?php
		session_start(); 
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "student";

		$conn = new mysqli($servername, $username, $password, $db);
		if ($conn->connect_error) {
			echo ("Connection failed: " . $conn->connect_error);
		}

		$sql = "select * from memo;";
		$result = $conn->query($sql);
		
		echo $conn->error;
		
		if ($result->num_rows > 0) {
			
			$i = 0;
			echo "<table>";
			while($row = $result->fetch_assoc()) {
				
				if ($i % 3 == 0) {
					echo "<tr>";
				}
				

				echo '<td class="memo-column">
				<div class="panel panel-default memo-panel">
					<div class="panel-heading">
						<h3 class="panel-title">'.$row["title"].'</h3>';
						if (isset($_SESSION['user'])) { 
							echo '<button type="button" class="btn btn-default remove-button" onclick="removeMemo('.$row["id"].')">
							<span class="glyphicon glyphicon-trash"></span>
						</button>'; 
					}
					echo '</div>
					<div class="panel-body">'
						.$row["body"].
						'<br>© '.$row["author"].'</div>
					</div>
				</td>';

				$i++;
			}
			echo "</table>";
		} 

		?>
	</div>

	<!-- Scripts are bellow -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/memo-edit.js"></script>

</body>
</html>