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
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<div class="form">
<h2>Pending Requests</h2>
<?php
    require('db.php');
    $query=mysqli_query($con, "SELECT * from technicians where status='pending'");
    echo "<table border='1' align='center'> 
    <tr>
    <th>User</th>
    <th>Approve</th>
    <th>Reject</th>
    </tr>";
    while($row = mysqli_fetch_array($query))
    {
    echo "<tr>";?>
    <td><a href="view.php?username=<?php echo $row['username']?>"><?php echo $row['username']?></a></td>
    <td><a href="approve.php?username=<?php echo $row['username']?>">Approve</a></td>
    <td><a href="reject.php?username=<?php echo $row['username']?>">Reject</a></td>
    <?php
    echo "</tr>";
    }
    echo "</table>";
?>
</div>
</body>
</html>