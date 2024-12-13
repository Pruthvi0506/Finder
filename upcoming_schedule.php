<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
<header>
<div class="container">
    <nav>
        <ul>
            <li><a href="home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href="feedback.php">Feedback</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<div class="form">
<?php
    require('db.php');
    include('auth.php');
    $username = $_SESSION['username'];
    $query=mysqli_query($con, "SELECT * from `appointments` where user_username='$username' and status='approved'");
    $rows_count = mysqli_num_rows($query);
    if ($rows_count>=1){
    echo "<table border='1'> 
    <tr>
    <th>Technician Name</th>
    <th>Technician Phone Number</th>
    <th>Appointment Date</th>
    <th>Appointment Time</th>
    </tr>";
    while($row = mysqli_fetch_array($query))
    {
    echo "<tr>";
    echo "<td>" . $row['technician_name'] . "</td>";
    echo "<td>" . $row['technician_phnum'] . "</td>";
    echo "<td>" . $row['appointment_date'] . "</td>";
    echo "<td>" . $row['appointment_time']. "</td>";
    echo "</tr>";
    }
    echo "</table>";
}
else{
    echo "<h3> You don't have any appointments</h3>";
}
?>
<p class="link"><a href="canceled_appointment.php">Canceled Appointments</a></p>
</div>
</body>
</html>