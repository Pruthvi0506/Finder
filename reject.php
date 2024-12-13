<?php
require('db.php');
$username=$_REQUEST['username'];
$query = "DELETE FROM `technicians` WHERE username='$username'"; 
$result = mysqli_query($con,$query);
header("Location: admin_home.php"); 
?>