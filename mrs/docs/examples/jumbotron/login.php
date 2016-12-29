
<?php
session_start();

if (isset($_SESSION['useremail'])) {
    //echo $_SESSION['useremail'];
} else { header('Location: index.php'); }

include 'config.php';

$useremail = $_SESSION['useremail'];
$userpass = $_SESSION['userpass'];

//$query = "SELECT first_name, last_name, email, country FROM project.profile WHERE email=$1 AND password = $2";
$query = "SELECT user_id, first_name, last_name, email, country FROM project.profile WHERE email=$1 AND password = $2";
$stmt = pg_prepare($dbconn,"ps",$query);
$result = pg_execute($dbconn,"ps",array($useremail, $userpass));

if (!$result) {
  //echo "SORRY, NO RESULT";
  die("Error in SQL query: " . pg_last_error());
}

$row_count = pg_num_rows($result);
if ($row_count>0) {
 while ($userinfo= pg_fetch_array($result)){
  // get user info and store them in php variables
  $user_id = $userinfo[0];
  $first_name = $userinfo[1];
  $last_name = $userinfo[2];
  $email = $userinfo[3];
  $country = $userinfo[4];
}

// USER INFO
$_SESSION['uid'] = $user_id;
$_SESSION['username'] = ($first_name." ".$last_name);
$_SESSION['email'] = $email;
$_SESSION['loggedin'] = "YES"; 

header("location: /mrs/docs/examples/jumbotron/index.php");
} else {
  // destroy the session
  session_destroy(); //destroy the session
  // Free resultset
  pg_free_result($result);
	// Closing connection
  pg_close($dbconn);
	// transfer user to error page
  header("location: /mrs/docs/examples/jumbotron/error.php");
}

// Free resultset
pg_free_result($result);
// Closing connection
pg_close($dbconn);

?>
