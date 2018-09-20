<?php
include("header.php");
?>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#bbb;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#594F4F;background-color:#E0FFEB;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#493F3F;background-color:#9DE0AD;}
.tg .tg-b44r{background-color:#cbcefb;vertical-align:top}
.tg .tg-yzt1{background-color:#efefef;vertical-align:top}
.tg .tg-jgco{font-size:18px;background-color:#ffffff;vertical-align:top}
.tg .tg-3we0{background-color:#ffffff;vertical-align:top}
.tg .tg-i81m{background-color:#ffffff;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
</style>


<div class="row well">

    <form class=" form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>New Jobs</legend>


<table class="tg table table-bordered table-striped" id="example3">
	<thead>
		<tr>
	    <th class="tg-b44r"></th>
	    <th class="tg-b44r"></th>
	    <th class="tg-b44r"></th>
	    <th class="tg-b44r">
	    	<select class="cid">
	    		<option value="">--Select CID--</option>
	    		<?php 
	    			//$sql = "SELECT * FROM clients ";
	    			$sql = "SELECT * FROM jobs where ul=1 and subjid=0 group by ccode ";
	    			$result = mysqli_query($db,$sql)or die(mysqli_error());
	    			while($row = mysqli_fetch_array($result)) {
	    		 ?>
	    		 <option value="<?php echo $row['ccode']; ?>"><?php echo $row['ccode']; ?></option>
	    		 <?php } ?>
	    	</select>
	    </th>	    
	    <th class="tg-b44r" colspan="2">
	    	<input type="radio" name="date" class="date" value="startdate">Incoming
	    	<input type="radio" name="date" class="date" value="delivered">Delivered
	    </th>

	    </th>
	    <th class="tg-b44r">
	    	<input type="date" class="std" value="">
	    </th>
	    <th class="tg-b44r">
	    	<input type="date" class="end" value="">
	    </th>
	    
	    <th class="tg-b44r"></th>	    
	    <th class="tg-b44r"></th>
	    <th class="tg-b44r"></th>
	    <th class="tg-b44r"></th>
	    <th class="tg-b44r"></th>
	    <th class="tg-b44r"></th>
	    <th class="tg-b44r"></th>
	    <th class="tg-b44r"></th>
	    <th class="tg-b44r"></th>
	  </tr>
	  <tr>
	  	<th colspan="22" style="text-align:center"><span class="btn btn-default filter">Filter Job List</span></th>
	  </tr>
  <tr>
    <th class="tg-b44r">Task ID</th>
    <th class="tg-b44r">Folder</th>
    <th class="tg-b44r">CID</th>
    <th class="tg-b44r">QTY</th>
    <th class="tg-b44r">Rate</th>
    <th class="tg-b44r">Value</th>
    <th class="tg-b44r">Incoming </th>
    <th class="tg-b44r">Delivered</th>
    <th class="tg-b44r">DL</th>
    <th class="tg-b44r">UL</th>
    <th class="tg-b44r">Clip</th>
    <th class="tg-b44r">Vct</th>
    <th class="tg-b44r">Mas</th>
    <th class="tg-b44r">Ret</th>
    <th class="tg-b44r">Col</th>
    <th class="tg-b44r">Alp</th>
    <th class="tg-b44r">Status</th>

  </tr>
  </thead>
  <tbody>
  
     <?php
   	//include('config.php');

	
	$sql = "SELECT * from jobs where jid not in (SELECT jid from jobs where ul = 0) and subjid=0 ";
	
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
		$value=$amount*$cprice;
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
		if($i==0){
		  echo "<tr>
		    <td class=\"tg-3we0\"><a href=\"jobdetails.php?jid=$jid&subjid=$subjid\">$jid.$subjid</a></td>
		    <td class=\"tg-3we0\">$description</td>
		    <td class=\"tg-3we0\">$ccode</td>		    
		    <td class=\"tg-3we0\">$amount</td>	
		    <td class=\"tg-3we0\">$cprice</td>
		    <td class=\"tg-3we0\">$value</td>   	    
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
		    <td class=\"tg-yzt1\">$ccode</td>		   
		    <td class=\"tg-yzt1\">$amount</td>
		    <td class=\"tg-yzt1\">$cprice</td>
		    <td class=\"tg-3we0\">$value</td>  	
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
</tbody>
</table>

</fieldset>
</form>
</div>
</div><!-- /.container -->

<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
    $("#example3").DataTable(); 
  });
  
 $('#example3').on('click', '.filter', function (event) {
   var cid=$('.cid option:selected').val();
   var datetype=$('input[name=date]:checked').val();
   var std=$('.std').val();
   var end=$('.end').val();
   //alert(datetype);      
	if(datetype=='startdate'|| datetype=='delivered'){
		$.post('action/invoicefilterwithdate.php',{cid:cid,datetype:datetype,std:std,end:end},function(data){
      	$.get("action/invoicefilterwithdate.php?cid="+cid+"&datetype="+datetype+"&std="+std+"&end="+end,function(data){
      		//alert(datetype);
      		$('tbody').html(data);
      	})
      })
	}else{
		$.post('action/invoicefilter.php',{cid:cid},function(data){
      	$.get("action/invoicefilter.php?cid="+cid,function(data){
      		//alert('ok');
      		$('tbody').html(data);
      	})
      })
	}
 });
</script>




