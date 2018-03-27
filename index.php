<?php
session_start();
require 'dbconfig/config.php';
if(isset($_GET['msg']))
    echo '<script async >alert("Registration Sucessful..")</script>';
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background-color:#bdc3c7">
<div id="main-wrapper">
<center>
<h2>Login Form</h2>
<img src="image/avatar.png" class="avatar"/>
</center>
<form class="myform" action="index.php" method="post">
<label><b>Username:</b></label><br>
<input name="username" type="text" class="inputvalues" placeholder="type your username"/><br>
<label><b>Password:</b></label><br>
<input name="password" type="Password" class="inputvalues" placeholder="type your username" required/>
<input name="login" type="submit" id="login_btn" value="login" class="btn btn-lg btn-success" required/>
    <a href="register.php"><input type="button" id="registration_btn" value="register" class="btn btn-lg btn-primary"/></a>
</form>
    <?php
    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "select * from teachertable WHERE username='$username' AND password='$password' ";
        
        $query_run = mysqli_query($con,$query);
        if(mysqli_num_rows($query_run)>0)
        {
            $row = mysqli_fetch_assoc($query_run);
            //valid
         $_SESSION['tid']=$row['id'];
         $_SESSION['username']=$row['username'];
         $_SESSION['imagelink']=$row['imglink'];
            //echo $_SESSION['imagelink'];
            $_SESSION['login']=1;
        header('location:homepage.php');
        }
        else
        {
            //invalid
            echo'<script type="text/javascript"> alert("Oops!! Invalid User")</script>';
        }
        
    }
    ?>
</div>
</body>
</html>