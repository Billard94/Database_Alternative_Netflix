
<?php
/*
session_start();

if (!isset($_SESSION['email'])){
	echo "Please ". "<a href='index.php'>Login</a>";
	exit;
}

include 'config.php';

$studentnum = $_SESSION['email'];

// QUERY
$sql = 'SELECT * FROM project.user WHERE email = $1';

$stmt = pg_prepare($dbconn,"ps",$sql);
$result = pg_execute($dbconn,"ps",array($studentnum));

if (!$result) {
	# code...
	die(("Error in SQL query: "). pg_last_error());
}
	// free memory
	pg_free_result($result);

	// close connection
	pg_close($dbconn);

*/
?>

<!DOCTYPE html>
<html>
<head>
	<?php 
	include 'header.php';
	include 'config.php';

	session_start();
	if (isset($_SESSION['result'])) {
	$result = $_SESSION['result'];
	}

	 ?>
	<title></title>
</head>
<body>

<div id="header"> <h1><br><b>Profile Details </b></h1></div>
	<table> 
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Year Born</th>
		</tr>
		
	<?php	
		if (!$result) {
            # code...
            echo "SORRY, NO RESULT. <br> <br>";
            die("Error in SQL query: " . pg_last_error());
          }
    ?>

	<!-- LOOP through the results -->
	<?php while ($row=pg_fetch_array($result, null, PGSQL_ASSOC)) { ?>
		<tr>
			<td><?php echo $row[0]; ?></td>
			<td><?php echo $row[1]; ?></td>
			<td><?php echo $row[2]; ?></td>
			<td><?php echo $row[3]; ?></td>
			<td><?php echo $row[4]; ?></td>
		</tr>
		<?php } ?>
	</table>
	<br/>
	<br/><a href="update_profile.php?useremail=<?php $useremail; ?>"> Update Profile</a>

</body>
</html>