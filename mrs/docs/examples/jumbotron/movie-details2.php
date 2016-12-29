<!DOCTYPE html>
<html>

<head>
	<?php
	include 'config.php';
	session_start();

    //$useremail = $_SESSION['useremail'];
    //$userpass = $_SESSION['userpass'];
	$movie_id = $_GET['movieid'];
	//$topic = 100;

	if (isset($_SESSION['loggedin'])) {
		//$movie_id = $_SESSION['movieid'];
		include 'header2.php';
	} else {
		header('Location: /mrs/docs/examples/jumbotron/index.php');
	}

	$useremail = $_SESSION['useremail'];
	$userpass = $_SESSION['userpass'];



    //$query = "SELECT movie_id, name, date_released FROM project.movie WHERE movie_id <> 0";
	$query = "SELECT name, date_released, picture_url, description FROM project.movie WHERE movie_id = $movie_id";

    //$query = "SELECT name, date_released FROM project.movie, project.movie_topics WHERE project.movie.movie_id = project.movie_topics.movie_id AND topic_id = $topic";



    // prepare statement
	$result = pg_query($dbconn, $query);
	$stmt = pg_prepare($dbconn,'ps',$query);
    //$result = pg_execute($dbconn,'ps',array());

	if (!$result) {
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
			<h1 class="page-header">Movies</h1>
			<p class="lead">If you are reading this, then I feel sorry for you because this is just a dummy text. I just have to put something here for now to make this website looks real. Since you reached this point and still reading my text, I would say you have no life and you better find something to do.</p>

        <!-- 
        <p>MovieBook helps you find movies you will like. Rate movies to build a custom taste profile, then MovieBook recommends other movies for you to watch.</p>
    -->
</div>
</div>


<?php 
			while ($row=pg_fetch_array($result)) { ?>					
<div class="container-fluid">
	<div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">	
				<div class="col-md-12">
					<div class="product col-md-3 service-image-left">

						<center>
<img id="item-display" src="<?php echo $row[2]; ?>" alt=""></img>
						</center>
					</div>
<!--					
					<div class="container service1-items col-sm-2 col-md-2 pull-left">
						<center>
							<a id="item-1" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
							<a id="item-2" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
							<a id="item-3" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
						</center>
					</div>
				</div>
			-->
			
			<div class="col-md-7">
				<div class="product-title"><h2><?php echo $row[0]?></h2></div>
				<div class="product-desc"><b> Released date: </b><?php echo $row[1]?></div>
				<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
				<hr>
				<div class="product-price"><b>Director: </b> DIRECTOR NAME</div>
				<div class="product-stock"><b>Cast: </b>NAME, NAME, NAME</div>
				<hr>
				<div class="btn-group cart">
					<button type="button" class="btn btn-success">
						Mark as Watched 
					</button>
				</div>
				<div class="btn-group wishlist">
					<button type="button" class="btn btn-danger">
						Add to wishlist 
					</button>
				</div>
			</div>
		</div> 
	</div>
	<div class="container-fluid">		
		<div class="col-md-12 product-info">
			<ul id="myTab" class="nav nav-tabs nav_tabs">

				<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
				<li><a href="#service-two" data-toggle="tab">PRODUCT INFO</a></li>
				<li><a href="#service-three" data-toggle="tab">REVIEWS</a></li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade in active" id="service-one">

					<section class="container product-info">
						<br>
						<b class="lead"><?php echo $row[3]; ?></b>
					</section>
					<?php } ?>
				</div>
				<div class="tab-pane fade" id="service-two">

					<section class="container">

					</section>

				</div>
				<div class="tab-pane fade" id="service-three">

				</div>
			</div>
			<hr>
		</div>
	</div>
</div>
</div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    
</body>

<?php 
          // free memory
pg_free_result($result);

          // close connection
pg_close($dbconn);
?>

<div class="container">
	<hr>
	<footer><?php include 'footer.php'; ?>



	</footer>
</div> <!-- /container -->


</html>

