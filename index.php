<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $_SESSION['username'] =$username;
        $password = stripslashes($_REQUEST['password']);
        $usertype = stripslashes($_REQUEST['usertype']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($username=='Admin' and $password=='Admin' and $usertype=='admin'){
            header("Location: admin_home.php");
        }
        else if ($usertype=="user" ) {
            $query    = "SELECT * FROM `users` WHERE username='$username'
            AND password='$password'";
            $result = mysqli_query($con, $query);
            $rows = mysqli_num_rows($result);
            if ($rows==1){
            header("Location: user_home.php");}
            else{
                echo "<div class='form'>
                <h3>Incorrect Username/password.</h3><br/> 
                <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                </div>";

            }}
            else if ($usertype=="technician" ) {
            $query    = "SELECT * FROM `technicians` WHERE username='$username'
            AND password='$password' AND status='approved'";
            $result = mysqli_query($con, $query);
            $rows = mysqli_num_rows($result);
            if ($rows==1){
            header("Location: technician_home.php");}
            else{
                echo "<div class='form'>
                <h3>Incorrect Username/password.</h3><br/> 
                <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                </div>";}}
              
        else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/> 
                  <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<h1 style="font-size:45px;text-align:center;color:#FF0000">Technician Finder</h1>
    <form class="form" action="" method="post">
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="radio" id="usertype" name="usertype" value="user"><label for="User">User</label>
        <input type="radio" id="usertype" name="usertype" value="technician"><label for="Technician">Technician</label>
        <input type="radio" id="usertype" name="usertype" value="admin"><label for="Admin">Admin</label>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="user_registration.php">User Registration</a></p>
        <p class="link"><a href="technician_registration.php">Technician Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>