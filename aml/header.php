<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> .:: Omullo ::.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/datatables/dataTables.bootstrap.min.css">

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>



</head>
<body>


<nav class="navbar navbar-default">
  <div class="container-fluid container">
    <div class="navbar-header text-danger">
      <a class="navbar-brand btn-success" href="#">Omullo </a>
    </div>
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <?php 
      if($userCat=='Admin' || $userCat=='Manager'){
       ?>      
      <li><a href="mainjoblist.php">Job List</a></li>
      <!-- <li><a href="completejob.php">Complete Job List</a></li>    -->   
      <li><a href="addjob.php">Add Job</a></li>
      <li><a href="invoice.php">Invoce</a></li>
      <li><a href="bill.php">Bill</a></li>
      <li><a href="userlist.php">Users</a></li>
      <?php }elseif($userCat=='Employee'){ ?>
      <li><a href="mainjoblist.php">Job List</a></li>
      <?php }elseif($userCat=='In-charge'){ ?>
      <li><a href="mainjoblist.php">Job List</a></li>
      <li><a href="addjob.php">Add Job</a></li>
      <?php } ?>
      </ul>
      <ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a> User: <?php echo $fullname;?> </a></li>
      <li><a href = "logout.php">Log Out </a></span></li>
    </ul>
  </div>
</nav>
  





<!--   
<div class="container">
  <h3>Basic Navbar Example</h3>
  <p>A navigation bar is a navigation header that is placed at the top of the page.</p>
</div>

</body>
</html> -->

<!-- Large modal -->

