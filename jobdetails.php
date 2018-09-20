<?php
include("session.php");
$jid=$_GET['jid'];
$subjid=$_GET['subjid'];
?>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#bbb;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#594F4F;background-color:#E0FFEB;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#493F3F;background-color:#9DE0AD;}
.tg .tg-b44r{background-color:#cbcefb;vertical-align:top}
.tg .tg-yzt1{background-color:#efefef;vertical-align:top}
.tg .tg-jgco{font-size:18px;background-color:#ffffff;vertical-align:top}
.tg .tg-3we0{background-color:#ffffff;vertical-align:top}
.tg .tg-i81m{background-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
</style>


<div class="form-group" align="right">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
     <button type="submit" class="btn btn-warning" ><a href = "mainjoblist.php"> Jobs List</a><span class="glyphicon glyphicon-send"></span></button>

    <button type="submit" class="btn btn-warning" ><a href = "addjob.php"> Add Job </a><span class="glyphicon glyphicon-send"></span></button>
    <button type="submit" class="btn btn-warning" ><a href = "logout.php">Log Out </a><span class="glyphicon glyphicon-send"></span></button>    
  </div>
</div>


<h1> Omullo </h1>
<h3> User: <?php echo $_SESSION['login_user']?> </h3>

<div>
	<button type="submit" class="btn btn-warning" style="float: center;"><a href=<?php echo "editjob.php?jid=$jid&subjid=$subjid"?>> Edit Job</a><span class="glyphicon glyphicon-send"></span></button>
	<button type="submit" class="btn btn-warning" style="float: center;"><a href=<?php echo"splitjob.php?jid=$jid&subjid=$subjid"?>> Split Job</a><span class="glyphicon glyphicon-send"></span></button>
</div>

<div class="container">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form">

<fieldset>

<!-- Form Name -->
<legend>Job Details</legend>



  
     <?php
   	include('config.php');
	
	$sql = "SELECT * FROM jobs where `jid`='$jid' and `subjid`='$subjid';";
	
	$result = mysqli_query($db,$sql)or die(mysqli_error());
	

	$i=0;	
	while($row = mysqli_fetch_array($result)) {
		$jid=$row['jid'];
		$subjid=$row['subjid'];
		$description=$row['jname'];
		$details = $row['description'];
		$ccode=$row['ccode'];
		$mcode=$row['mcode'];
		$ecode=$row['ecode'];
		$amount=$row['amount'];
		$startdate=$row['startdate'];
		$enddate=$row['enddate'];
		$dl=$row['dl'];
		$clip=$row['clip'];
		$msk=$row['msk'];
		$alp=$row['alp'];
		$cc=$row['cc'];
		$ret=$row['ret'];
		$vct=$row['vct'];
		$chk=$row['chk'];
		$ul=$row['ul'];
		$ip=$row['ip'];
		$downlink=$row['downlink'];
		$uplink=$row['uplink'];
		$now = new DateTime();
		$future_date = new DateTime($enddate);
		$interval = $future_date->diff($now);
		
		$tm= $interval->format("%a D %h:%i");

		echo "<table class=\"tg\">
		
		
	  	<col width=\"200\">
		<col width=\"450\">
		  <tr>
		    <th colspan=\"40\" class=\"tg-b44r\">Task ID</th> <td class=\"tg-3we0\">$jid.$subjid</td> </tr>
		    <th colspan=\"40\"  class=\"tg-b44r\">Folder</th>  <td class=\"tg-3we0\">$description</td> </tr>
		    <th colspan=\"40\"   class=\"tg-b44r\">Job Details </th> <td  class=\"tg-3we0\">$details</td> </tr>
 
		    <th colspan=\"40\"  class=\"tg-b44r\">CID</th>  <td class=\"tg-3we0\">$ccode</td> </tr>
		    <th colspan=\"40\"  class=\"tg-b44r\">MID</th>  <td class=\"tg-3we0\">$mcode</td></tr> 
		    <th colspan=\"40\"  class=\"tg-b44r\">PID</th> <td class=\"tg-3we0\">$ecode</td></tr>
		    <th colspan=\"40\"  class=\"tg-b44r\">QTY</th> <td class=\"tg-3we0\">$amount</td></tr>
		    <th colspan=\"40\"  class=\"tg-b44r\">Incoming </th> <td class=\"tg-3we0\">$startdate</td></tr>
		    <th colspan=\"40\"  class=\"tg-b44r\">Delivery</th> <td class=\"tg-3we0\">$enddate</td></tr>
		    <th colspan=\"40\"  class=\"tg-b44r\">Download</th> <td class=\"tg-3we0\">$downlink </td> </tr>";
		    if($dl==0) echo "<th colspan=\"40\"  class=\"tg-b44r\"></th><td class=\"tg-3we0\"><button  type=\"submit\"> Ready </button> </td>";
		    
		    echo "</tr> <th colspan=\"40\"  class=\"tg-b44r\">Upload</th> <td class=\"tg-3we0\">$uplink </td> </tr>";
		    if($dl==1 && $ul==0) echo "<th colspan=\"40\"  class=\"tg-b44r\"></th><td class=\"tg-3we0\"><button type=\"submit\"> Ready </button> </td> </tr>";

		
		}
		
	
		   if($_SERVER["REQUEST_METHOD"] == "POST") {
		   	if($dl==0){
		   		$sql= "UPDATE  `wwwomullo_main`.`jobs` SET  `dl` =  '1' WHERE  `jobs`.`jid` ='$jid'AND  `jobs`.`subjid` ='$subjid';";
				$result= mysqli_query($db,$sql) or die("Failed to add job! Try again!");
		   	}
		   	else{
		   		$sql="UPDATE  `wwwomullo_main`.`jobs` SET  `ul` =  '1' WHERE  `jobs`.`jid` ='$jid' AND  `jobs`.`subjid` ='$subjid';";
				$result= mysqli_query($db,$sql) or die("Failed to add job! Try again!");

		   	}
		   	
			echo "<meta http-equiv=\"refresh\" content=\"0\">";


		   
		   }
		
   ?>
  
  


</table>


</fieldset>
</form>
</div>
    </div><!-- /.container -->