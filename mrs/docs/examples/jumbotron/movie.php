<!DOCTYPE html>
<html>

<head>
  <?php
  include 'config.php';
  session_start();

    //$useremail = $_SESSION['useremail'];
    //$userpass = $_SESSION['userpass'];
  $user_id = $_SESSION['uid'];
  $topic = 100;

  if (isset($_SESSION['loggedin'])) {
    include 'header2.php';
  } else {
    header('Location: /mrs/docs/examples/jumbotron/index.php');
  }

  $useremail = $_SESSION['useremail'];
  $userpass = $_SESSION['userpass'];



          //$query = "SELECT movie_id, name, date_released FROM project.movie WHERE movie_id <> 0";
  $query = "SELECT movie_id, name, EXTRACT(YEAR FROM date_released) FROM project.movie WHERE movie_id <> 0";

          //$query = "SELECT name, date_released FROM project.movie, project.movie_topics WHERE project.movie.movie_id = project.movie_topics.movie_id AND topic_id = $topic";



          // prepare statement
  $result = pg_query($dbconn, $query);
  $stmt = pg_prepare($dbconn,'ps',$query);
          //$result = pg_execute($dbconn,'ps',array());

  if (!$result) {
            # code...
    echo "SORRY, NO RESULT";
    die("Error in SQL query: " . pg_last_error());
  }

  ?>

</head>

<body>

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="page-header">Movies</h1>
      <p class="lead">If you are reading this, then I feel sorry for you because this is just a dummy text. I just have to put something here for now to make this website looks real. Since you reached this point and still reading my text, I would say you have no life and you better find something to do.</p>

        <!-- 
        <p>MovieBook helps you find movies you will like. Rate movies to build a custom taste profile, then MovieBook recommends other movies for you to watch.</p>
      -->
    </div>
  </div>



  <div class="container">

    <div class="well">
      <form id="frm-searchForm" class="form" method="post" action="" novalidate="">
        <div class="input-group text-center">
          <input id="frm-searchForm-search" class="form-control input-lg" type="text" placeholder="Search for movie..." required="" name="search">
          <span class="input-group-btn">
            <input class="btn btn-lg btn-primary" type="submit" value="Search" name="_submit">
          </span>
        </div>
        <input type="hidden" value="searchForm-submit" name="do">
      </form>
    </div>

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
          <img src="https://t2.gstatic.com/images?q=tbn:ANd9GcTpWy4LwpGv0kI5oLVVpmaWBtcuNK3n7STi5t3vmHqD9-1RphdY" class="">
          <div class="caption">
            <h4 class=""><?php echo $row[1]; ?>  <h5>  (<?php echo $row[2]; ?>)</h5></h4>
            <p class=""><b>Rate:</b> <?php echo $row[2]; ?>
              <p><!--<strong>Movie Type: --></strong>
                <span class="label label-info tags">Comedy</span> 
                <span class="label label-info tags">Action</span>
                <span class="label label-info tags">Drama</span>
                <span class="label label-info tags">Documantry</span>
              </p>
            </p>
            <a href="#" class="btn btn-default btn-xs pull-right" role="button"><i class="fa fa-edit"></i></a>  <a href="movie-details.php?movieid=<?php echo $row[0];?> 
            <?php /* store movie id in session */ $movieid = $row[0]; $_SESSION['movieid'] = $movieid;?>
            " class="btn btn-default btn-xs" role="button">Movie Info</a>
          </div>
        </div>
      </div>

      <?php } ?> <?php } ?>

<!--
    <div class="col-md-3">
      <div class="thumbnail card">
        <img src="https://t1.gstatic.com/images?q=tbn:ANd9GcSBVk8WbPz_d_5Vrn0WxyfgQ3IL7vrciB8g-1hvnl5hcdJnkltC" class="">
        <div class="caption">
          <h4 class="">Movie 1</h4>
          <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur,
            culpa itaque odio similique suscipit
          </p>
          <a href="#" class="btn btn-default btn-xs pull-right" role="button"><i class="fa fa-edit"></i></a>  <a href="#" class="btn btn-default btn-xs" role="button">More Info</a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="thumbnail card">
        <img src="https://t2.gstatic.com/images?q=tbn:ANd9GcSA2J_dPY-l7SeiKPPTPGOKYbC46ld4yoRSnS61PtN2PXAofjAG" class="">
        <div class="caption">
          <h4 class="">Movie 2</h4>
          <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur,
            culpa itaque odio similique suscipit
          </p>
          <a href="#" class="btn btn-default btn-xs pull-right" role="button"><i class="fa fa-edit"></i></a>  <a href="#" class="btn btn-default btn-xs" role="button">More Info</a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="thumbnail card">
        <img src="https://t0.gstatic.com/images?q=tbn:ANd9GcRQ_bKl7x8I5naYgTYT2a6UrKpfpaMYMaNiVSpgK4UP7zhK6T00" class="">
        <div class="caption">
          <h4 class="">Movie 3</h4>
          <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur,
            culpa itaque odio similique suscipit
          </p>
          <a href="#" class="btn btn-default btn-xs pull-right" role="button"><i class="fa fa-edit"></i></a>  <a href="#" class="btn btn-default btn-xs" role="button">More Info</a>
        </div>
      </div>
    </div>
  -->
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

