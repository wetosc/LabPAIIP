<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user']) ) {

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "student";	

	$conn = new mysqli($servername, $username, $password, $db);
	if ($conn->connect_error) {
		echo ("Connection failed: " . $conn->connect_error);
	}

	$q_author = $_SESSION['username'];
	$q_title = $_POST["title"];
	$q_body = $_POST["body"];

	$query = $conn->prepare('INSERT INTO memo (title, body, author) VALUES(?,?,?)');
	$query->bind_param('sss', $q_title, $q_body, $q_author);

	$query->execute();

	echo $conn->error;
	header('Location: memo.php');
}

?>

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

	<title>Add Memo</title>
</head>

<body class="bg-orange">

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

		<div class="center-container bg-alizarn center-block">
			<h2>
				Create new memo
			</h2>
			<form action="memo-create.php" method="POST">
				<div class="form-group">
					<label for="memo-title">Title</label>
					<input type="text" class="form-control" id="memo-title" placeholder="Memo title" name="title" required>
				</div>
				<div class="form-group">
					<label for="memo-body">Body</label>
					<textarea class="form-control" id="memo-body" placeholder="Memo Body" name="body"></textarea>
				</div>
				<button type="submit" class="btn btn-primary center-block">Create</button>
			</form>

		</div>
	</div>

	<!-- Scripts are bellow -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>