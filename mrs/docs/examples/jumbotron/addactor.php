<!DOCTYPE html>
<html lang="en">

<head>

  <script type="text/javascript">

    var numDays = {
      '1': 31, '2': 28, '3': 31, '4': 30, '5': 31, '6': 30,
      '7': 31, '8': 31, '9': 30, '10': 31, '11': 30, '12': 31
    };

    function setDays(oMonthSel, oDaysSel, oYearSel)
    {
      var nDays, oDaysSelLgth, opt, i = 1;
      nDays = numDays[oMonthSel[oMonthSel.selectedIndex].value];
      if (nDays == 28 && oYearSel[oYearSel.selectedIndex].value % 4 == 0)
        ++nDays;
      oDaysSelLgth = oDaysSel.length;
      if (nDays != oDaysSelLgth)
      {
        if (nDays < oDaysSelLgth)
          oDaysSel.length = nDays;
        else for (i; i < nDays - oDaysSelLgth + 1; i++)
        {
          opt = new Option(oDaysSelLgth + i, oDaysSelLgth + i);
          oDaysSel.options[oDaysSel.length] = opt;
        }
      }
      var oForm = oMonthSel.form;
      var month = oMonthSel.options[oMonthSel.selectedIndex].value;
      var day = oDaysSel.options[oDaysSel.selectedIndex].value;
      var year = oYearSel.options[oYearSel.selectedIndex].value;  
      var dateOfBirth = month + '-' + day + '-' + year;
      oForm.hidden.value = dateOfBirth; 
    }
  </script>



</head>

<?php
session_start();

if (isset($_SESSION['loggedin'])) {
  include 'header2.php';
    //header('Location:index.php');
} else {
    //include 'header.php';
}

include 'config.php';

if(array_key_exists('register', $_POST)){

  $email = $_POST['inputEmail'];
  $password = $_POST['inputPassword'];
  $fname = $_POST['inputfName'];
  $lname = $_POST['inputlName'];
  $city = $_POST['inputCity'];
  $province = $_POST['inputProvince'];
  $country = $_POST['inputCountry'];
  $agegroup = $_POST['inputAgeGroup'];
  $gender = $_POST['inputGender'];
  $yearBorn = $_POST['inputYearBorn'];

  $query = "INSERT INTO project.profile (
  email, 
  password, 
  first_name, 
  last_name, 
  city, 
  province, 
  country, 
  age_range, 
  year_born, 
  gender
  ) VALUES (
  '$email', 
  '$password', 
  '$fname', 
  '$lname', 
  '$city', 
  '$province', 
  '$country', 
  '$agegroup', 
  '$yearBorn',
  '$gender'
  )";

  $result = pg_query($dbconn, $query);
  if (!$result){
    die("Error in SQL query: ") .pg_last_error();
  } 

      //echo "Data Successfully Entered.";

      // free memory
  pg_free_result($result);

      // close connection
  pg_close($dbconn);
  header('Location: thanks.php');
}
?>


<body>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Add People
  </button>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
    Try
  </button>

         <?php 
          include 'new-actor.php'; 
          ?>


  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add People</h4>
        </div>
        <div class="modal-body">
         <!-- MODAL BODY --> 
         <?php 
          include 'new-actor.php'; 
          ?>
       </div>
     </div>
   </div>
 </div>




 <!-- Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add People</h4>
      </div>
      <div class="modal-body">
       <!-- MODAL BODY --> 
       <br>
       <p>Add a new actor</p>
       <br>
       <form class="form-horizontal" action="" method="POST" name="registration-form">
        <!-- NAME -->
        <div class="form-group">
          <label for="inputName" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-4">
            <input type="text" name="inputfName" class="form-control" id="inputfName" placeholder="First Name">
          </div>
          <div class="col-sm-4">
            <input type="text" name="inputlName" class="form-control" id="inputlName" placeholder="Last Name">
          </div>
        </div>

        <!-- ADDRESS -->
        <div class="form-group">
          <label for="inputAddress" class="col-sm-2 control-label">Date of Birth</label>


          <div class="col-sm-3">
            <select name="month" id="month" class="form-control" id="inputMonth" onchange="setDays(this,day,year)">
              <option value="">Month</option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>

          <div class="col-sm-3">
            <select name="day" id="day" class="form-control" onchange="setDays(month,this,year)">
              <option value="">Day</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
          </div>

          <div class="col-sm-3">
            <select name="year" id="year" class="form-control" onchange="setDays(month,day,this)">
              <option value="">Year</option>
              <option value="1944">1944</option>
              <option value="1945">1945</option>
              <option value="1946">1946</option>
              <option value="1947">1947</option>
              <option value="1948">1948</option>
              <option value="1949">1949</option>
              <option value="1950">1950</option>
              <option value="1951">1951</option>
              <option value="1952">1952</option>
              <option value="1953">1953</option>
              <option value="1954">1954</option>
              <option value="1955">1955</option>
              <option value="1956">1956</option>
              <option value="1957">1957</option>
              <option value="1958">1958</option>
              <option value="1959">1959</option>
              <option value="1960">1960</option>
              <option value="1961">1961</option>
              <option value="1962">1962</option>
              <option value="1963">1963</option>
              <option value="1964">1964</option>
              <option value="1965">1965</option>
              <option value="1966">1966</option>
              <option value="1967">1967</option>
              <option value="1968">1968</option>
              <option value="1969">1969</option>
              <option value="1970">1970</option>
              <option value="1971">1971</option>
              <option value="1972">1972</option>
              <option value="1973">1973</option>
              <option value="1974">1974</option>
              <option value="1975">1975</option>
              <option value="1976">1976</option>
              <option value="1977">1977</option>
              <option value="1978">1978</option>
              <option value="1979">1979</option>
              <option value="1980">1980</option>
              <option value="1981">1981</option>
              <option value="1982">1982</option>
              <option value="1983">1983</option>
              <option value="1984">1984</option>
              <option value="1985">1985</option>
              <option value="1986">1986</option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
            </select>
          </div>
          <!--<input type="text" name="hidden" value="" />-->
        </p>
      </div>
    </form>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save</button>
  </div>
