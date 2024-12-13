<?php
require('db.php');
$id=$_GET['id'];
$query1   = "UPDATE `appointments` set status='done' where appointment_id='$id'";
$result1  = mysqli_query($con, $query1);
header("Location: upcoming_schedule_technician.php"); 
?>