<?php 
 $pid=$_GET['pid'];
// $mid=$_GET['mid'];
// $sid=$_GET['sid'];
// $pid=$_GET['pid'];
// $ul=$_GET['ul'];
 $datetype=$_GET['datetype'];
 $std=$_GET['std'];
 $end=$_GET['end'];
   	include('../config.php');	
?>

  
     <?php
   	//include('config.php');

	
	$sql = "SELECT * from jobs where jid not in (SELECT jid from jobs where ul = 0) and (DATE($datetype) >= CAST('$std' AS DATE) AND  DATE($datetype) <= CAST('$end' AS DATE)) and (ecode='$pid'||'$pid'='') and subjid!=0 ";
	
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
		$cprice=$row['cprice'];
		$value=$row['pprice'];
		$startdate=$row['startdate'];
		$enddate=$row['enddate'];
		$dl=$row['dl'];
		$delivered=$row['delivered'];
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

		$sql1="SELECT amount FROM jobs where jid='$jid' ";
		$result1=mysqli_query($db,$sql1)or die(mysqli_error());
		$row1=mysqli_fetch_array($result1);
		$totalqty= $row1['amount'];
		$value1=$value*$amount;

		if($i==0){
		  echo "<tr>
		    <td class=\"tg-3we0\"><a href=\"jobdetails.php?jid=$jid&subjid=$subjid\">$jid.$subjid</a></td>
		    <td class=\"tg-3we0\">$description</td>
		    <td class=\"tg-3we0\">$ecode</td>		    
		    <td class=\"tg-3we0\">$amount</td>
		    <td class=\"tg-3we0\">$value</td>
		    <td class=\"tg-3we0\">$value1</td>	    	    
		    <td class=\"tg-3we0\">$startdate</td>		    
		    <td class=\"tg-3we0\">$delivered</td>
		    <td class=\"tg-3we0\">$dl</td>
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
		    <td class=\"tg-yzt1\">$ecode</td>		   
		    <td class=\"tg-yzt1\">$amount</td>
		    <td class=\"tg-3we0\">$value</td>
		    <td class=\"tg-3we0\">$value1</td>	
		    <td class=\"tg-yzt1\">$startdate</td>		    
		    <td class=\"tg-yzt1\">$delivered</td>
		    <td class=\"tg-yzt1\">$dl</td>
		    <td class=\"tg-yzt1\">$ul</td>
		    <td class=\"tg-yzt1\">$clip</td>
		    <td class=\"tg-yzt1\">$vct</td>
		    <td class=\"tg-yzt1\">$msk</td>
		    <td class=\"tg-yzt1\">$ret</td>
		    <td class=\"tg-yzt1\">$cc</td>
		    <td class=\"tg-yzt1\">$alp</td>";		    
		    if($ul==0){
		    	echo "<td class=\"tg-yzt1\">Live</td>";
		    }
		    else{
		    	echo "<td class=\"tg-yzt1\">Done</td>";
		    }
		    echo "</tr>";

		    $i=0;
		
		}

	} 

   ?>
