<!DOCTYPE html>
<html class="full" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">
  <title>MovieBook</title>
  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <link href="jumbotron.css" rel="stylesheet">
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
</head>

<?php
# DATABASE CONNECTION
session_start();
include 'config.php';

# INCLUDE PAGE HEADER
if (isset($_SESSION['loggedin'])) { include 'header2.php'; } else { echo "no user_id in the session";}

# GET INFO FOR SEARCHING
$what_you_are_searching_for = $_GET['movie'];
$search_option = $_GET['option'];

# DEBUG
echo " GET is: ".$what_you_are_searching_for;
echo " Search option is: " .$search_option;

# CHECK IF SEARCH VARIABLE IS IN THE SESSION
if (isset($_SESSION['search'])) {

/* 
CHECK THE SEARCH OPTION: 
(0 = ALL) 
(1 = MOVIES) 
(2 = ACTORS) 
(3 = DIRECTORS) 
(4 = RELEASE YEAR) 
*/

  # MOVIES
if ($search_option == 1){
  $query = "SELECT movie_id, name, date_released, picture_url, description 
  FROM project.movie 
  WHERE name ILIKE '%".$what_you_are_searching_for."%'";
}

  # ACTORS
else if ($search_option == 2){
  $query = "SELECT a.actor_id, a.first_name, a.last_name, a.date_of_birth
  FROM project.actor a 
  WHERE a.first_name ILIKE '%".$what_you_are_searching_for."%'";
}

  # DIRECTORS
else if ($search_option == 3){
  $query = "SELECT movie_id, name, date_released, picture_url, description 
  FROM project.movie 
  WHERE name ILIKE '%".$what_you_are_searching_for."%'";
}

  # RELEASE YEAR
else if ($search_option == 4){
  $query = "SELECT movie_id, name, date_released, picture_url, description 
  FROM project.movie 
  WHERE name ILIKE '%".$what_you_are_searching_for."%'";
}

# ALL
else {  
    $query = "SELECT movie_id, name, date_released, picture_url, description 
    FROM project.movie 
    WHERE name ILIKE '%".$what_you_are_searching_for."%'";
  }

  # PREPARE STATEMENT 
  $stmt = pg_prepare($dbconn,"ps",$query); $result = pg_query($dbconn, $query);
  if (!$result) { die("Error in SQL query: " . pg_last_error());}

  } // END OF SEARCH OPTIONS
  ?>


  <body>


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <center> <h2>Search Results</h2> </center>
        <!--<center><p>What are you looking for?</p></center>-->
      </div>

<!--
      <div class="container">
  <div class="row">
    <div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search for a movie, actor, director ..." />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control">
                                        <option value="0" selected>All Sections</option>
                                        <option value="1">Movies</option>
                                        <option value="2">Directors</option>
                                        <option value="3">Cast</option>
                                        <option value="4">Production Year</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Author</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Contains the words</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button name="isearch" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
  </div>
</div>
-->


<!-- <div class="container">
  <div class="row">
    <br /><br />
    <form id="togglingForm" method="post" class="form-horizontal" action="" method="GET">
      <div class="form-group">
        <div class="col-xs-9">
          <input type="text" class="form-control" name="search"
          required data-fv-notempty-message="Tell us what you are looking for!" placeholder="What are you looking for?" /> <br />

          <label class="radio-inline">Search: </label>  
          <label class="radio-inline">
            <input type="radio" name="isoption" value="terrible" checked='checked' /> All
          </label>
          <label class="radio-inline">
            <input type="radio" name="isoption" value="terrible" /> Movie
          </label>
          <label class="radio-inline">
            <input type="radio" name="isoption" value="terrible" /> Actor/Actress
          </label>
          <label class="radio-inline">
            <input type="radio" name="isoption" value="terrible" /> Director
          </label>
          <label class="radio-inline">
            <input type="radio" name="isoption" value="terrible" /> Release Year
          </label>

        </div>

        <div class="col-xs-2">
          <button name="isearch" type="submit" class="btn btn-success" data-toggle="#jobInfo">Search</button>
        </div>
      </div>
    </form>
  </div>
</div> -->

</div>


<!-- PHP CODE WAS HERE BUT MOVED TO RESULTS PAGE -->
<!-- <h2 class="sub-header">Search Results</h2>-->
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <?php if ($search_option == 0){ ?>
      <tr>
        <th>ID</th>
        <th>Movie Name</th>
        <th>Date Released</th>
        <th>Picture</th>
      </tr>
      <?php } else if ($search_option != 0){?>
      <tr>
        <th> </th>
        <th> </th>
        <th> </th>
        <th> </th>
      </tr>
      <?php }?>

    </thead>
    <tbody>

      <?php 
      $row_count = pg_num_rows($result);
      if ($row_count>0) {
        while ($row=pg_fetch_array($result)) { ?>

        <tr>
          <td><?php echo $row[0]; ?></td>
          <!-- <td><?php echo $row[1]; ?></td> -->
          <td>
          </a>  <a href="movie-details.php?movieid=<?php echo $row[0];?> 
          <?php /* store movie id in session  $movieid = $row[0]; $_SESSION['movieid'] = $movieid; */ ?>
          " class="" name=$movieid role="button"> <?php echo $row[1]; ?> </a>
        </td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
      </tr>

      <?php 
    } 
    ?>
    <?php 
  } else {
    echo "No results found in the database!";
  }
  ?>

</tbody>
</table>
</div>


<?php //include 'latest-users.php'; ?>


</div>
</div>
</div>

<div class="container">
  <!-- Example row of columns -->
    <!--
      <div class="row">
        <div class="col-md-4">
          <h2>Ahmed Al Abdulmohsen</h2>
          <p>Software Engineering <br> #######</p>
        </div>
        <div class="col-md-4">
          <h2>Alexandre Billard</h2>
          <p>Computer Science <br> #######</p>
       </div>
        <div class="col-md-4">
          <h2>Maxime Daneau</h2>
          <p>Computer Science <br> #######</p>
        </div>
      </div>
    -->
    <hr>

    <footer>
      <?php
      include 'footer.php';
      echo $_SESSION['uid'];

      if(!empty($_SESSION['data'])){
        echo "echo data here:".$data;} else {echo "$ data is empty!";}
        ?>


      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


  </body>


  </html>
