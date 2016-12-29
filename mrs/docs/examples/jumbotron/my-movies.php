<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<?php
include 'config.php';
session_start();

    //$useremail = $_SESSION['useremail'];
    //$userpass = $_SESSION['userpass'];
$user_id = $_SESSION['uid'];
  //$topic = 100;

if (isset($_SESSION['loggedin'])) {
  include 'header2.php';
} else {
  header('Location: /mrs/docs/examples/jumbotron/index.php');
}


$query = "SELECT w.movie_id, w.user_id, w.rating, w.date, m.name, m.picture_url 
FROM project.watches w, project.movie m 
WHERE w.user_id = $user_id AND w.movie_id = m.movie_id";
  //$query = "SELECT movie_id, name, EXTRACT(YEAR FROM date_released), picture_url FROM project.movie WHERE movie_id <> 0";

          // prepare statement
$result = pg_query($dbconn, $query);
$stmt = pg_prepare($dbconn,'ps',$query);
          //$result = pg_execute($dbconn,'ps',array());

if (!$result) {
            # code...
  echo "SORRY, NO RESULT. ";
  die("Error in SQL query: " . pg_last_error());
}
?>

<?php
if (array_key_exists('searchButton', $_POST) && (!empty($_POST['inputSearch']))){
  $_SESSION['search'] = $_POST['inputSearch'];
}
?>

<body>

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="page-header">My Movies</h1>
      <p class="lead">All the movies I have watched!</p>
    </div>
  </div>

<!--   <h2 class="sub-header">My Movies</h2> -->
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Picture</th>
          <th>Movie Name</th>
          <th>Date Watched</th>
          <th>My Rating</th>
        </tr>
      </thead>
      <tbody>

        <?php 
        $row_count = pg_num_rows($result);
        if ($row_count>0) {
          while ($row=pg_fetch_array($result)) { ?>

          <tr>
            <!-- <td><?php echo $row[0]; ?></td> -->
            <td><img class="img-responsive" height="150" width="75" src="<?php echo $row[5] ?>"><i class="btn btn-product fa fa-star"></i></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[2]; ?></td>
          </tr>

          <?php 
        } 
        ?>
        <?php 
      }
      ?>

    </tbody>
  </table>
</div>


<?php //include 'latest-users.php'; ?>


</div>
</div>
</div>


<!--/template-->
<!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>