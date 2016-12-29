<!DOCTYPE html>
<html>

<head>
  <?php
  include 'config.php';

  # DO THIS WHEN THE USER CLICK {SEARCH} BUTTON
  if (array_key_exists('search-button', $_GET)) {
    # STORE SEARCH KEYWORDS IN THE SESSION AND IMPLEMENT {SEARCH.PHP}
    $_SESSION['search'] = $_GET['search-box'];
    $movie = $_GET['search-box'];
    $search_option = $_GET['search-option'];
    header("Location: search.php?movie=$movie&option=$search_option");
      //exit();
  }

  session_start();

    /*
    $useremail = $_SESSION['useremail'];
    $userpass = $_SESSION['userpass'];
    */

    $user_id = $_SESSION['uid'];

    if (isset($_SESSION['loggedin'])) {
      include 'header2.php';
    } else {
      header('Location: /mrs/docs/examples/jumbotron/index.php');
    } 

    //$query = "SELECT movie_id, name, date_released FROM project.movie WHERE movie_id <> 0";
    //$query = "SELECT movie_id, name, EXTRACT(YEAR FROM date_released), picture_url FROM project.movie";
    //$query = "SELECT m.movie_id, m.name, EXTRACT(YEAR FROM m.date_released), m.picture_url, t.topic_id, q.description FROM project.movie m, project.movie_topics t, project.topic q WHERE t.topic_id = q.topic_id";

    $query = "SELECT m.movie_id, m.name, EXTRACT(YEAR FROM m.date_released), m.picture_url, ROUND(AVG(w.rating),1) FROM project.movie m, project.watches w WHERE m.movie_id = w.movie_id GROUP BY m.movie_id, m.name, EXTRACT(YEAR FROM m.date_released), m.picture_url";

    //$query2 = "SELECT t.topic_id, q.description FROM project.movie m, project.movie_topics t, project.topic q WHERE t.topic_id = q.topic_id";

    //$query = "SELECT name, date_released FROM project.movie, project.movie_topics WHERE project.movie.movie_id = project.movie_topics.movie_id AND topic_id = $topic";


    // prepare statement
    $result = pg_query($dbconn, $query);
    $stmt = pg_prepare($dbconn,'ps',$query);

    //$result = pg_execute($dbconn,'ps',array());

    if (!$result) {
      die("Error in SQL query: " . pg_last_error());
    }

    /*
    if (array_key_exists('search-button', $_POST) && (!empty($_POST['search-box']))){
      $search_words = $_POST['search-box'];
      $_SESSION['search'] = $search_words;
    }
    */

    ?>

  </head>

  <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="page-header">Movies</h1>
        <p class="lead">If you are reading this, then I feel sorry for you because this is just a dummy text. I just have to put something here for now to make this website looks real. Since you reached this point and still reading my text, I would say you have no life and you better find something to do.</p>
      </div>
    </div>

    <div class="container">

      <!-- INCLUDE SEARCH-BOX -->
      <?php if (isset($_SESSION['loggedin'])) { include 'search-box.php';} ?>
      <!-- / INCLUDE SEARCH-BOX -->

      <div class="row">
        <!-- LOOP through the results -->
        <?php $row_count = pg_num_rows($result);
        if ($row_count>0) { ?>

        <style media="all">
          h4,h5 {display: inline;}
        </style>

        <?php 
        while ($row=pg_fetch_array($result)) { ?>
        <div class="col-md-3">
          <div class="thumbnail card">
            <img src="<?php echo $row[3]; ?>" style="width:300px;height:400px;" class="">
            <div class="caption">
              <h4 class=""><?php echo $row[1]; ?>  <h5>  (<?php echo $row[2]; ?>)</h5></h4>
              <p class=""><b>Rate:  </b><span class="label label-info tags"><?php echo $row[4]; ?></span> 

              </p>
            </p>
            <a href="#" class="btn btn-default btn-xs pull-right" role="button"><i class="fa fa-edit"></i></a>  <a href="movie-details.php?movieid=<?php echo $row[0];?> 
            <?php /* store movie id in session */ $movieid = $row[0]; $_SESSION['movieid'] = $movieid;?>
            " class="btn btn-default btn-xs" name=$movieid role="button">Movie Info</a>
          </div>
        </div>
      </div>

      <?php } ?> <?php } ?>

    </div>
    <!--/row-->
  </div>
  <!--/container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    
  </body>


  <?php 
  // free memory
  pg_free_result($result);

  // close connection
  pg_close($dbconn);
  ?>

  </html>
