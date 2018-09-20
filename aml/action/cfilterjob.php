<?php 
$cid=$_GET['cid'];
$mid=$_GET['mid'];
$sid=$_GET['sid'];
$pid=$_GET['pid'];
$ul=$_GET['ul'];
// echo $datetype=$_GET['datetype'];
// echo $std=$_GET['std'];
// echo $end=$_GET['end'];
   	include('../config.php');	
	$sql1 = "SELECT * FROM jobs where ('$cid'='' || ccode='$cid') and ('$mid'='' || mcode='$mid') and ('$sid'='' || sid='$sid') and ('$pid'='' || ecode='$pid') and ('$ul'='' || ul='$ul') and ul=1 ";
	//if($sql1 === FALSE){ die(mysql_error());}
	$result = mysqli_query($db,$sql1)or die(mysqli_error());
	
	 //if($result === FALSE){ die(mysql_error());}
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
		$dvd=$row['delivered'];
		$now = new DateTime();
		$future_date = new DateTime($enddate);
		$interval = $future_date->diff($now);
		$sid=$row['sid'];
		$tm= $interval->format("%a D %h:%i");



		
		  echo "<tr>
		    <td class=\"tg-3we0\"><a href=\"jobdetails.php?jid=$jid&subjid=$subjid\">$jid.$subjid</a></td>
		    <td class=\"tg-3we0\">$description</td>
		    <td class=\"tg-3we0\">$ccode</td>
		    <td class=\"tg-3we0\">$mcode</td>
		    <td class=\"tg-3we0\">$sid</td>
		    <td class=\"tg-3we0\">$ecode</td>
		    <td class=\"tg-3we0\">$amount</td>
		    <td class=\"tg-3we0\">$tm</td>		    
		    <td class=\"tg-3we0\">$startdate</td>
		    <td class=\"tg-3we0\">$enddate</td>
		    <td class=\"tg-3we0\">$dvd</td>
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

 

   ?>

