<?php
// include the configration file to connect to the database
session_start();
include 'config.php';

$user_id = $_SESSION['uid'];
echo "user id is: " . $user_id;
$search_words = $_SESSION['search'];
// including the page header
//if (isset($_SESSION['loggedin'])) { include 'header2.php'; } else { echo "no user_id in the session";}

// storing the search words in a variable
if (isset($_SESSION['search'])) {
  $data = $_SESSION['search'];

  // $query = "SELECT username FROM member WHERE username LIKE '%".$search."%'";
  $query = " SELECT movie_id, name, date_released, picture_url, description
  FROM project.movie
  WHERE name = $data ";
  /* WHERE name LIKE '%".$data."%' "; */


  $stmt = pg_prepare($dbconn,'ps',$query);
  //$result = pg_execute($dbconn,'ps',array($data));
  $result = pg_query($dbconn, $query);

  if (!$result) { die("Error in SQL query: " . pg_last_error());} 

  $row_count = pg_num_rows($result);
  if ($row_count>0) {
    while ($row=pg_fetch_array($result)) { 

      $_SESSION['movie_id']      = $row[0];
      $_SESSION['movie_name']    = $row[1];
      $_SESSION['movie_date']    = $row[2];
      $_SESSION['movie_picture'] = $row[3];

      $movie_name_echo = $_SESSION['movie_name'];
      echo $movie_name_echo;
    } // END OF WHILE
  } // END OF IF 
} // END OF IF ISSET
// if nothing is set in the search session
else {
  echo "Nothing is set in the search session!";
} // END OF ELSE

?>