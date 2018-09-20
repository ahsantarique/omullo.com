<?php
   include("session.php");
   
	$jid=$_GET['jid'];
	$subjid=$_GET['subjid'];
   
	$sql= "SELECT MAX(`jid`) from `jobs`;";
	$result= mysqli_query($db,$sql) or die("Failed to add job! Try again!");
	$row= $result->fetch_assoc();
	$curjid=$row['MAX(`jid`)'];
	
	$sql= "SELECT `cfxrate` from `clients`;";
	$res= mysqli_query($db,$sql) or die("Failed to add job! Try again!");
	while($row = $res->fetch_array(MYSQL_ASSOC)) {
		$myArray[] = $row['cfxrate'];
	}
    	$json_array = json_encode($myArray);
	//echo "$json_array";
	//echo "Successfully found $curjid!";

	
	
	
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
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
      $subjid=$POST['subjid'];

      /*echo "$job_id";
      echo "$job_name";
      echo "$client";
      echo "$amount";
      echo "$eday";
      echo "$sday";
      echo "$eminute";
      echo "$eampm";
      echo "$msk";
      echo "$alp";
      echo "$cc";
      echo "$ret";
      echo "$vct";
      echo "$jobdescription";
      echo $_SESSION['login_user'];*/
      $manager = $_SESSION['login_user'];
      if($sampm=='pm') $shour+=12;
      if($eampm=='pm') $ehour+=12;
      
      
	
      
      $sql="UPDATE  `wwwomullo_main`.`jobs` SET  `jname` =  '$job_name',
	`amount` =  '$amount',
	`cprice` =  '$cprice',
	`pprice` =  '$pprice',
	`description` =  '$jobdescription',
	`startdate` =  '$sday $shour:$sminute:00',
	`enddate` = '$eday $ehour:$eminute:00',
	`downlink` =  'adsf13232132132',
	`uplink` =  'adf132132132132',
	`ccode` =  '$client',
	`ecode` =  '$production',
	`mcode` =  '$manager',
	`msk` =  '$msk',
	`alp` =  '$alp',
	`cc` =  '$cc',
	`ret` =  '$ret',
	`vct` =  '$vct' WHERE  `jobs`.`jid` =1 AND  `jobs`.`subjid` =0;";
   $result = mysqli_query($db,$sql) or die("Failed to edit the job! Try again!");
   echo "Successfully edited!";		
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
<legend>Hello, <?php echo $_SESSION['login_user'] ?>, Edit this job!</legend>


<!-- Text input-->
<br>
<div class="form-group">
  <label class="col-md-4 control-label" >Job Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="job_name" placeholder="Job Name" class="form-control"  type="text">
    </div>
  </div>
</div>


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
<div class="form-group" id="client"> 
  <label class="col-md-4 control-label">Client</label>
    <div class="col-md-4 selectContainer">
    <select name="client" id = "clientlist" class="form-control selectpicker"  onChange="calculate()">
      <option value=" " >Select client</option>
      <?php
      	$sql="select * from clients;";
        $result = mysqli_query($db,$sql);
	while($row = mysqli_fetch_array($result)) {
	    $var=$row['ccode'];
	    echo "<option> $var </option>";
	} 
	
      ?>
	  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	  <input name="cprice" id="cprice" placeholder="Price/Unit" class="form-control"  type="text" onChange="calculate()">
    </select>
    
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
      	  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	  <input name="pprice" id= "pprice" placeholder="Price/Unit" class="form-control"  type="text" >

          <label>
              <input type="radio" name="percent" value="v1" onChange="calculate()"/> 25%
          </label>
          <label>
              <input type="radio" name="percent" value="v2" onChange="calculate()"/> 45%
          </label>
          <label>
              <input type="radio" name="percent" value="v3" checked="checked" onChange="calculate()"/> 55%
          </label>
          <label>
              <input type="radio" name="percent" value="v4" onChange="calculate()"/> 65%
          </label>
          <label>
              <input type="radio" name="percent" value="v5" onChange="calculate()"/>
          </label>
          <input name="percentval" id = "percentval"   onChange="calculate()" placeholder="Other" class="form-control" type="text">
          
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
<!-- Text input-->
<br>       
<div class="form-group">
  <label class="col-md-4 control-label">Upload Link</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="uplink" placeholder="Upload" class="form-control" type="text">
    </div>
  </div>
</div>


<!-- Select Basic -->
<br>   
<div class="form-group"> 
  <label class="col-md-4 control-label">Start Date</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
      <div class="form-group">
        <input name="sday" placeholder="day" class="form-control"  type="date">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="shour" class="form-control selectpicker" >
      <option value=" " >Hour</option>
      <?php for ($i=1; $i<=12; $i++) echo "<option>$i</option>" ?>
    </select>

    <select name="sminute" class="form-control selectpicker" >
      <option value=" " >Minute</option>
      <?php for ($i=0; $i<60; $i++) echo "<option>$i</option>" ?>
    </select>
    <select name="sampm" class="form-control selectpicker" >
      <option value=" " >am/pm</option>
      <option>am</option>
      <option>pm</option>
    </select>
  </div>
</div>
</div>

<!-- Select Basic -->
<br>   
<div class="form-group"> 
  <label class="col-md-4 control-label">End Date</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
      <div class="form-group">
        <input name="eday" placeholder="day" class="form-control"  type="date">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="shour" class="form-control selectpicker" >
      <option value=" " >Hour</option>
      <?php for ($i=1; $i<=12; $i++) echo "<option>$i</option>" ?>
    </select>

    <select name="sminute" class="form-control selectpicker" >
      <option value=" " >Minute</option>
      <?php for ($i=0; $i<60; $i++) echo "<option>$i</option>" ?>
    </select>
    <select name="sampm" class="form-control selectpicker" >
      <option value=" " >am/pm</option>
      <option>am</option>
      <option>pm</option>
    </select>
  </div>
</div>
</div>




<!-- radio checks -->
<br>
<div class="form-group">
                        <label class="col-md-4 control-label">Check appropriates:</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <input type="checkbox" name="clip" value="Clip" /> Clip
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="checkbox" name="msk" value="Msk" /> Msk
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="checkbox" name="alp" value="Alp" /> Alp
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="checkbox" name="cc" value="CC" /> CC
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="checkbox" name="ret" value="Ret" /> Ret
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="checkbox" name="vct" value="Vct" /> Vct
                                </label>
                            </div>
                        </div>
                    </div>

<!-- Text area -->
<br>  
<div class="form-group">
  <label class="col-md-4 control-label">Job Description</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        	<textarea class="form-control" name="jobdescription" placeholder="Job Description"></textarea>
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