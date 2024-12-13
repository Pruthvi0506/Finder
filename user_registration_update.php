<?php
require('db.php'); 
$name = stripslashes($_REQUEST['name']);
//escapes special characters in a string
$name = mysqli_real_escape_string($con, $name);
$phnum = stripslashes($_REQUEST['phnum']);
//escapes special characters in a string
$phnum = mysqli_real_escape_string($con, $phnum);
$email    = stripslashes($_REQUEST['email']);
$email    = mysqli_real_escape_string($con, $email);
$username = stripslashes($_REQUEST['username']);
//escapes special characters in a string
$username = mysqli_real_escape_string($con, $username);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con, $password);
$query    = "INSERT into `users` (name, Mobile_Num, Email_Address, Username, Password)
                VALUES ('$name', '$phnum', '$email', '$username','$password')";
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