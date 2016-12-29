<!DOCTYPE html>
<html>
<head>
	<title></title>


  <head>

  </head>

  <?php
//session_start();

if (!isset($_SESSION))
  {
    session_start();
  }

  if (isset($_SESSION['loggedin'])) {
    include 'config.php';
  } else {
    header ('Location: index.php');
  }

  if(array_key_exists('add-actor', $_POST)){

    $fname = $_POST['inputfName'];
    $lname = $_POST['inputlName'];
//    $date_of_birth_input = month + '-' + day + '-' + year;
    $dateOfBirth = $_POST['inputDateOfBirth'];

    $query = "INSERT INTO project.actor (
    first_name, 
    last_name,  
    date_of_birth
    ) VALUES (
    '$fname', 
    '$lname', 
    '$dateOfBirth'
    )";

    $result = pg_query($dbconn, $query);
    if (!$result){
      die("Error in SQL query: ") .pg_last_error();
    } else {
          $_SESSION['message'] = $message = "<strong>Success!</strong> A new actor $fname $lname was added.";

    }

    //echo "Data Successfully Entered.";

      // free memory
    pg_free_result($result);

      // close connection
    pg_close($dbconn);
    //header('Location: admin.php');
  }
  ?>


  <body>

    <!-- Button trigger modal -->  

    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#actorModal">
      Add Actors
    </button>


    <!-- ADDING A NEW ACTOR Modal -->
    <div class="modal fade" id="actorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add a new actor</h4>
          </div>
          <div class="modal-body">
           <!-- MODAL BODY --> 
           <br>
           <form class="form-horizontal" action="" method="POST" name="add-actor">
            <!-- NAME -->
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-4">
                <input type="text" name="inputfName" class="form-control" id="inputfName" placeholder="First Name" required>
              </div>
              <div class="col-sm-4">
                <input type="text" name="inputlName" class="form-control" id="inputlName" placeholder="Last Name" required>
              </div>
            </div>


            <!-- DATE OF BIRTH -->      
            <div class="form-group">
              <label for="inputDateOfBirth" class="col-sm-2 control-label">Date of Birth</label> 
              <div class="col-sm-4">
              <input type="date" name="inputDateOfBirth" class="form-control" id="inputDateOfBirth" required>
              </div>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!--<button name="save" type="submit" value="save" class="btn btn-primary">Save</button>-->
            <button type="submit" name="add-actor" id="add-actor" class="btn btn-primary">Save</button>
<!--
    <input type="submit" name="save" value="Save"/>
  -->
</form>
</div>
</div>
</div>
</div>

</body>
</body>
</html>