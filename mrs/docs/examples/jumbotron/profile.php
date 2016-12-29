<!DOCTYPE html>
<html>



<head>
  <?php
  include 'config.php';
  session_start();

  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $user_id = $_SESSION['uid'];


  if (isset($_SESSION['loggedin'])) {
    include 'header2.php';
  } else {
    header('Location: /mrs/docs/examples/jumbotron/index.php');
  }


  $query = "SELECT t.description, COUNT(*) as cnt
  FROM project.profile p, project.watches w, project.movie m, project.movie_topics mt, project.topic t
  WHERE p.user_id = $user_id AND p.user_id = w.user_id AND w.movie_id = m.movie_id AND m.movie_id = mt.movie_id AND mt.topic_id = t.topic_id
  GROUP BY t.description
  ORDER BY cnt DESC
  LIMIT 3";

  $result = pg_query($dbconn, $query);
  $stmt = pg_prepare($dbconn,'ps',$query);

  if (!$result) {
            # code...
    echo "SORRY, NO RESULT";
    die("Error in SQL query: " . pg_last_error());
  }

  // number of movies watched by this user
  $query2 = "SELECT COUNT(*)
  FROM project.watches
  WHERE user_id = $user_id
  GROUP BY user_id";

  $result2 = pg_query($dbconn, $query2);
  $stmt2 = pg_prepare($dbconn,'ps2',$query2);

  if (!$result2) {
            # code...
    echo "SORRY, NO RESULT";
    die("Error in SQL query: " . pg_last_error());
  }

  // number of movies rated by this user
  $query3 = "SELECT COUNT(*)
  FROM project.watches w
  WHERE w.user_id = $user_id AND w.rating IS NOT NULL
  GROUP BY user_id";

  $result3 = pg_query($dbconn, $query3);
  $stmt3 = pg_prepare($dbconn,'ps3',$query3);

  if (!$result3) {
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
      <h2><b>Profile Details</b></h2>

        <!-- 
        <p>MovieBook helps you find movies you will like. Rate movies to build a custom taste profile, then MovieBook recommends other movies for you to watch.</p>
      -->

      <p><a class="btn btn-primary btn-lg" href="#" role="button">Edit profile &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <!--
        <div class="col-md-4">
    	<h2>Section 1</h2>
        	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
 			</p>
        </div>
      -->
        <!--<div class="col-md-4">
    	<h2>Section 2</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
			</p>
   </div>-->
   <div class="col-md-8">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-xs-10">
          <div class="well panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-12 col-sm-4 text-center">
                  <img src="https://tracker.moodle.org/secure/attachment/30912/f3.png" alt="" class="center-block img-circle img-thumbnail img-responsive">
                  <ul class="list-inline ratings text-center" title="Ratings">
                    <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                    <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                    <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                    <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                    <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                  </ul>
                </div>
                <!--/col--> 
                <div class="col-xs-12 col-sm-8">
                  <h2><?php echo $username ?></h2>
                  <p><strong>Email: </strong> <?php echo $email ?> </p>

                  <p><strong>Interests: </strong>

                    <?php 
                    while ($row=pg_fetch_array($result)) { ?>
                    <span class="label label-info tags"><?php echo $row[0];?></span>
                    <?php } ?>
                  </p>
                </div>
                <!--/col-->          
                <div class="clearfix"></div>
                <center><div class="col-xs-12 col-sm-4">
                  <?php 
                  if ($row2=pg_fetch_array($result2)) { ?>
                  <h2><strong> <?php echo $row2[0]; ?> </strong></h2>
                  <?php } ?>
                  <p><small>Movies Watched</small></p>
                  <a href="/mrs/docs/examples/jumbotron/my-movies.php" class="btn btn-success btn-block" role="button">My Movies</a>
                </div></center>
                <!--/col-->
                <center><div class="col-xs-12 col-sm-4">
                  <?php 
                  if ($row3=pg_fetch_array($result3)) { ?>
                  <h2><strong> <?php echo $row3[0]; $watched = $row3[0]; $points = $watched * 10; ?> </strong></h2>
                  <?php } ?>
                  <p><small>Movies Rated</small></p>
                  <a href="/mrs/docs/examples/jumbotron/my-ratings.php" class="btn btn-info btn-block" role="button"> My Ratings</a>
                </div></center>
                <!--/col-->
                <center><div class="col-xs-12 col-sm-4">
                  <h2><strong><?php echo $points; ?></strong></h2>
                  <p><small>Points Earned</small></p>
                  <button type="button" class="btn btn-primary btn-block"><span class="fa fa-gear"></span> My Points </button>  
                </div></center>
                <!--/col-->
              </div>
              <!--/row-->
            </div>
            <!--/panel-body-->
          </div>
          <!--/panel-->
        </div>
        <!--/col--> 
      </div>
      <!--/row--> 
    </div>
    <!--/container-->
  </div>
</div>

<hr>



<footer>

  <?php
  include 'footer.php';
  ?>


  <!--CONNECT TO THE DATABASE-->
        <!--
        <form class="navbar-form navbar-right" id="dbconnect" name="dbconnect" method="post" action="">
            <div class="form-group">
              <input type="text" name="iuser" id="iuser" placeholder="Database Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="ipass" id="ipass" placeholder="Database Password" class="form-control">
            </div>
            <button type="submit" name="bfetch" class="btn btn-success">Connect</button>
          </form>
        -->

        <?php

        function fmsg(){
          echo "You have entered the wrong email address or password! Please try again.";
        }

 /*

  //session_start();

  // Check if the login button was clicked and the login value is in the POST array object
  // if(array_key_exists('login', $_POST))
     if (array_key_exists('ipass', $_POST) && array_key_exists('iuser', $_POST))
    {

      // Connecting, selecting database    
      $dbconn = pg_connect("host=web0.site.uottawa.ca port=15432 dbname=".$_POST['iuser']." user=".$_POST['iuser']." password=".$_POST['ipass'])        
      or die('Could not connect: ' . pg_last_error());

      // Performing SQL query
      $query = 'SELECT * FROM project.actor';
      $result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML

      echo "<table>\n";
      while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
          echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
      }
      echo "</table>\n";

      // Free resultset
      pg_free_result($result);

      // Closing connection
      pg_close($dbconn);
    }
    */

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
