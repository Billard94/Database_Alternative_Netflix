
<?php
# connect to the database
include 'config.php';
session_start();

# GET NEEDED INFO FOR INSERTION QUERY
$user_id = $_GET['user'];
$movie_id = $_GET['movieid'];
# REDIRECT USER TO THE MOVIE PAGE ONCE DONE!
header('Location: movie-details.php?movieid='.$movie_id);

# QUERY1: INSERT THE USER HAVE WATCHED THIS MOVIE INTO THE WATCHES TABLE
$query = "INSERT INTO project.watches (user_id, movie_id, date) VALUES ('$user_id', '$movie_id', now())";

# PREPARE STATEMENT 1
$stmt = pg_prepare($dbconn,"ps",$query);
$result = pg_query($dbconn, $query);
# CHECK FOR RESULT 1
if (!$result) { die("Error in SQL query: " . pg_last_error());}
# FREE MEMORY
pg_free_result($result);
# CLOSE CONNECTION
pg_close($dbconn);
?>
