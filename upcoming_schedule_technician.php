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
            <li><a href="technician_home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href="view_feedback.php">Feedback</a>&nbsp;&nbsp;</li>
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
    $query=mysqli_query($con, "SELECT * from `appointments` where technician_username='$username' and status='approved'");
    $rows_count = mysqli_num_rows($query);
    if ($rows_count>=1){
    echo "<table border='1'> 
    <tr>
    <th>Customer Name</th>
    <th>Customer Phone Number</th>
    <th>Appointment Date</th>
    <th>Appointment Time</th>
    </tr>";
    while($row = mysqli_fetch_array($query))
    {
    echo "<tr>";
    echo "<td>" . $row['user_name'] . "</td>";
    echo "<td>" . $row['user_phnum'] . "</td>";
    echo "<td>" . $row['appointment_date'] . "</td>";
    echo "<td>" . $row['appointment_time']. "</td>"; ?>
    <td><a href="done.php?id=<?php echo $row['appointment_id']?>">Done</a></td>
    <?php
    echo "</tr>";
    }
    echo "</table>";
}
else{
    echo "<h3> You don't have any appointments</h3>";


}
?>
<p class="link"><a href="pending_schedule_technician.php">Pending Appointment Requests</a></p>
</div>
</body>
</html>