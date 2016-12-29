<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <link href="css/styles.css" rel="stylesheet">


      <!-- PHP CODE -->
      <?php
      # INCLUDE DATABASE CONNECTION AND HEADER AND START SESSION W/ MOVIE_ID & USER_ID
      include 'config.php';
      session_start();

      $movie_id = $_GET['movieid'];
      //echo $movie_id;
      $user_id = $_SESSION['uid'];

      # SHOW HEADER1 OR HEADER2
      if (isset($_SESSION['uid'])) {
        include 'header2.php';

      ##################################################################################

      # QUERY1: GET MOVIE INFORMATION FROM THE DATABASE
        $query = "SELECT m.name, m.date_released, m.picture_url, m.description 
        FROM project.movie m
        WHERE m.movie_id = $movie_id";

      # PREPARE STATEMENT 1
        $result = pg_query($dbconn, $query);
        $stmt = pg_prepare($dbconn,'ps',$query);

      # CHECKING FOR RESULT 1
        if (!$result) {echo "SORRY, NO RESULT"; die("Error in SQL query: " . pg_last_error());} 

      # QUERY2: GET MOVIE TOPICS FROM THE DATABASE
        $query2 = "SELECT q.description 
        FROM project.movie m, project.movie_topics t, project.topic q
        WHERE m.movie_id = $movie_id AND t.topic_id = q.topic_id";      

      # PREPARE STATEMENT 2
        $result2 = pg_query($dbconn, $query2);
        $stmt2 = pg_prepare($dbconn,'ps2',$query2);

      # CHECKING FOR RESULT 2
        if (!$result2) {echo "SORRY, NO RESULT"; die("Error in SQL query: " . pg_last_error());}

      ##################################################################################

      # ADD RATING
      # DO THIS WHEN THE USER CLICK {RATE} BUTTON
        if(array_key_exists('rate-button', $_POST)){
          $rating = $_POST['inputRating'];

        # QUERY3: INSERT THE USER RATING FOR THIS MOVIE
          // $query3 = "INSERT INTO project.watches (user_id, movie_id, rating) 
          // VALUES ('$user_id', '$movie_id', $rating)";

          $query3 = "UPDATE project.watches
          SET rating=$rating
          WHERE movie_id=$movie_id AND user_id = $user_id";

        # PREPARE STATEMENT 3
          $stmt3 = pg_prepare($dbconn,"ps3",$query3);
          $result3 = pg_query($dbconn, $query3);
        # CHECK FOR RESULT 1
          if (!$result3) { die("Error in SQL query: " . pg_last_error());}
        }

      # DO THIS WHEN THE USER CLICK {MARK AS WATCHED} BUTTON
      // if (array_key_exists('watch-button', $_POST)) {header('Location: watches.php');}

    //$query = "SELECT movie_id, name, date_released FROM project.movie WHERE movie_id <> 0";
    //$result = pg_execute($dbconn,'ps',array());

      ##################################################################################

      # ADD COMMENTS
      # DO THIS WHEN THE USER CLICK {ADD-COMMENT} BUTTON
        if(array_key_exists('add-comments-button', $_POST)){
          $comments = $_POST['inputComments'];
          $movie_id = $_POST['movieid'];
          //echo "string1";

        # QUERY4: INSERT THE USER RATING FOR THIS MOVIE
          $query4 = "INSERT INTO project.comments (user_id, movie_id, comment_text, comment_date) 
          VALUES ('$user_id', '$movie_id', '$comments', now())";
        # PREPARE STATEMENT 4
          $stmt4 = pg_prepare($dbconn,"ps4",$query4);
          $result4 = pg_query($dbconn, $query4);
          //echo "string2";

        # CHECK FOR RESULT 4
          if (!$result4) { die("Error in SQL query: " . pg_last_error());}
      } // END OF IF STATEMENT
      ##################################################################################

      # GET COMMENTS
      # QUERY5: GET MOVIE INFORMATION FROM THE DATABASE
      $query5 = "SELECT c.comment_text, c.comment_date, p.first_name, p.last_name 
      FROM project.comments c, project.profile p
      WHERE c.movie_id = $movie_id AND p.user_id = $user_id";

      # PREPARE STATEMENT 5
      $result5 = pg_query($dbconn, $query5);
      $stmt5 = pg_prepare($dbconn,'ps5',$query5);

      # CHECKING FOR RESULT 5
      if (!$result5) {echo "SORRY, NO RESULT"; die("Error in SQL query: " . pg_last_error());} 

      ##################################################################################

      # CHECK IF WATCHED
      # QUERY6: CHECK IF THE USER HAVE WATCHED THIS MOVIE
      $query6 = "SELECT w.date, COUNT(*)
      FROM project.watches w WHERE $user_id = user_id AND $movie_id = movie_id GROUP BY w.date";

      # PREPARE STATEMENT 6
      $isWatched = pg_query($dbconn, $query6);
      $stmt6 = pg_prepare($dbconn,'ps6',$query6);

      # CHECKING FOR RESULT 6
      if (!$isWatched) {echo "SORRY, NO RESULT"; die("Error in SQL query: " . pg_last_error());} 

      ##################################################################################

      # THE USER IS NOT LOGGED IN?
    } else { header('Location: /mrs/docs/examples/jumbotron/index.php');}
    
    ?><!-- END OF PHP CODE -->


  </head>
  <body>
    <?php 
    while ($row=pg_fetch_array($result)) { ?>
    <!--/.nav-collapse -->
  </div>
</div>
<div class="container">
  <div class="col-md-12">
    <div class="center-block text-left">
      <!-- MOVIE TITLE -->
      <h1><?php echo $row[0]?></h1> 
      <!--WATCHED LABEL-->
      <?php $row_count = pg_num_rows($isWatched);
      if ($row_count>0) {
        while ($row2=pg_fetch_array($isWatched)) { ?>
        <!-- <p><b><font color="red"> Watched on <?php echo $row2[0] ?></font></b></p> -->
        <P class="lead"><span class="label label-warning tags">Watched</span><!-- <b><?php echo " ".$row2[0]; ?></b> --> 
          <?php }} ?><!--/WATCHED LABEL-->

        </div>
        <div class="container">
          <div class="menu row">
            <div class="product col-sm-6">
              <img class="img-responsive" src="<?php echo $row[2] ?>">
              <!--             <i class="btn btn-product fa fa-star">5 STARS</i>--> 
              <hr>

              <!-- DISPLAY MOVIE TITLE -->
              <h2><?php echo $row[0]?></h2>
              <!-- MOVIE DATE OF RELEASE -->
              <p>Date Released: <b><?php echo $row[1]?></b></p>
              <p>Director: <b><?php echo $row[1]?></b></p>
              <p>Actors: <b><?php echo $row[1]?></b></p>
              <hr>
              
              <!-- DISPLAY MOVIE DESCRIPTION -->
              <p><?php echo $row[3]?></p>
              <hr>
              <!--<h2 class="text-right">$39</h2>-->
<!--              <button type="submit" name="watch-button" id="watch-button" class="btn btn-primary btn-lg " <a href="watches.php?movieid=<?php echo $movie_id;?>&user=<?php echo $user_id?>
  " class="btn btn-default btn-xs">Mark as Watched</button> -->

  <!-- RATING FORM-->
  <form class="form-horizontal" action="" method="POST" name="rating-form">
    <div class="form-group">
      <div class="col-sm-4">
        <!-- <form id="getRatingFromUser" action="rates.php?movieid=<?php echo $movie_id;?>&user=<?php echo $user_id?>" 
        method="GET"> -->
        <!-- SELECT RATING VALUE -->
        <select name="inputRating" class="form-control" id="inputRating" required>
          <option value="">Please Rate...</option>
          <option value="0">0/10</option>
          <option value="1">1/10</option>
          <option value="2">2/10</option>
          <option value="3">3/10</option>
          <option value="4">4/10</option>
          <option value="5">5/10</option>
          <option value="6">6/10</option>
          <option value="7">7/10</option>
          <option value="8">8/10</option>
          <option value="9">9/10</option>
          <option value="10">10/10</option>
        </select> 
      </div>
    </div><!-- END OF FORM-GROUP -->
    
    <!-- RATING SUBMISSION BUTTON -->
    <!-- <button type="submit"> <a href="rates.php?movieid=<?php echo $movie_id;?>&user=<?php echo $user_id?>&rating=<?php echo $rating?>" name=rate-button 
    class="btn-primary btn-lg">Rate</a></button> -->
    <div><p><input type="submit" name="rate-button" value="Rate" class="btn-primary btn-lg" /></div>

  </form><!-- END OF FORM -->

  <!-- <div class="rate">
  <input type="radio" id="star10" name="rate" value="10" />
    <label for="star10" title="10 out of 10">10 stars</label>
    <input type="radio" id="star9" name="rate" value="9" />
    <label for="star9" title="9 out of 10">9 stars</label>
    <input type="radio" id="star8" name="rate" value="8" />
    <label for="star8" title="8 out of 10">8 stars</label>
    <input type="radio" id="star7" name="rate" value="7" />
    <label for="star7" title="7 out of 10">7 stars</label>
    <input type="radio" id="star6" name="rate" value="6" />
    <label for="star6" title="6 out of 10">6 stars</label>
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="5 out of 10">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="4 out of 10">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="3 out of 10">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="2 out of 10">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="1 out of 10">1 star</label>
  </div> -->
  <!-- END OF RATING -->



  <button> <a href="watches.php?movieid=<?php echo $movie_id;?>&user=<?php echo $user_id?>" name=watch-button 
    class="btn-primary btn-lg">Mark as Watched</a></button> 

    <hr>

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
      <li><a data-toggle="tab" href="#reviews">Reviews</a></li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="description">
        <br>
        <p><?php echo $row[3] ?></p>                

      </div>
      <div class="tab-pane" id="reviews">
        <!-- <h4>Users Reviews</h4>
        <ul class="list-unstyled">
          <li class="clearfix">(Mike R.) I watched this last month before a.. <i class="fa fa-star fa-2x yellow pull-right"></i></li>
          <li class="clearfix">(Karen) The length of this movie was a little long.. <i class="fa fa-star fa-2x yellow pull-right"></i></li>
          <li class="clearfix">(CAS) I love this movie. I want to watch it again..  <i class="fa fa-star fa-2x yellow pull-right"></i><i class="fa fa-star fa-2x yellow pull-right"></i></li>
          <li class="clearfix">(William D.) Great movie with cool style. If you want.. <i class="fa fa-star fa-2x yellow pull-right"></i></li>
        </ul> -->

        <!-- ##################################### USER COMMENTS BOX ##################################### -->

        <!-- <div class="detailBox"> -->
        <div class="titleBox">
          <label>USER REVIEWS</label>
          <button type="button" class="close" aria-hidden="true">&times;</button>
        </div>
        <div class="commentBox">

          <p class="taskDescription">Share your opinion about this movie here!</p>
        </div>
        <div class="actionBox">
          <ul class="commentList">


            <?php $row_count = pg_num_rows($result5);
            if ($row_count>0) { 
              while ($row5=pg_fetch_array($result5)) { ?>
              <!-- START LOOPING COMMENTS -->
              <li>
                <div class="commenterImage">
                  <img src="https://tracker.moodle.org/secure/attachment/30912/f3.png" />
                </div>
                <div class="commentText">
                  <p class=""><?php echo $row5[0]; ?></p> <span class="date sub-text">By: <?php echo $row5[2]; echo $row5[3]; ?> on <?php echo $row5[1]; ?></span>
                </div>
              </li>
              <?php } ?> <?php } ?>
              <!-- END LOOPING COMMENTS -->

              <!-- <li>
                <div class="commenterImage">
                  <img src="http://lorempixel.com/50/50/people/7" />
                </div>
                <div class="commentText">
                  <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
              </li>
              <li>
                <div class="commenterImage">
                  <img src="http://lorempixel.com/50/50/people/9" />
                </div>
                <div class="commentText">
                  <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
              </li> -->
            </ul>

            <!-- COMMENT INPUT FORM -->
            <form name="comment-form" class="form-inline" role="form" action="" method="POST">
              <div class="form-group">
                <input type="hidden" name="movieid" value="<?php echo $movie_id ?>"></input>
                <input id="inputComments" name="inputComments" class="form-control" type="text" placeholder="Your comments" required />
              </div>
              <div class="form-group">
                <button type="submit" name="add-comments-button" id="add-comments-button" value="Add" class="btn btn-default">Add</button>
              </div>
            </form>
          </div>
          <!-- </div> -->
          <!-- ##################################### END END END END END ##################################### -->
        </div>
      </div>
    </div>



    <!-- ##################################### SIMILAR MOVIES BLOCKS ##################################### -->
    <div class="col-sm-6">
     <h3>Similar Movies</h3>
     <div class="productsrow">
      <div class="product menu-category">
        <div class="menu-category-name list-group-item active">Movie 1</div>
        <div class="product-image">
          <img class="product-image menu-item list-group-item" src="/assets/example/ec_belt.jpg">
        </div> <a href="#" class="menu-item list-group-item">name name name<span class="badge">28</span></a>

      </div>
      <div class="product menu-category">
        <div class="menu-category-name list-group-item active">Movie 2</div>
        <div class="product-image">
          <img class="product-image menu-item list-group-item" src="/assets/example/ec_jeans.jpg">
        </div> <a href="#" class="menu-item list-group-item">name name name<span class="badge">80</span></a>

      </div>
      <div class="product menu-category">
        <div class="menu-category-name list-group-item active">Movie 3</div>
        <div class="product-image">
          <img class="product-image menu-item list-group-item" src="/assets/example/ec_pants.jpg">
        </div> <a href="#" class="menu-item list-group-item">name name name<span class="badge">59</span></a>

      </div>
      <div class="product menu-category">
        <div class="menu-category-name list-group-item active">Movie 4</div>
        <div class="div-image">
          <img class="product-image menu-item list-group-item" src="/assets/example/ec_jacket.jpg">
        </div> <a href="#" class="menu-item list-group-item">name name name<span class="badge">56</span></a>

      </div>
      <div class="product menu-category">
        <div class="menu-category-name list-group-item active">Movie 5</div>
        <div class="product-image">
          <img class="product-image menu-item list-group-item" src="/assets/example/ec_socks.jpg">
        </div> <a href="#" class="menu-item list-group-item">name name name<span class="badge">56</span></a>

      </div>
      <div class="product menu-category">
        <div class="menu-category-name list-group-item active">Movie 6</div>
        <div class="product-image">
          <img class="product-image menu-item list-group-item" src="/assets/example/ec_belt.jpg">
        </div> <a href="#" class="menu-item list-group-item">name name name<span class="badge">18</span></a>

      </div>
      <div class="product menu-category">
        <div class="menu-category-name list-group-item active">Movie 7</div>
        <div class="product-image">
          <img class="product-image menu-item list-group-item" src="/assets/example/ec_sweater.jpg">
        </div> <a href="#" class="menu-item list-group-item">name name name<span class="badge">46</span></a>

      </div>
    </div>
  </div>
</div>
<!--/row-->
</div>
<!--/container-->
</div>
</div>

<hr>

<div class="container">

 <div class="row">

   <div class="col-sm-6">

    <!--  MOVIE INFO -->
    <ul class="list-group ticketView">
      <li class="list-group-item ticketView">
        <span class="label label-default">Description</span>
        <p> </p>
      </li>
      <li class="list-group-item ticketView">
        <span class="label label-default">Released date:</span>
        <label>  <?php echo $row[1]?></label>
      </li>

      <li class="list-group-item ticketView">
        <span class="label label-default">Sizes</span>
        <label> Mens's 5-10, 8-12</label>
      </li>
      <li class="list-group-item ticketView">
        <span class="label label-default">Stock #</span>
        N12325
      </li>
    </ul>

  </div><!--/col-->
</div><!--/row-->

<hr>      
</div><!--/container-->

<div class="modal fade" id="myModal">
	<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Log In</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="email">
        </div>
        <div class="form-group">
         <label for="exampleInputPassword1">Password</label>
         <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
       </div>
       <p class="text-right"><a href="#">Forgot password?</a></p>
     </div>
     <div class="modal-footer">
      <a href="#" data-dismiss="modal" class="btn">Close</a>
      <a href="#" class="btn btn-primary">Log-in</a>
    </div>
  </div>
</div>
</div>
<?php } ?>

<?php 
# FREE MEMORY1
pg_free_result($result);
# FREE MEMORY2
pg_free_result($result2);
# FREE MEMORY3
//pg_free_result($result3);   
# CLOSE DATABASE CONNECTION
pg_close($dbconn);  
?>

<!--/template-->
<!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>