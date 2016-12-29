

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


<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>




          <!-- WEBSITE NAME -->
          <a class="navbar-brand" href="/mrs/docs/examples/jumbotron/index.php">MovieBook</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">




          <form class="navbar-form navbar-right" method="POST" action="">
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

<?php

//if (isset($_POST['login']) {
    if (array_key_exists('login', $_POST)) {
      session_start();
      $_SESSION['useremail'] = $_POST['useremail'];
      $_SESSION['userpass'] = $_POST['userpass'];
      header('Location: login.php');
      exit();

    //header('Location: search.php');
    //echo '<a href="login.php">Click to continue.</a>';
} else {
  //echo '<a href="index.php">SOMETHING WRONG HAPPENED! go to homepage.</a>';
    // form
    //header("location: /error.php");
    //header('Location: index.php');
}
?>