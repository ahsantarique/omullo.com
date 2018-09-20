<?php
include("session.php");
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
    <button type="submit" class="btn btn-warning" ><a href = "addjob.php"> Add Job </a><span class="glyphicon glyphicon-send"></span></button>
    <button type="submit" class="btn btn-warning" ><a href = "logout.php">Log Out </a><span class="glyphicon glyphicon-send"></span></button>    
  </div>
</div>


<h1> Omullo </h1>
<h3> User: <?php echo $_SESSION['login_user']?> </h3>

<div class="container">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>New Jobs</legend>


<table class="tg">
  <tr>
    <th class="tg-b44r">Task ID</th>
    <th class="tg-b44r">Folder</th>
    <th class="tg-b44r">CID</th>
    <th class="tg-b44r">MID</th>
    <th class="tg-b44r">PID</th>
    <th class="tg-b44r">QTY</th>
    <th class="tg-b44r">Countdown</th>
    <th class="tg-b44r">Incoming </th>
    <th class="tg-b44r">Delivery</th>
    <th class="tg-b44r">DL</th>
    <th class="tg-b44r">IP</th>
    <th class="tg-b44r">QC</th>
    <th class="tg-b44r">UL</th>
    <th class="tg-b44r">Clip</th>
    <th class="tg-b44r">Vct</th>
    <th class="tg-b44r">Mas</th>
    <th class="tg-b44r">Ret</th>
    <th class="tg-b44r">Col</th>
    <th class="tg-b44r">Alp</th>
    <th class="tg-b44r">Status</th>

  </tr>
  
     <?php
   	include('config.php');

	
	$sql = "SELECT * FROM jobs";
	
	$result = mysqli_query($db,$sql)or die(mysqli_error());
	

	$i=0;	
	while($row = mysqli_fetch_array($result)) {
		$jid=$row['jid'];
		$subjid=$row['subjid'];
		$description=$row['jname'];
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
		$now = new DateTime();
		$future_date = new DateTime($enddate);
		$interval = $future_date->diff($now);
		
		$tm= $interval->format("%a D %h:%i");



		if($i==0){
		  echo "<tr>
		    <td class=\"tg-3we0\"><a href=\"jobdetails.php?jid=$jid&subjid=$subjid\">$jid.$subjid</a></td>
		    <td class=\"tg-3we0\">$description</td>
		    <td class=\"tg-3we0\">$ccode</td>
		    <td class=\"tg-3we0\">$mcode</td>
		    <td class=\"tg-3we0\">$ecode</td>
		    <td class=\"tg-3we0\">$amount</td>
		    <td class=\"tg-3we0\">$tm</td>		    
		    <td class=\"tg-3we0\">$startdate</td>
		    <td class=\"tg-3we0\">$enddate</td>
		    <td class=\"tg-3we0\">$dl</td>
		    <td class=\"tg-3we0\">$ip</td>
		    <td class=\"tg-3we0\">$chk</td>
		    <td class=\"tg-3we0\">$ul</td>
		    <td class=\"tg-3we0\">$clip</td>
		    <td class=\"tg-3we0\">$vct</td>
		    <td class=\"tg-3we0\">$msk</td>
		    <td class=\"tg-3we0\">$ret</td>
		    <td class=\"tg-3we0\">$cc</td>
		    <td class=\"tg-i81m\">$alp</td>";
		    
		    if($ul==0){
		    	echo "<td class=\"tg-i81m\">Live</td>";
		    }
		    else{
		    	echo "<td class=\"tg-i81m\">Done</td>";
		    }
		    echo "</tr>";
		  
		    $i=1;	
		}
		else{
		  echo "<tr>
		    <td class=\"tg-yzt1\"><a href=\"jobdetails.php?jid=$jid&subjid=$subjid\">$jid.$subjid</a></td>
		    <td class=\"tg-yzt1\">$description</td>
		    <td class=\"tg-yzt1\">$ccode</td>
		    <td class=\"tg-yzt1\">$mcode</td>
		    <td class=\"tg-yzt1\">$ecode</td>
		    <td class=\"tg-yzt1\">$amount</td>
		    <td class=\"tg-yzt1\">$tm</td>
		    <td class=\"tg-yzt1\">$startdate</td>
		    <td class=\"tg-yzt1\">$enddate</td>
		    <td class=\"tg-yzt1\">$dl</td>
		    <td class=\"tg-yzt1\">$ip</td>
		    <td class=\"tg-yzt1\">$chk</td>
		    <td class=\"tg-yzt1\">$ul</td>
		    <td class=\"tg-yzt1\">$clip</td>
		    <td class=\"tg-yzt1\">$vct</td>
		    <td class=\"tg-yzt1\">$msk</td>
		    <td class=\"tg-yzt1\">$ret</td>
		    <td class=\"tg-yzt1\">$cc</td>
		    <td class=\"tg-yzt1\">$alp</td>";
		    
		    if($ul==0){
		    	echo "<td class=\"tg-yzt1\">&nbsp Live</td>";
		    }
		    else{
		    	echo "<td class=\"tg-yzt1\">&nbsp Done</td>";
		    }
		    echo "</tr>";
		    
		  
		
		    $i=0;
		
		}
		

	} 

	

   ?>
  
  


</table>


</fieldset>
</form>
</div>
    </div><!-- /.container -->
    