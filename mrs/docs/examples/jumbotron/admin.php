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

  <title>MovieBook Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">

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
    include 'config.php';
    if (!isset($_SESSION))
    {
      session_start();
    }

    $latest_movies_query = "SELECT movie_id, name, date_released FROM project.movie ORDER BY movie_id DESC LIMIT 5;";

          // prepare statement
    $latest_movies_result = pg_query($dbconn, $latest_movies_query);
    $stmt = pg_prepare($dbconn,'ps',$latest_movies_query);
          //$result = pg_execute($dbconn,'ps',array());

    if (!$latest_movies_query) {
            # code...
      echo "SORRY, NO RESULT";
      die("Error in SQL query: " . pg_last_error());
    }
    ?>


    <body>

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">MovieBook Dashboard</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Settings</a></li>
              <li><a href="/mrs/docs/examples/jumbotron/logout.php">Logout</a></li>
            </ul>
            <form class="navbar-form navbar-right">
              <input type="text" class="form-control" placeholder="Search...">
            </form>
          </div>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
              <li><a href="#">Reports</a></li>
              <li><a href="#">Analytics</a></li>
              <li><a href="#">Export</a></li>
            </ul>
            <ul class="nav nav-sidebar">
              <li><a href="">Nav item</a></li>
              <li><a href="">Nav item again</a></li>
              <li><a href="">One more nav</a></li>
              <li><a href="">Another nav item</a></li>
              <li><a href="">More navigation</a></li>
            </ul>
            <ul class="nav nav-sidebar">
              <li><a href="">Nav item again</a></li>
              <li><a href="">One more nav</a></li>
              <li><a href="">Another nav item</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>

            <!-- DISPLAY ALART MESSAGE -->
            <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php 
              if (isset($_SESSION['message'])){
                $msg = $_SESSION['message'];
                echo $msg; 
              } else {echo "Welcome!";} ?>
            </div>


            <div class="row placeholders">
              <div class="col-xs-6 col-sm-3 placeholder">
                <?php 
                include 'new-user.php'; 

                ?>
              </div>
              <div class="col-xs-6 col-sm-3 placeholder">
                <?php include 'new-movie.php'; ?>
              </div>
              <div class="col-xs-6 col-sm-3 placeholder">
                <?php include 'new-actor.php'; ?>
              </div>
              <div class="col-xs-6 col-sm-3 placeholder">
                <?php include 'new-director.php'; ?>
              </div>
            </div>


            <h2 class="sub-header">Latest Movies</h2>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Movie Name</th>
                    <th>Date Released</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $row_count = pg_num_rows($latest_movies_result);
                  if ($row_count>0) {
                    while ($row=pg_fetch_array($latest_movies_result)) { ?>

                    <tr>
                      <td><?php echo $row[0]; ?></td>
                      <td><?php echo $row[1]; ?></td>
                      <td><?php echo $row[2]; ?></td>
                      <td>
                      
                        <button type="button" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </button>

                        <button type="button" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </button>

                        <button type="button" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>

                      </td>
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>
