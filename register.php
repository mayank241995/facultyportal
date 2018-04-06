<?php  //this is registration page
require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>Registration page</title>
<link rel="stylesheet" href="css/style.css">
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script type="text/javascript">
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
        
        oFReader.onload = function (oFREvent){
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
           
        }
    
    // check password
      function check() {
          
  if (document.getElementById('password').value ==
    document.getElementById('cpassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
      document.getElementById('signup_btn').disabled=false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
    
    </script>
     
    
</head>
<body style="background-color:#bdc3c7">
<form class="myform" action="register.php" method="post" enctype="multipart/form-data">
<div id="main-wrapper">
<center>
<h2>Registration Form</h2>
<img id="uploadPreview" src="image/avatar.png" class="avatar"/><br>
    <input type="file" name="imglink" id="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
</center>

<label><b>Fullname:</b></label><br>
<input name="fullname" type="text" class="inputvalues" placeholder="type your fullname" required/><br>        
<label><b>Gender:</b></label>
<input  type="radio" class="radiobtns" name="gender" value="male" checked required/>Male    
<input  type="radio" class="radiobtns" name="gender" value="female"  required/>Female<br>
<label><b>Dob:</b></label><br>
<input type="date"  name="dob" max=<?php echo date('Y-m-d')?>  required/><br>
<label><b>Username:</b></label><br>
<input name="username" type="text" class="inputvalues" placeholder="type your username" required/><br>
<label><b>Password:</b></label><br>
<input name="password" id="password" type="Password" class="inputvalues" placeholder="your password" pattern=".{5,}" required title="min 5 char"/><br>
<label><b>Confirm Password:</b></label><br>
<input name="cpassword" type="Password" id="cpassword" class="inputvalues" placeholder="confirm passward" required title="min 5 char" onkeyup='check();' /><br>
    <span id='message'></span>
<input name="submit_btn" type="submit" id="signup_btn"  value="Sign Up" class="btn btn-lg btn-success" disabled=true/><br>
    <a href="index.php"><input type="button" id="back_btn"  value="Login Page" class="btn btn-lg btn-danger"/></a>
    </form>
    <?php
    if(isset($_POST['submit_btn']))
    {
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        
        $img_name = $_FILES['imglink']['name'];
        $img_size = $_FILES['imglink']['size'];
        $img_tmp = $_FILES['imglink']['tmp_name'];
        
        $directory = 'uploads/';
        $target_files = $directory.$img_name;
                
        
        
        if($password==$cpassword)
        {
            $query="select * from teachertable WHERE username='$username'";
            $query_run = mysqli_query($con,$query);
            
            if(mysqli_num_rows($query_run)>0)
            {
             //there is already a user with the same username
                echo'<script type="text/javascript"> alert("User already exists.. try anathor username")</script>';
            }
            
            
            // Check if file already exists
            else if (file_exists($target_files)) {
               echo '<script type="text/javascript"> alert("Image File already exists.. try anathor image")</script>';
              
              }
            
            // Check file size
            else if ($_FILES["imglink"]["size"] > 500000) {
                echo '<script type="text/javascript"> alert("Image file is to large")</script>';
                
            }
            else
            {
                move_uploaded_file($img_tmp,$target_files);
                $query= "insert into teachertable (username,fullname,gender,password, dob, imglink ) values('$username', '$fullname', '$gender', '$password', '$dob','$target_files')";
                //$query_run = mysqli_query($con,$query);
                
                if(mysqli_query($con,$query))
                {
                    header('location:index.php?msg=1');
                }
                 else
                {
                    echo mysqli_error($con);
                }
                
                    
            }
        }
         else
                {
                    echo '<script type="text/javascript"> alert("password and confirm password doesnot match!!")</script>';
                }
        
    }
    
    ?>
</div>
</body>
</html>