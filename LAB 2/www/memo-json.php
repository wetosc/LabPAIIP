<?php
session_start(); 
if (isset($_SESSION['user'])) {

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
	$memos = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$memos[] = array('id' => $row['id'], 'title' => $row['title'], 'body' => $row['body'], 'author' => $row['author']);
		}
	}
	$response = array();

	$response['posts'] = $memos;

	$fp = fopen('memo.json', 'w');
	fwrite($fp, json_encode($response));
	fclose($fp);
	header("Location: memo.json");
}
?>