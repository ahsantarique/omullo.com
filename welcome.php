<?php
   include('session.php');

?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 


   <?php
   	include('config.php');

	
	$sql = "SELECT * FROM jobs";
	
	$result = mysqli_query($db,$sql)or die(mysqli_error());
	
	echo "<table>";
	echo "<tr><td style='width: 200px;'>".description."</td><td style='width: 200px;'>". startdate."</td><td>". enddate."</td><td>". enddate."</td></tr>";
	
	while($row = mysqli_fetch_array($result)) {
	    $desc= $row['description'];
	    $start= $row['startdate'];
	    $end= $row['enddate'];
	    $down = $row['downlink'];
	    $up = $row['uplink'];
	    echo "<tr><td style='width: 200px;'>".$desc."</td><td style='width: 200px;'>".$start."</td><td>".$end."</td></tr>";
	} 
	
	echo "</table>"
	

   ?>

      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>