<!---->

<?php

      // Connecting, selecting database: replace @@@@@@@@@   
      $dbconn = pg_connect("host=web0.site.uottawa.ca port=15432 dbname=@@@@@@@@@ user=@@@@@@@@@ password=@@@@@@@@@")        
      or die('Could not connect: ' . pg_last_error());

      //echo "Connected to the database!";

?>