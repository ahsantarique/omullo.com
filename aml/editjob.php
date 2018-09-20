<?php
   include_once("header.php");
   
	$jid=$_GET['jid'];
	$subjid=$_GET['subjid'];
   
	// $sql= "SELECT MAX(`jid`) from `jobs`;";
	// $result= mysqli_query($db,$sql) or die("Failed to add job! Try again!");
	// $row= $result->fetch_assoc();
	// $curjid=$row['MAX(`jid`)'];
	
	$sql= "SELECT `cfxrate` from `clients`;";
	$res= mysqli_query($db,$sql) or die("Failed to add job! Try again!");
	while($row = $res->fetch_array(MYSQLI_ASSOC)) {
		$myArray[] = $row['cfxrate'];
	}
    	$json_array = json_encode($myArray);
	//echo "$json_array";
	//echo "Successfully found $curjid!";

	
	if(isset($_POST['editjob'])){
	
      
      $job_name= mysqli_real_escape_string($db,$_POST['job_name']); 
      $client= $_POST['client']; 
      $production= $_POST['production']; 
      $downlink= $_POST['downlink']; 
      $uplink= $_POST['uplink'];
      $amount = $_POST['amount'];
      $sday= $_POST['sday']; 
     // $smonth= $_POST['smonth']; 
      //$syear= $_POST['syear']; 
      $shour= $_POST['shour']; 
      $sminute= $_POST['sminute'];
      $sampm = $_POST['sampm']; 
      $eday= $_POST['eday']; 
      // $emonth= $_POST['emonth']; 
      // $eyear= $_POST['eyear']; 
      $ehour= $_POST['ehour']; 
      $eminute= $_POST['eminute']; 
       $eampm = $_POST['eampm'];
      $msk= isset($_POST['msk']); 
      $clip= isset($_POST['clip']); 
      $alp= isset($_POST['alp']); 
      $cc= isset($_POST['cc']); 
      $ret= isset($_POST['ret']); 
      $vct= isset($_POST['vct']);
      $jobdescription= $_POST['jobdescription'];
      $cprice = $_POST['cpricee'];
      $sid=$_POST['sid'];
      $pricep=$_POST['pricena'];
      //$subjid=$POST['subjid'];
// $std='$sday $shour:$sminute:00';
// $end='$eday $ehour:$eminute:00';

      $manager = $_SESSION['login_user'];
      if($sampm=='pm') $shour+=12;
      if($eampm=='pm') $ehour+=12;
  

$sql="UPDATE jobs SET jname='$job_name',amount='$amount',cprice='$cprice',pprice='$pricep',description='$jobdescription',startdate='$sday',enddate='$eday',downlink='$downlink',uplink='$uplink', ccode='$client',ecode='$production',mcode='$manager' , msk='$msk',alp='$alp',cc='$cc',ret='$ret',vct='$vct', clip='$clip', sid='$sid' WHERE jid='$jid' AND subjid='$subjid' ";
$result=mysqli_query($db,$sql);

 if($result === FALSE){ die(mysql_error());}
   echo "Successfully edited!";		
   }
?>


      
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
				//pprice.value = cprice.value*fxrate[e.selectedIndex-1]*percentval.value/100;
        var otherprice=$('.otherval').val();
        $(".pprice").val(otherprice);
			}
		      break;
		    }
		}
	}
	
	//-->
	</script>

   </head>

   <body>


	<div class="container">
	
	<form class="well form-horizontal" action=" " method="POST"  id="contact_form">
<fieldset>
<?php 

$sql="SELECT * from jobs where jid='$jid' and subjid='$subjid' ";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result);
 if($row === FALSE){ die(mysql_error());}
 ?>
<table class="table-striped table">
  <tr>
    <td>
      <div class="form-group">
        <label class="col-md-12 " >Job Name</label> 
          <div class="col-md-12 inputGroupContainer">
          <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input name="job_name" placeholder="Job Name" class="form-control" value="<?php echo $row['jname']; ?>" type="text">
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="form-group">
        <label class="col-md-12 " >Amount</label> 
          <div class="col-md-12 inputGroupContainer">
          <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input name="amount" placeholder="Amount" class="form-control" value="<?php echo $row['amount']; ?>" type="text">
          </div>
        </div>
