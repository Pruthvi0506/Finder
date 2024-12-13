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
            <li><a href="posts.php">Post</a>&nbsp;&nbsp;</li>
            <li><a href="upcoming_schedule_user.php">Schedules</a>&nbsp;&nbsp;</li>
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
    $query=mysqli_query($con, "SELECT * from `technicians` where status='approved'");
    echo "<table border='1'> 
    <tr>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Technician Type</th>
    <th> Work Exp</th>
    <th> Rating</th>
    <th> Select </th>
    </tr>";
    while($row = mysqli_fetch_array($query))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['phnum'] . "</td>";
    echo "<td>" . $row['technicianType'] . "</td>";
    echo "<td>" . $row['workexp']. "</td>";
    $tech_username = $row['username'];
    $query1=mysqli_query($con, "SELECT avg(rating) as 'avg_rating' FROM `feedback`  WHERE technician_username='$tech_username' group by technician_username");
    $rows_count = mysqli_num_rows($query1);

    if ($rows_count==1){
        $rows1=mysqli_fetch_array($query1);
        echo "<td>".$rows1['avg_rating']."/5.00</td>";

    }
    else{
        echo "<td>No rating available</td>";
    }
  
    ?>
    <td><a href="schedule.php?username=<?php echo $row['username']?>">Select</a></td>
    <?php
    
  
    
    echo "</tr>";
    }
    echo "</table>";
?>
</div>
</body>
</html>