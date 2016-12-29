<?php

	session_start();

	if (!isset($_SESSION['useremail'])) {
		# code...
		echo "Please "."<a href='index.php'>Login </a>";
		exit;
	}
	include 'config.php';
	$useremail = $_SESSION['useremail'];

	// QUERY
	$sql = "SELECT user_id, first_name, last_name, email, gender, year_born FROM project.profile WHERE email = $useremail";

	$stmt = pg_prepare($dbconn, "ps", $sql);
	$result = pg_execute($dbconn,"ps",array($useremail));

	if (!$result) {
		# code...
		die("ERROR IN SQL QUERY: " . pg_last_error());
	}

	$_SESSION['result'] = $result;

	// free memory
	pg_free_result($result);

	// close connection
	pg_close($dbconn);
?>