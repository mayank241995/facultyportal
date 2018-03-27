<?php
require 'dbconfig/config.php';
session_start();
if(!isset($_SESSION['tid']))
    header('location:index.php');
    $tid=$_SESSION['tid'];
    
    $query="select t.fullname,t.imglink,p.tid,p.education, p.experience,p.researcharea,p.designation,p.yearexp,p.keypub,p.pd from teachertable t,profiledb p where t.id=".$tid." and p.tid=".$tid;
$res = mysqli_query($con,$query)or die("Could not retrieve data: " .mysqli_error($con));
$row = mysqli_fetch_array($res);
$fullname = $row['fullname'];
$imglink = $row['imglink'];
$tid = $row['tid'];
$education = $row['education'];
$experience = $row['experience'];
$researcharea = $row['researcharea'];
$designtation = $row['designation'];
$yearexp = $row['yearexp'];
$keypub = $row['keypub'];
$pd = $row['pd'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Profile</title>
<link rel="stylesheet" href="css/style.css">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body style="background-color:#bdc3c7">
<div>
<center>
<h2>Edit Profile</h2>
<img src="image/avatar.png" class="avatar"/>
</center>
<br><br>
<form action="profile.php" method="post" >
<div class="col-md-6 form-group">
<label><b>Designation:</b></label><br>
<input name="designation" type="text" class="inputvalues form-control" placeholder="prof.xyz" value="<?php echo $designtation;?>" required/>
    </div>
    <div class="col-md-6 form-group">
<label><b>Year of experience:</b></label><br>
<input name="yearexp" type="number" class="inputvalues form-control" placeholder="your experience" value="<?php echo $yearexp;?>" required/>
        </div>
    <div class="col-md-6 form-group">
<label><b>Education:</b></label><br>
        <textarea name="education"  class="inputvalues form-control" placeholder="your education" required rows="5" cols="10"><?php echo $education;?></textarea>
    </div>
    <div class="col-md-6 form-group">
<label><b>Experience:</b></label><br>
    <textarea name="experience"  class="inputvalues form-control" placeholder="your experience" required rows="5" cols="10"><?php echo $experience;?></textarea>
    </div>
    <div class="col-md-6 form-group">
<label><b>Research Area:</b></label><br>    
        <textarea name="researcharea"  class="inputvalues form-control" placeholder="your research" rows="5" cols="10" ><?php echo $researcharea ;?></textarea>
    </div>
    <div class="col-md-6 form-group">
<label><b>Key Publications:</b></label><br>
        <textarea name="keypub"  class="inputvalues form-control" placeholder="your publications" rows="5" cols="10" ><?php echo $keypub;?></textarea>
    </div>
    <div class="col-md-6 form-group">
<label><b>Personal Distinctions:</b></label><br>
        <textarea name="pd" class="inputvalues form-control" placeholder="your distinctions" rows="5" cols="10" ><?php echo $pd;?></textarea>
    </div>
    <div class="col-md-6 col-md-offset-3">
<input name="submit_btn" type="submit" id="signup_btn" class="btn btn-lg btn-success btn-center" value="Submit"/>
        <br><br>
    </div>
    
</form>
    <?php
    
    if(isset($_POST['submit_btn']))
    {
        $designation = $_POST['designation'];
        $yearexp = $_POST['yearexp'];
        $education = $_POST['education'];
        $experience = $_POST['experience'];
        $researcharea = $_POST['researcharea'];
        $keypub = $_POST['keypub'];
        $pd = $_POST['pd'];
        $tid = $_SESSION['tid'];
        
        
         $query= "insert into profiledb (designation,yearexp,education,experience, researcharea, keypub, pd,tid ) values('$designation', '$yearexp', '$education', '$experience', '$researcharea','$keypub','$pd','$tid')";
        
        if(mysqli_query($con,$query))
                {
                    echo '<script type="text/javascript"> alert("Update Successfull")</script>';
                }
                 else
                {
                    echo mysqli_error($con);
                }    
    
    }
    ?>
    
</div>
</body>
</html>