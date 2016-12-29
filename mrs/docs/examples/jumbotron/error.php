<!DOCTYPE html>
<html class="full" lang="en">
  <head>

        <meta http-equiv="refresh" content="4;url=/mrs/docs/examples/jumbotron/index.php" />

  </head>



  <body>

  <!--  CALLING SIGN-IN FORM IN THE HEADER -->
  <?php
  include 'header.php';
  ?>


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h2><b> Ooops, wrong email or password! </b> </h2>
        <p>You will be forwarded to try again.</p>
        <p><a class="btn btn-primary btn-lg" href="/mrs/docs/examples/jumbotron/index.php" role="button">Manual Direct &raquo;</a></p>
      </div>
    </div>





      <div class="container">
      <!-- Example row of columns -->
      <div class="row">
       
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