</div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="form-group" id="client"> 
        <label class="col-md-12 ">Client</label>
          <div class="col-md-12 selectContainer">
          <select name="client" id = "clientlist" class="form-control selectpicker"  onChange="calculate()">
            <option value="" >Select client</option>
            <?php
              $sql="select * from clients;";
              $result = mysqli_query($db,$sql);
        while($rowc = mysqli_fetch_array($result)) {          
            ?>
            <option value="<?php echo $rowc['ccode']; ?>" <?php if($rowc['ccode']==$row['ccode']){echo "selected";} ?>><?php echo $rowc['ccode']; ?></option>
            <?php }  ?>
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
         
          </select>
          
         </div>
      </div>
    </td>
    <td>
      <div class="form-group">
          <label class="col-md-12 " >Shift In-charge</label> 
            <div class="col-md-12 inputGroupContainer">
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <select class="form-control" name="sid">
              <option value="">--Select One--</option>
              <?php $sql="SELECT * from user where usercategory='in-charge' ";$result=mysqli_query($db,$sql);while($rowuc=mysqli_fetch_array($result)){ ?>
              <option value="<?php echo $rowuc['usercode']; ?>" <?php if($rowuc['usercode']==$row['sid']){echo "selected";} ?>  ><?php echo $rowuc['username']; ?></option>
              <?php } ?>
            </select>
            </div>
          </div>
        </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="form-group"> 
        <label class="col-md-12 ">Production Price</label>
          <div class="col-md-12 selectContainer">
          <!-- <select name="production" class="form-control selectpicker" >
            <option value=" " >Select production</option>
            <?php
              $sql="select * from user where usercategory='employee';";
              $result = mysqli_query($db,$sql);
        while($rowp = mysqli_fetch_array($result)) {
            $var=$rowp['usercode'];         
            ?>     
            <option value="<?php echo $var; ?>" <?php if($var==$row['ecode']){echo "selected";} ?> ><?php echo $var ?></option>            
            <?php } ?> 
          </select> -->
           <input name="cpricee" id="cprice" placeholder="Price/Unit" class="form-control"  value="<?php echo $row['cprice']; ?>" type="text" onChange="calculate()">
          <input name="pricena" id= "pprice" placeholder="Price/Unit" class="form-control pprice" readonly value="<?php echo $row['pprice']; ?>"  type="text" >

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
                <input name="percentval" id = "percentval"   onChange="calculate()" placeholder="Other" class="form-control otherval" type="text">
        </div>
      </div>
    </td>
    <td>
      <div class="form-group"> 
        
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="form-group">
        <label class="col-md-12">Download Link</label>  
          <div class="col-md-12 inputGroupContainer">
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
              <input name="downlink" placeholder="Download" value="<?php echo $row['downlink']; ?>" class="form-control" type="text">
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="form-group">
        <label class="col-md-12 ">Upload Link</label>  
          <div class="col-md-12 inputGroupContainer">
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
              <input name="uplink" placeholder="Upload" value="<?php echo $row['uplink']; ?>" class="form-control" type="text">
          </div>
        </div>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="form-group"> 
        <label class="col-md-12 ">Start Date</label>
          <div class="col-md-12 selectContainer">
          <div class="input-group">
            <div class="form-group">
              <input name="sday" placeholder="day" class="form-control" value="<?php echo $row['startdate']; ?>"  type="date">           
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
    </td>
    <td>
      <div class="form-group"> 
        <label class="col-md-12">End Date</label>
          <div class="col-md-12 selectContainer">
          <div class="input-group">
            <div class="form-group">
              <input name="eday" placeholder="day" class="form-control" value="<?php echo $row['enddate']; ?>"  type="date">
            
          <select name="ehour" class="form-control selectpicker" >
            <option value=" " >Hour</option>
            <?php for ($i=1; $i<=12; $i++) echo "<option>$i</option>" ?>
          </select>

          <select name="eminute" class="form-control selectpicker" >
            <option value=" " >Minute</option>
            <?php for ($i=0; $i<60; $i++) echo "<option>$i</option>" ?>
          </select>
          <select name="eampm" class="form-control selectpicker" >
            <option value=" " >am/pm</option>
            <option>am</option>
            <option>pm</option>
          </select>
        </div>
      </div>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="form-group">
                <label class="col-md-12 ">Check appropriates:</label>
                <div class="col-md-12">
                  <table class="table">
                    <tr>
                      <td><input type="checkbox" name="clip" value="1" <?php if($row['clip']==1){echo "checked";} ?> /> Clip</td>
                      <td><input type="checkbox" name="msk" value="1" <?php if($row['msk']==1){echo "checked";} ?> /> Msk</td>
                      <td><input type="checkbox" name="alp" value="1" <?php if($row['alp']==1){echo "checked";} ?>/> Alp</td>
                      <td><input type="checkbox" name="cc" value="1" <?php if($row['cc']==1){echo "checked";} ?>/> CC</td>
                      <td><input type="checkbox" name="ret" value="1" <?php if($row['ret']==1){echo "checked";} ?>/> Ret</td>
                      <td><input type="checkbox" name="vct" value="1" <?php if($row['vct']==1){echo "checked";} ?>/> Vct</td>
                    </tr>
                  </table>
                </div>
            </div>
    </td>
    <td>
      <div class="form-group">
        <label class="col-md-12 ">Job Description</label>
          <div class="col-md-12 inputGroupContainer">
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <textarea class="form-control" name="jobdescription"  value=""><?php echo $row['description']; ?></textarea>
        </div>
        </div>
      </div>
    </td>
  </tr>
</table>

<!-- Button -->
<br>
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" name="editjob" class="btn btn-warning" >Submit <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>




</fieldset>
</form>
</div>
    </div><!-- /.container -->


    
   </body>
</html>


<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>