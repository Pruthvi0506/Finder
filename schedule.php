<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Technician Details</title>
    <link rel="stylesheet" href="style.css"/>
<header>
<div class="container">
    <nav>
        <ul>
            <li><a href="user_home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<?php
require('db.php');
include('auth.php');
if(isset($_POST["schedule"]))
{
$username=$_SESSION['username'];
$technician_username=$_GET['username'];
$technician_name = stripslashes($_REQUEST['technician_name']);
$technician_name = mysqli_real_escape_string($con, $technician_name);
$technician_phnum = stripslashes($_REQUEST['technician_phnum']);
$technician_phnum = mysqli_real_escape_string($con, $technician_phnum);
$appointment_date = stripslashes($_REQUEST['appointment_date']);
$appointment_date = mysqli_real_escape_string($con, $appointment_date);
$appointment_time = stripslashes($_REQUEST['appointment_time']);
$appointment_time = mysqli_real_escape_string($con, $appointment_time);
$query1=mysqli_query($con, "SELECT * from users where username='$username'");
while($row = mysqli_fetch_array($query1))
{
$user_name=$row['name'];
$user_phnum=$row['Mobile_Num'];
}
$query2= "INSERT into `appointments` (user_username, technician_username, user_name, user_phnum, technician_name, technician_phnum, appointment_date, appointment_time, status)
VALUES ('$username', '$technician_username','$user_name', '$user_phnum', '$technician_name', '$technician_phnum','$appointment_date','$appointment_time','pending')";
$result2 = mysqli_query($con, $query2);
if ($result2) {
echo "<div class='form'>
<h3>Appointment scheduled successfully</h3><br/>
<p class='link'>Click here to <a href='user_home.php'>Home</a></p>
</div>";
} else {
echo "<div class='form'>
<h3>Required fields are missing.</h3><br/>
<p class='link'>Click here to <a href='user_home.php'>Home</a> again.</p>
</div>";
}

}
else{
?>
<form class="form" action="" method="post">
<h2 style="font: size 45px;text-align:center;color:#FF0000">Book an Appointment</h2>
<?php
    $username = $_REQUEST['username'];
    $query=mysqli_query($con, "SELECT * from technicians where username='$username'");
    while($row = mysqli_fetch_array($query))
    {?>
    <input type ="text" class ="login-input" name="technician_name" value="<?php echo $row['name'];?>">
    <input type ="text" class ="login-input" name="technician_phnum" value="<?php echo $row['phnum'];?>">
    <?php
    }
    ?>
<input type="date" class="login-input" name="appointment_date" min="2022-11-22" placeholder="Appointment Date" />
<select class="login-input" name="appointment_time" id="appointment_time">
<option value="" selected="selected">Select Time </option>
<option value="8:00 AM - 10:00 AM">8:00 AM - 10:00 AM</option>
<option value="10:00 AM -12:00 PM">10:00 AM -12:00 PM</option>
<option value="12:00 PM - 2:00 PM">12:00 PM - 2:00 PM</option>
<option value="2:00 PM - 4:00 PM">2:00 PM - 4:00 PM</option>
<option value="4:00 PM - 6:00 PM">4:00 PM - 6:00 PM</option>
</select>
<input type = "submit" name="schedule" value="submit" class="login-button">
</form>
</div>
</body>
</html>
<?php
};
?>