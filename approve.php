<?php
require('db.php');
$username=$_REQUEST['username'];
$query1   = "UPDATE `technicians` set status='approved' where username='$username'";
$result1  = mysqli_query($con, $query1);
header("Location: admin_home.php"); 
?>