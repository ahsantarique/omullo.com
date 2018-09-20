<?php include('header.php'); ?>
<html>

<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<table class="table table-bordered table-striped" id="usertable">
				<thead>
					<tr>
						<th>Sl</th>
						<th>User Name</th>
						<th>User Category</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>Phone No</th>
						<th>User Code</th>
					</tr>
				</thead>
				<tbody>
					<?php $s=0;
						$sql="SELECT * FROM user";
						$result = mysqli_query($db,$sql)or die(mysqli_error());
						while($row = mysqli_fetch_array($result)) {
					 ?>
					 <tr>
					 	<td><?php echo $s; ?></td>
					 	<td><?php echo $row['username']; ?></td>
					 	<td><?php echo $row['usercategory']; ?></td>
					 	<td><?php echo $row['fullname']; ?></td>
					 	<td><?php echo $row['email']; ?></td>
					 	<td><?php echo $row['phone']; ?></td>
					 	<td><?php echo $row['usercode']; ?></td>
					 </tr>
					 <?php ++$s;} ?>
				</tbody>
			</table>
		</div>
		<div class="col-sm-4">
			<form method="post">
				<table class="table well">
					<tr>
						<th colspan="2" class="text-center">Add User</th>
					</tr>
					<tr>
						<td>User Name</td>
						<td><input type="text" name="username" id="username" class="form-control" required> <span id="message"></span></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" class="form-control" required onClick="usernamecheck()"></td>
					</tr>
					<tr>
						<td>User Code</td>
						<td><input type="text" name="usercode" id="usercode" class="form-control" required></td>
					</tr>
					<tr>
						<td>Full Name</td>
						<td><input type="text" name="fullname" class="form-control" required></td>
					</tr>
					<tr>
						<td>User Category</td>
						<td>
							<select class="form-control" name="usercategory" required>
								<option value="">--Select One--</option>
								<option value="Admin">Admin</option>
								<option value="Manager">Manager</option>
								<option value="In-charge">In-Charge</option>
								<option value="Employee">Employee</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" class="form-control"></td>
					</tr>
					<tr>
						<td>Phone</td>
						<td><input type="text" name="phone" class="form-control"></td>
					</tr>
					<tr>
						<td colspan="2" class="text-center"><button type="submit" name="saveuser" class="btn btn-info">Save</button></td>
					</tr>
					<?php 
						if(isset($_POST['saveuser'])){
							$username=$_POST['username'];
							$usercode=$_POST['usercode'];
							$password=$_POST['password'];
							$fullname=$_POST['fullname'];
							$usercategory=$_POST['usercategory'];
							$email=$_POST['email'];
							$phone=$_POST['phone'];

						$chk="SELECT * FROM user where username='$username' or usercode='$usercode' ";
						$checking=mysqli_query($db,$chk) or die("Faild to Check Username");
						$rowch=mysqli_fetch_array($checking);
						if($rowch==1){
							$sql="INSERT INTO  `wwwomullo_main`.`user` (
						  `username` ,
						  `fullname` ,
						  `email` ,
						  `phone` ,
						  `password` ,
						  `usercategory` ,
						  `usercode`
						  )  VALUES (
						  '$username',  '$fullname',  '$email',  '$phone',  '$password',  '$usercategory',  '$usercode'  );";
						   $result = mysqli_query($db,$sql) or die("Failed to add user! Try again please!");
						   echo "<script>alert('Successfully added!');</script>";    
						   }else{
						   	echo "<p style='color:red;'>User name or user code already exiest</p>";
						   }
						}
						 ?>
				</table>
			</form>
		</div>
	</div>

</div>
</body>
</html>



<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
//   function usernamecheck(){
//  var username= document.getElementById(username);
//  var usercode= document.getElementById(usercode);
// $.post('checkuser.php',{username:username,usercode:usercode},function(data){
//      $.get("checkuser.php?username="+username+"&usercode="+usercode,function(data){
//           $('#message').html(data);
//         });
//     });

//   }
 $(document).ready(function(){
    $("#usertable").DataTable(); 
  });
</script>