<?php
include("header.php");
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

<?php 
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
 ?>




<div class="container">
<div class="">
<div class="right">
	<?php 
	if($userCat=='Admin'||$userCat=='Manager'){
		//if($ul==0){
		    		    
	 ?>
	<button type="submit" class="btn btn-warning" style="float: center;"><a href=<?php echo "editjob.php?jid=$jid&subjid=$subjid"?>> Edit Job</a><span class="glyphicon glyphicon-send"></span></button>
	<button type="submit" class="btn btn-warning" style="float: center;"><a href=<?php echo"splitjob.php?jid=$jid&subjid=$subjid"?>> Split Job</a><span class="glyphicon glyphicon-send"></span></button>
	<?php 
		//}else{
			//echo '';
		//}
	}elseif($userCat=='In-Charge'){
	?>
		<button type="submit" class="btn btn-warning" style="float: center;"><a href=<?php echo"splitjob.php?jid=$jid&subjid=$subjid"?>> Split Job</a><span class="glyphicon glyphicon-send"></span></button>
	<?php } ?>
	
	
	
</div>
</div>
    <form class="well form-horizontal" action=" " method="post"  id="contact_form">

<fieldset>

<!-- Form Name -->
<legend>Job Details</legend>



  
     <?php
   	//include('config.php');
	
	
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
		   		$sql="UPDATE  `wwwomullo_main`.`jobs` SET  `ul` =  '1', delivered=now() WHERE  `jobs`.`jid` ='$jid' AND  `jobs`.`subjid` ='$subjid';";
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


<?php

  $sql= "SELECT MAX(`jid`) from `jobs`;";
  $result= mysqli_query($db,$sql) or die("Failed to add job! Try again!");
  $row= $result->fetch_assoc();
  $curjid=$row['MAX(`jid`)'];
  $curjid = $curjid+1;
   $curjid;
  //echo $_SESSION['login_user'];
  $sql= "SELECT `cfxrate` from `clients`;";
  $res= mysqli_query($db,$sql) or die("Failed to add job! Try again!");
  while($row = $res->fetch_array(MYSQL_ASSOC)) {
    $myArray[] = $row['cfxrate'];
  }
      $json_array = json_encode($myArray);
  //echo "$json_array";
  //echo "Successfully found $curjid!";

  
  
    if(isset($_POST['addjobs'])){
   //if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $job_id= mysqli_real_escape_string($db,$_POST['job_id']);
      $job_name= mysqli_real_escape_string($db,$_POST['job_name']); 
      $client= $_POST['client']; 
      $production= $_POST['production']; 
      $downlink= $_POST['downlink']; 
      $uplink= $_POST['uplink'];
      $amount = $_POST['amount'];
      $sday= $_POST['sday']; 
      $smonth= $_POST['smonth']; 
      $syear= $_POST['syear']; 
      $shour= $_POST['shour']; 
      $sminute= $_POST['sminute'];
      $sampm = $_POST['sampm']; 
      $eday= $_POST['eday']; 
      $emonth= $_POST['emonth']; 
      $eyear= $_POST['eyear']; 
      $ehour= $_POST['ehour']; 
      $eminute= $_POST['eminute']; 
      $eampm = $_POST['eampm'];
      $msk= isset($_POST['msk']); 
      $alp= isset($_POST['alp']); 
      $cc= isset($_POST['cc']); 
      $ret= isset($_POST['ret']); 
      $vct= isset($_POST['vct']);
      $jobdescription= $_POST['jobdescription'];
      $cprice = $_POST['cprice'];
      $pprice=$_POST['pprice'];
      $subjid=$_POST['subjid'];
      $sid=$_POST['sid'];


      
      $manager = $_SESSION['login_user'];
      if($sampm=='pm') $shour+=12;
      if($eampm=='pm') $ehour+=12;
      
      
  
      
      $sql="INSERT INTO  `wwwomullo_main`.`jobs` (
  `jid` ,
  `subjid` ,
  `jname` ,
  `amount` ,
  `cprice` ,
  `pprice` ,
  `description` ,
  `startdate` ,
  `enddate` ,
  `downlink` ,
  `uplink` ,
  `ccode` ,
  `ecode` ,
  `mcode` ,
  `msk` ,
  `alp` ,
  `cc` ,
  `ret` ,
  `vct` ,
  `dl` ,
  `ip` ,
  `clip` ,
  `chk` ,
  `ul` ,
  `sid`
  )
  VALUES (
  '$curjid',  '0',  '$job_name',  '$amount',  '$cprice',  '$pprice',  '$jobdescription',  '$sday $shour:$sminute:00', '$eday $ehour:$eminute:00',  '$downlink', '$uplink',  '$client',  '$production',  '$manager',  '$msk',  '$alp',  '$cc',  '$ret',  '$vct',  '0',  '0',  '0',  '0',  '0', '$sid'
  );";
   $result = mysqli_query($db,$sql) or die("Failed to add job! Try again please!");
   echo "Successfully added!";    
   }
?>
<?php

    $sql="SELECT * from user where usercategory='Employee' OR usercategory='In-charge' ;";
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_array($result)) {
        $var[]=$row['usercode'];
    }     
    $json_prod = json_encode($var);
    echo $json_prod;
?>         
<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $cnt = $_POST['cnt'];
      echo "$cnt";
  }
?>

<!DOCTYPE html>
<html>
<head>
     
   <script language="JavaScript">
  <!--
  var currentItem = 1;
  var d = <?php echo "$json_prod" ?>;
  cnt.value = 1;
  function add(){
    var htmlString="<?php echo $cnt; ?>";
    currentItem++;
    cnt.value = currentItem;
    textfield.value = currentItem;
    var strToAdd = `      <tr>
    <td>
      <div class="form-group">
        <label class="col-md-12 control-label" >Production</label> 
          <div class="col-md-12 inputGroupContainer">
            <select>`;
    for(var i in d){
        strToAdd = strToAdd + "<option> " +d[i] +"</option>";
    }
    strToAdd = strToAdd + `</select>
        </div>
      </div>
    </td>
        <td>
          <div class="form-group">
            <label class="col-md-12 control-label" >Amount</label> 
              <div class="col-md-12 inputGroupContainer">
              <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="amount" placeholder="Amount" class="form-control"  type="text">
              </div>
            </div>
          </div>
        </td>
      <td><input id="textfield" name = "unitprice" placeholder="Price/Unit"></td>`;
      data.innerHTML = data.innerHTML+ strToAdd;
 }
  
  //-->
  </script>
</head>
<body>

<form action = "" method = "post">
    <table class="table-striped table">
      <tbody id="data">
      <tr>
    <td>
      <div class="form-group">
        <label class="col-md-12 control-label" >Production</label> 
          <div class="col-md-12 inputGroupContainer">
            <select>
                <script>
                    for(var i in d){
                        document.write("<option> " +d[i] +"</option>");
                    }
                </script>
              </select>
        </div>
      </div>
    </td>
        <td>
          <div class="form-group">
            <label class="col-md-12 control-label" >Amount</label> 
              <div class="col-md-12 inputGroupContainer">
              <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="amount" placeholder="Amount" class="form-control"  type="text">
              </div>
            </div>
          </div>
        </td>
      <td><input id="textfield" name = "unitprice" placeholder="Price/Unit"></td>
      <td> <button onclick="add()"> add new </button></td>
      </tr>
      </tbody>
    </table>
    <input type="hidden" id="cnt" name ="cnt" value=0/>
    <input type = "submit" value = "Submit "/><br />
    </form>
  </body>
</html>
