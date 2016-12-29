
<?php 
include 'config.php';
if (!isset($_SESSION))
{
	session_start();
}

$latest_users_query = "SELECT u.user_id, u.first_name, u.last_name, u.country FROM project.users u ORDER BY user_id DESC LIMIT 5;"

          // prepare statement
//$latest_movies_query = "SELECT movie_id, name, date_released FROM project.movie ORDER BY movie_id DESC LIMIT 5;";

          // prepare statement
    $latest_users_result = pg_query($dbconn, $latest_users_query);
    $stmt = pg_prepare($dbconn,'ps',$latest_users_query);
          //$result = pg_execute($dbconn,'ps',array());

    if (!$latest_users_query) {
            # code...
      echo "SORRY, NO RESULT";
      die("Error in SQL query: " . pg_last_error());
    }
    ?>


<body>
	<h2 class="sub-header">Latest Users</h2>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>User Name</th>
					<th>Country</th>
					<th>Added by</th>
				</tr>
			</thead>
			<tbody>

				<?php 
				$row_count = pg_num_rows($latest_users_result);
				if ($row_count>0) {
					while ($row=pg_fetch_array($latest_users_result)) { ?>

					<tr>
						<td><?php echo $row[0]; ?></td>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td>N/A</td>
					</tr>

					<?php 
				} 
				?>
				<?php 
			}
			?>

		</tbody>
	</table>
</div>
</body>