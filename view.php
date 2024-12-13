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
            <li><a href="home_admin">Home</a>&nbsp;&nbsp;</li>
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
 
    $username = $_REQUEST['username'];
    $query=mysqli_query($con, "SELECT * from technicians where username='$username'");
    echo "<table border='1'> 
    <tr>
    <th></th>
    <th>Details</th>
    </tr>";
    while($row = mysqli_fetch_array($query))
    {
    echo "<tr>";
    echo "<td>Name</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Phone Number</td>";
    echo "<td>" . $row['phnum'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Profession</td>";
    echo "<td>" . $row['technicianType'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Experience</td>";
    echo "<td>" . $row['workexp'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Address</td>";
    echo "<td>" . $row['city'] . "," . $row['zip']. "</td>";
    echo "</tr>";
    }
    echo "</table>";
    echo "<p class='link'><a href='home_admin.php'>Back</a></p>";
?>
</div>
</body>
</html>