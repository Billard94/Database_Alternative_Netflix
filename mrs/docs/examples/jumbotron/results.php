
    <?php

      include 'config.php';
      session_start();
     
      
    if (array_key_exists('isoption', $_POST) && (!empty($_POST['isoption'])))
    {

      // Performing SQL query
      
       //if(array_key_exists('isoption', $_POST)) && !empty($_POST['isoption'])){
        
        if($_POST['isoption'] == 'All'){
             //Run query
          echo "You selected (All)";
        }
        if($_POST['isoption'] == 'Release Year'){
             //Run query
          echo "You selected (Release Year)";
        }if($_POST['isoption'] == 'Actor/Actress'){
             //Run query
          echo "You selected (Actor/Actress)";
        }if($_POST['isoption'] == 'Movie'){
             //Run query
          echo "You selected (Movie)";
          
          $query = 'SELECT * FROM project.actor';
          $result = pg_query($query) or die('Query failed: ' . pg_last_error());
          
          print " 
      <table class=\"table\" border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"#C0C0C0\"><tr> 
        <td width=100>ID:</td> 
        <td width=100>First Name:</td> 
        <td width=100>Last Name:</td> 
        <td width=100>Date of Birth:</td>  
      </tr>";


      while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($row as $row_value) {
          echo "\t\t<td>$row_value</td>\n";
        }
        echo "\t</tr>\n";
      }
      echo "</table>\n";
      
      //echo '<div id="errormsg"> Error </div>';
      echo '<div class="media"> Error </div>';

      pg_free_result($result);

      // Closing connection
      pg_close($dbconn);


        }if($_POST['isoption'] == 'Director'){
             //Run query for credit4
          echo "option4";
        } else{
          echo "Please select once choice for submit query!";
        }
      }


      //$query = 'SELECT * FROM project.actor';
      //$result = pg_query($query) or die('Query failed: ' . pg_last_error());

      // Printing results in HTML

      //echo "<table>\n";
      /*
      print " 
      <table class=\"table\" border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"#C0C0C0\"><tr> 
        <td width=100>ID:</td> 
        <td width=100>First Name:</td> 
        <td width=100>Last Name:</td> 
        <td width=100>Date of Birth:</td>  
      </tr>";


      while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($row as $row_value) {
          echo "\t\t<td>$row_value</td>\n";
        }
        echo "\t</tr>\n";
      }
      echo "</table>\n";
      
      //echo '<div id="errormsg"> Error </div>';
      echo '<div class="media"> Error </div>';
      
      
      // Free resultset
      pg_free_result($result);

      // Closing connection
      pg_close($dbconn);
    }
    */
    echo "done!";

    ?>