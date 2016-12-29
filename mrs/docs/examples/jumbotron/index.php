<!DOCTYPE html>
<html class="full" lang="en">



<?php




/*       

        // check if login button was clicked 
        if (array_key_exists('login', $_POST)) {
          # code...
          $useremail = $_POST['useremail'];
          $userpassword = $_POST['userpass'];

          // get database connection
          include 'config.php';

          // query
          $query = "SELECT * FROM project.profile p WHERE p.email=$1 AND p.password=$2";
          
          // prepare statement
          $stmt = pg_prepare($dbconn,"ps",$query);
          $result = pg_execute($dbconn,"ps",array($useremail, $userpassword));


          if (!$result) {
            # code...
            fmsg();
            die("Error in SQL query: " . pg_last_error());

            // check row count if row counts is greater than 0 records exists 
            $row_count = pg_num_rows($result);
            if ($row_count>0) {
              # code...

              // keep user info accross pages and redirect to record page
              $_SESSION['useremail'] = $useremail;

              header("location: /records.php");
            }
          }
        }    

        */   

        ?>
        
        <body>
          <!--  CALLING SIGN-IN FORM IN THE HEADER -->
          <?php
          session_start();

          if (isset($_SESSION['loggedin'])) {
            include 'header2.php';
    //$_SESSION['uid'] = $user_id;
          } else {
            include 'header.php';
          }
          ?>


          <!-- Main jumbotron for a primary marketing message or call to action -->
          <div class="jumbotron">
            <div class="container">
              <h1>MovieBook</h1>
              <p>MovieBook helps you find movies you will like. Rate movies to build a custom taste profile, then MovieBook recommends other movies for you to watch.</p>
              
    <?php // if the user is logged in, then change the registration button in homepage

    if (isset($_SESSION['loggedin'])) { ?>
    
    <p><a class="btn btn-primary btn-lg" href="#" role="button"><?php echo "Browse Movies" ?> &raquo;</a></p>
    <?php } else {?> 
    <p><a class="btn btn-primary btn-lg" href="/mrs/docs/examples/jumbotron/register.php" role="button">Register Now &raquo;</a></p>
    
    <?php } ?>
    

  </div>
</div>

<div class="container">
  <!-- Example row of columns -->
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
