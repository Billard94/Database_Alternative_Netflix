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

    <title>MRS</title>

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
        <meta http-equiv="refresh" content="3;url=/mrs/docs/examples/jumbotron/index.php" />

  </head>

  <?php

  //include 'config.php';
  //session_start();
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
          <a class="navbar-brand" href="/mrs/docs/examples/jumbotron/index.php">Movie Recommender System (MRS)</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" method="POST">
            <div class="form-group">
              <input type="text" name="useremail" id="useremail" placeholder="Email" class="form-control" required="">
            </div>
            <div class="form-group">
              <input type="password" name="userpass" id="userpass" placeholder="Password" class="form-control" required="">
            </div>
            <button type="submit" name="login" id="login" class="btn btn-success">Sign in</button>
          </form>



        </div><!--/.navbar-collapse -->
      </div>
    </nav>



    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h2>Your account has been created!</h2>
        <p>It is that easy. You will be redirected automatically to the homepage.</p>
        <p><a class="btn btn-primary btn-lg" href="/mrs/docs/examples/jumbotron/index.php" role="button">Manual Direct &raquo;</a></p>
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
        <p>&copy; April 2016, CSI2132 DATABASE I.</p>


<?php

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
