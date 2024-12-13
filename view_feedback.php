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
    include('auth.php');
    $username = $_SESSION['username'];
    $query=mysqli_query($con, "SELECT * from `feedback` where technician_username='$username'");
    echo "<table border='1'> 
    <tr>
    <th>User</th>
    <th>Rating</th>
    <th>Comments</th>
    </tr>";
    while($row = mysqli_fetch_array($query))
    {
    echo "<tr>";
    echo "<td>" . $row['user_username'] . "</td>";
    echo "<td>" . $row['rating'] . "</td>";
    echo "<td>" . $row['comments'] . "</td>";
    
  
    echo "</tr>";
    }
    echo "</table>";
?>
</div>
</body>
</html>