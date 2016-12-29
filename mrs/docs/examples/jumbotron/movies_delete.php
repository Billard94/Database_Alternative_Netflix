<!DOCTYPE html>
<html>

<head>
<?php
  session_start();

    //$username = $_SESSION['username'];
    //$email = $_SESSION['email'];


  if (isset($_SESSION['loggedin'])) {
    include 'header2.php';
  } else {
    header('Location: /mrs/docs/examples/jumbotron/index.php');
  }
?>
</head>

  <body>

<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="page-header">Movie listing</h1>
  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu justo a risus varius feugiat. Sed consectetur nulla venenatis purus dapibus, ac rhoncus tellus euismod. Proin suscipit a metus vitae malesuada. Curabitur ac mauris eget turpis pretium consectetur. Proin pulvinar varius consequat. Curabitur ac mauris elit. Pellentesque porta ipsum et lacus ultrices, ut elementum est tempus. Nunc id euismod velit, sit amet gravida sem.</p>
        
        <!-- 
        <p>MovieBook helps you find movies you will like. Rate movies to build a custom taste profile, then MovieBook recommends other movies for you to watch.</p>
        -->
              </div>
    </div>



<div class="container">
  
  <div class="well">
    <form id="frm-searchForm" class="form" method="post" action="/" novalidate="">
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
    <div class="col-md-3">
      <div class="thumbnail card">
        <img src="https://t2.gstatic.com/images?q=tbn:ANd9GcTpWy4LwpGv0kI5oLVVpmaWBtcuNK3n7STi5t3vmHqD9-1RphdY" class="">
        <div class="caption">
          <h4 class="">Movie 4</h4>
          <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur,
            culpa itaque odio similique suscipit
          </p>
          <a href="#" class="btn btn-default btn-xs pull-right" role="button"><i class="fa fa-edit"></i></a>  <a href="#" class="btn btn-default btn-xs" role="button">More Info</a>
        </div>
      </div>
    </div>
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

</html>
