<?php
   include("session.php");
   

	
	
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
	$jid=$_GET['jid'];
	$subjid=$_GET['subjid'];
   	
	$sql= "SELECT MAX(`subjid`) from `jobs` where `jid`='$jid';";
	$result= mysqli_query($db,$sql) or die("Failed to add job! Try again!");
	$row= $result->fetch_assoc();
	$curjid=$row['MAX(`subjid`)'];
	$curjid = $curjid+1;
	echo "$curjid";
	//echo "Successfully found $curjid!";




	$sql= "SELECT * from `jobs` where `jid`='$jid' and `subjid`='$subjid';";
	$result= mysqli_query($db,$sql) or die("Failed to add job! Try again!");
	$row= $result->fetch_assoc();
      $job_name= $row['jname']; 
      $oldamount= $row['amount'];
      $client= $row['ccode']; 
      
      $jobdescription= $row['description'];
      $cprice = $row['cprice'];
      $pprice=$row['pprice'];      
      $uplink= $row['uplink'];
      $sday= $row['startdate']; 

      $eday= $row['enddate']; 
      $msk= $row['msk']; 
      $alp= $row['alp']; 
      $cc= $row['cc']; 
      $ret= $row['ret']; 
      $vct= $row['vct'];

      $production= $_POST['production']; 
      $downlink= $_POST['downlink']; 
      $amount = $_POST['amount'];


      $manager = $_SESSION['login_user'];
      
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
	`ul`
	)
	VALUES (
	'$jid',  '$curjid',  '$job_name',  '$amount',  '$cprice',  '$pprice',  '$jobdescription',  '$sday',  '$eday',  '$downlink',  '$uplink',  '$client',  '$production',  '$manager',  '$msk',  'alp',  'cc',  'ret',  '0', '0',  '0',  '0',  '0',  '0'
	);";

   	$result = mysqli_query($db,$sql) or die("Failed to split job! Try again!");

   
   	$newamount = $oldamount-$amount;
   	echo "$newamount";
   	echo "$oldamount";
   	echo "$amount";
    	$sql = "UPDATE `jobs` SET `amount`= '$newamount' WHERE `jid`= '$jid' and `subjid`='$subjid';";
    	$result = mysqli_query($db,$sql) or die("Failed to split job! Try again!");	
    	echo "Successfully added!";	
   }
?>






<html>
   
   <head>
   <title> Add Job </title>
      
   <script language="JavaScript">
	<!--
	function euroConverter(){
	document.converter.dollar.value = document.converter.euro.value * 1.470
	document.converter.pound.value = document.converter.euro.value * 0.717
	document.converter.yen.value = document.converter.euro.value * 165.192
	}
	function dollarConverter(){
	document.converter.euro.value = document.converter.dollar.value * 0.680
	document.converter.pound.value = document.converter.dollar.value * 0.488
	document.converter.yen.value = document.converter.dollar.value * 112.36
	}
	function poundConverter(){
	document.converter.dollar.value = document.converter.pound.value * 2.049
	document.converter.euro.value = document.converter.pound.value * 1.394
	document.converter.yen.value = document.converter.pound.value * 230.27
	}
	function yenConverter(){
	document.converter.dollar.value = document.converter.yen.value * 0.0089
	document.converter.pound.value = document.converter.yen.value * 0.00434
	document.converter.euro.value = document.converter.yen.value * 0.00605
	}
	function GetElementInsideContainer(containerID, childID) {
	    var elm = document.getElementById(childID);
	    var parent = elm ? elm.parentNode : {};
	    return (parent.id && parent.id === containerID) ? elm : {};
	}
	function calculate(){
		var radios = document.getElementsByName('percent');
		var percentage = [25,45,55,65];
		for (var i = 0, length = radios.length; i < length; i++) {
		    if (radios[i].checked) {
		        // do whatever you want with the checked radio
			var e = document.getElementById("clientlist");
			var client= e.options[e.selectedIndex].text;
			
    			var fxrate = <?php echo $json_array ?>;
			

			pprice.value = cprice.value*fxrate[e.selectedIndex-1]*percentage[i]/100;
			
			if(i==4){
				pprice.value = cprice.value*fxrate[e.selectedIndex-1]*percentval.value/100;
			}
			
			
		        // only one radio can be logically checked, don't check the rest
		        break;
		    }
		}
		
	}
	
	//-->
	</script>

   </head>

   <body>

	<div class="form-group" align="right">
	  <label class="col-md-4 control-label"></label>
	  <div class="col-md-4">
	    <button type="submit" class="btn btn-warning" ><a href = "mainjoblist.php"> Jobs </a><span class="glyphicon glyphicon-send"></span></button>
	    <button type="submit" class="btn btn-warning" ><a href = "logout.php">Log Out </a><span class="glyphicon glyphicon-send"></span></button>
	  </div>
	</div>
	<div class="container">
	
	<form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>Hello, <?php echo $_SESSION['login_user'] ?>, Split this job!</legend>




<!-- Text input-->
<br>
<div class="form-group">
  <label class="col-md-4 control-label" >Amount</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="amount" placeholder="Amount" class="form-control"  type="text">
    </div>
  </div>
</div>




<!-- Select Basic -->
<br>   
<div class="form-group"> 
  <label class="col-md-4 control-label">Production</label>
    <div class="col-md-4 selectContainer">
    <select name="production" class="form-control selectpicker" >
      <option value=" " >Select production</option>
      <?php
      	$sql="select * from employees;";
        $result = mysqli_query($db,$sql);
	while($row = mysqli_fetch_array($result)) {
	    $var=$row['ecode'];
	    echo "<option> $var </option>";
	} 
	
      ?>
  
    </select>
    
  </div>
</div>
<!-- Text input-->
<br>      
<div class="form-group">
  <label class="col-md-4 control-label">Download Link</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="downlink" placeholder="Download" class="form-control" type="text">
    </div>
  </div>
</div>


<!-- Button -->
<br>
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Submit <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>




</fieldset>
</form>
</div>
    </div><!-- /.container -->


    
   </body>
</html>