</div>
</div>
</div>





<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <h2><b>Add a new actor</b></h2>
    <p>subtext.</p>


    <form class="form-horizontal" action="" method="POST" name="registration-form">


      <!-- NAME -->
      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-3">
          <input type="text" name="inputfName" class="form-control" id="inputfName" placeholder="First Name">
        </div>
        <div class="col-sm-3">
          <input type="text" name="inputlName" class="form-control" id="inputlName" placeholder="Last Name">
        </div>
      </div>




      <!-- ADDRESS -->
      <div class="form-group">
        <label for="inputAddress" class="col-sm-2 control-label">Date of Birth</label>


        <div class="col-sm-2">
          <select name="month" id="month" class="form-control" id="inputMonth" onchange="setDays(this,day,year)">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
        </div>

        <div class="col-sm-2">
          <select name="day" id="day" class="form-control" onchange="setDays(month,this,year)">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>
        </div>

        <div class="col-sm-2">
          <select name="year" id="year" class="form-control" onchange="setDays(month,day,this)">
            <option value="1944">1944</option>
            <option value="1945">1945</option>
            <option value="1946">1946</option>
            <option value="1947">1947</option>
            <option value="1948">1948</option>
            <option value="1949">1949</option>
            <option value="1950">1950</option>
            <option value="1951">1951</option>
            <option value="1952">1952</option>
            <option value="1953">1953</option>
            <option value="1954">1954</option>
            <option value="1955">1955</option>
            <option value="1956">1956</option>
            <option value="1957">1957</option>
            <option value="1958">1958</option>
            <option value="1959">1959</option>
            <option value="1960">1960</option>
            <option value="1961">1961</option>
            <option value="1962">1962</option>
            <option value="1963">1963</option>
            <option value="1964">1964</option>
            <option value="1965">1965</option>
            <option value="1966">1966</option>
            <option value="1967">1967</option>
            <option value="1968">1968</option>
            <option value="1969">1969</option>
            <option value="1970">1970</option>
            <option value="1971">1971</option>
            <option value="1972">1972</option>
            <option value="1973">1973</option>
            <option value="1974">1974</option>
            <option value="1975">1975</option>
            <option value="1976">1976</option>
            <option value="1977">1977</option>
            <option value="1978">1978</option>
            <option value="1979">1979</option>
            <option value="1980">1980</option>
            <option value="1981">1981</option>
            <option value="1982">1982</option>
            <option value="1983">1983</option>
            <option value="1984">1984</option>
            <option value="1985">1985</option>
            <option value="1986">1986</option>
            <option value="1987">1987</option>
            <option value="1988">1988</option>
            <option value="1989">1989</option>
            <option value="1990">1990</option>
            <option value="1991">1991</option>
            <option value="1992">1992</option>
            <option value="1993">1993</option>
            <option value="1994">1994</option>
            <option value="1995">1995</option>
            <option value="1996">1996</option>
            <option value="1997">1997</option>
            <option value="1998">1998</option>
            <option value="1999">1999</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
          </select>
        </div>
        <input type="text" name="hidden" value="" />
        <!-- RIGSTER BUTTON -->
        <button type="submit" name="submit" class="btn btn-default">Submit</button>

      </p>

    </div>

  </div>

</form>

<!--  
  <div><p><input type="submit" name="register" value="Register"/></div>
-->
</div>
</div>
</body>
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
    <?php
    include 'footer.php';
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
