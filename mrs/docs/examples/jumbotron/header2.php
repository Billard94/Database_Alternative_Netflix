

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <!-- title shown in the browser tab -->
  <title>MovieBook</title>

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
  //session_start();
    $username = $_SESSION['username'];
    ?>


    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
<!--        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        --> </div></nav>

        <!-- WEBSITE NAME -->
<!--          <a class="navbar-brand" href="/mrs/docs/examples/jumbotron/index.php">MovieBook</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        -->

        <!-- Collect the nav links, forms, and other content for toggling -->
<!--
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Search</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">My Movies</a></li>
            <li><a href="#">My Ratings</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/mrs/docs/examples/jumbotron/profile.php">My Account</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/mrs/docs/examples/jumbotron/logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <p class="navbar-text"><span class="welcome">Welcome, <?php echo $username ?>!</span>
        </div>

      </div>
    </nav>
  -->


  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/mrs/docs/examples/jumbotron/index.php">MovieBook</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/mrs/docs/examples/jumbotron/index.php">Home <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Search</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Discover <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/mrs/docs/examples/jumbotron/my-movies.php">My Movies</a></li>
              <li><a href="#">My Ratings</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/mrs/docs/examples/jumbotron/movies.php">Browse All Movies</a></li>
              <li><a href="#">Top 10 Directors</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/mrs/docs/examples/jumbotron/most-watched-movies.php">Most Watched Movies</a></li>
              <li><a href="/mrs/docs/examples/jumbotron/best-rated-movies.php">Best Rated Movies</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>


        <ul class="nav navbar-nav navbar-right">
          <p class="navbar-text"><span class="welcome">Welcome, <?php echo $username ?>!</span>

            <!-- <li><a href="#">Link</a></li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/mrs/docs/examples/jumbotron/profile.php">My Account</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/mrs/docs/examples/jumbotron/logout.php">Logout</a></li>

              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>