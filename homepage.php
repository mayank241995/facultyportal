<?php
session_start();
//$img=$_SESSION['imagelink'];

if(!isset($_SESSION['login']))
    header('location:index.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Home page</title>
<link rel="stylesheet" href="css/style.css">
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body style="background-color:#bdc3c7">
<div id="main-wrapper">
<center>
<h2>Home page</h2>
<h3>Welcome 
    <?php
    echo $_SESSION['username']
    ?>
    </h3>
<?php echo '<img class="avatar" src="'.$_SESSION['imagelink'].'" />';
        //echo $_SESSION['imagelink'];
    ?>
</center>
<form class="myform" action="homepage.php" method="post">

<!--<input name ="profile" type="submit" id="profile_btn" value="Profile"/>    -->
    <br>
<a href="profile.php" class="btn btn-lg btn-success btn-block">Profile</a>
<input name ="logout" type="submit" class="btn btn-lg btn-danger btn-block" value="Logout"/>
</form>
    <?php
       if(isset($_POST['logout']))
       { 
        session_destroy();
        header('location:index.php');
       }
?>
</div>
</body>
</html>