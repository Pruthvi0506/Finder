<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Feedback</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="star-rating.css"/>
<header>
<div class="container">
    <nav>
        <ul>
            <li><a href="user_home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href="posts.php">Post</a>&nbsp;&nbsp;</li>
            <li><a href="upcoming_schedule_user.php">Upcoming Schedules</a>&nbsp;&nbsp;</li>
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
  $username = $_SESSION['username'];
  $query=mysqli_query($con, "SELECT * from `appointments` where user_username='$username' and status='done'");
  $rows_count = mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);

  if(isset($_POST["feedback"]))
{ 
  $appointment_id=$row['appointment_id'];
  $technician_username=$row['technician_username'];
  $rating = stripslashes($_REQUEST['rating']);
  //escapes special characters in a string
  $rating = mysqli_real_escape_string($con, $rating);
  $comments = stripslashes($_REQUEST['comments']);
  $comments = mysqli_real_escape_string($con, $comments);
  $query1="INSERT into `feedback` (appointment_id, user_username, technician_username, rating, comments)
  VALUES ('$appointment_id', '$username', '$technician_username', '$rating','$comments')";
  $result1= mysqli_query($con, $query1);
  $query2   = "UPDATE `appointments` set status='closed' where appointment_id='$appointment_id'";
  $result2  = mysqli_query($con, $query2);
  if ($result1) {
    echo "<div class='form'>
          <h3>You have given feedback successfully.</h3><br/>
          <p class='link'>Click here to <a href='user_home.php'>Home Page</a></p>
          </div>";
} else {
    echo "<div class='form'>
          <h3>Required fields are missing.</h3><br/>
          <p class='link'>Click here to <a href='feedback.php'>Feedback</a> again.</p>
          </div>";
}
}
else{
?>
<form class="form" method="post">
    <?php
    
    if ($rows_count==1){
        echo "How much do you rate for ".$row['technician_name']."?";
        
    ?>   
  <span class="star-rating">
  <input type="radio" name="rating" value="1"><i></i>
  <input type="radio" name="rating" value="2"><i></i>
  <input type="radio" name="rating" value="3"><i></i>
  <input type="radio" name="rating" value="4"><i></i>
  <input type="radio" name="rating" value="5"><i></i>
  </span>
  <input type = "text" name="comments" placeholder="Leave Comments" class="login-input">
  <input type = "submit" name="feedback" value="feedback" class="login-button">
  </form>

 
<?php
}
}
?>
</div>