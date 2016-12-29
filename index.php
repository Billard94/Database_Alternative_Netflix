<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <?php
  session_start();
  ?>
  

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Movie Recommender System (MRS)</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" name="useremail" id="useremail" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="userpass" id="userpass" placeholder="Password" class="form-control">
            </div>
            <button type="submit" name="login" id="login" class="btn btn-success">Sign in</button>
          </form>



        </div><!--/.navbar-collapse -->
      </div>
    </nav>



    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>MRS helps you find movies you will like. Rate movies to build a custom taste profile, then MRS recommends other movies for you to watch.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Register Now &raquo;</a></p>
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
        <p>&copy; March 2016, CSI2132 DATABASE I.</p>
        
         <!--CONNECT TO THE DATABASE-->
        <form class="navbar-form navbar-right" id="dbconnect" name="dbconnect" method="post" action="">
            <div class="form-group">
              <input type="text" name="iuser" id="iuser" placeholder="Database Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="ipass" id="ipass" placeholder="Database Password" class="form-control">
            </div>
            <button type="submit" name="bfetch" class="btn btn-success">Connect</button>
          </form>

<?php
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
