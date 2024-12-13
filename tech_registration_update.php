<?php
    require('db.php');
    $name = stripslashes($_POST['name']);
    $name = mysqli_real_escape_string($con, $name);
    $phnum = stripslashes($_POST['phnum']);
    $phnum = mysqli_real_escape_string($con, $phnum);
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $city = stripslashes($_POST['city']);
    $city = mysqli_real_escape_string($con, $city);
    $zip = stripslashes($_POST['zip']);
    $zip = mysqli_real_escape_string($con, $zip);
    $workexp = stripslashes($_POST['workexp']);
    $workexp = mysqli_real_escape_string($con, $workexp);
    $technicianType = stripslashes($_POST['technicianType']);
    $technicianType = mysqli_real_escape_string($con, $technicianType);
    $query    = "INSERT into `technicians` (name, phnum, email, username, password, city, zip, workexp, technicianType, status)
                     VALUES ('$name', '$phnum', '$email', '$username','$password', '$city', '$zip', '$workexp', '$technicianType', 'pending')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
              <h3>You are registered successfully.</h3><br/>
              <p class='link'>Click here to <a href='index.php'>Login</a></p>
              </div>";
        } else {
            echo "<div class='form'>
                <h3>Required fields are missing.</h3><br/>
                <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                </div>";
        }
    
?>