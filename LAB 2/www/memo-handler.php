<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (!isset($_SESSION['user'])) {

		$memoID = $_POST["memoID"];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "student";

		$conn = new mysqli($servername, $username, $password, $db);
		if ($conn->connect_error) {
			echo ("Connection failed: " . $conn->connect_error);
		}

		$query = $conn->prepare('DELETE FROM memo WHERE id = ?');
		$query->bind_param('s', $memoID);

		if ($query->execute() === TRUE) {
			echo "Record deleted successfully";
		} else {
			echo "Error deleting record: " . $conn->error;
		}

		echo $query->error;
		$conn->close();
		exit(); 
	}

}


?>