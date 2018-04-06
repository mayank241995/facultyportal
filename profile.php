<?php
require 'dbconfig/config.php';
session_start();
if(!isset($_SESSION['tid']))
    header('location:index.php');
    $tid=$_SESSION['tid'];
    
    $imglink=$education=$experience=$researcharea=$designation=$yearexp=$keypub=$pd="";

    $query="select t.fullname,t.imglink,p.tid,p.education, p.experience,p.researcharea,p.designation,p.yearexp,p.keypub,p.pd from teachertable t,profiledb p where t.id=".$tid." and p.tid=".$tid;
$res = mysqli_query($con,$query)or die("Could not retrieve data: " .mysqli_error($con));
if(mysqli_num_rows($res)>0)
{
    $_SESSION['status']=1;
    $row = mysqli_fetch_array($res);
    $fullname = $row['fullname'];
    $imglink = $row['imglink'];
    $tid = $row['tid'];
    $education = $row['education'];
    $experience = $row['experience'];
    $researcharea = $row['researcharea'];
    $designation = $row['designation'];
    $yearexp = $row['yearexp'];
    $keypub = $row['keypub'];
    $pd = $row['pd'];

}
else
    $_SESSION['status']=0;
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Profile</title>
<link rel="stylesheet" href="css/style.css">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("file").files[0]);
        
        oFReader.onload = function (oFREvent){
            //document.getElementById("uploadPreview").src = oFREvent.target.result;
            document.getElementById("uploadPreview").innerHTML ="Choosen Image<br><img src='"+oFREvent.target.result+"' width='100' height='100' style='display: inline-block;'>";
        };
           
        }
    </script>
        <script type="text/javascript">
        
            $(document).ready(function(){
                $('#uploadModal').on('hidden.bs.modal', function () {
 location.reload();
});
  $('#upload').click(function(){

    var fd = new FormData();
    var files = $('#file')[0].files[0];
    fd.append('file',files);

    // AJAX request
    $.ajax({
      url: 'upload.php',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        if(response != 0){
          // Show image preview
          //$('#preview').append("<img src='"+response+"' width='100' height='100' style='display: inline-block;'>");
            $('#msg').text("Image Uploaded");
        }else{
          alert('file not uploaded');
        }
      }
    });
  });
});
            
        </script>


</head>
<body style="background-color:#bdc3c7">
<div>
<center>
<h2>Edit Profile</h2>
<img src="<?php echo $_SESSION['imagelink'];?>" class="avatar"/><br><br>
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#uploadModal">Change Picture</button>
</center>
     <!-- Modal -->
        <div id="uploadModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Image Upload</h4>
              </div>
              <div class="modal-body">
                <!-- Form -->
                  <div id='uploadPreview' align="center"></div>
                  <br>
                <form method='post' action='' enctype="multipart/form-data">
                  <input type='file' name='file' id='file' class='form-control' accept=".jpg,.jpeg,.png" onchange="PreviewImage();" required="true"><br>
                  <input type='button' class='btn btn-info' value='Upload' id='upload' name="submit">
                </form>

                <!-- Preview-->
                <div id='preview'></div>
                  <div align="center"><span id="msg" ></span></div>
              </div>
                     <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
            </div>

          </div>
        </div>
<br><br>
<form action="profile.php" method="post" >
<div class="col-md-6 form-group">
<label><b>Designation:</b></label><br>
<input name="designation" type="text" class="inputvalues form-control" placeholder="prof.xyz" value="<?php echo $designation;?>" required/>
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
    <form class="myform" action="homepage.php" method="post">
        <input name ="logout" type="submit" class="btn btn-lg btn-danger btn-block" value="Logout"/>
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
        
        if($_SESSION['status']==0){
         $query= "insert into profiledb (designation,yearexp,education,experience, researcharea, keypub, pd,tid ) values('$designation', '$yearexp', '$education', '$experience', '$researcharea','$keypub','$pd','$tid')";
        
        if(mysqli_query($con,$query))
                {
                    echo '<script type="text/javascript"> alert("Info. Added..!!!")</script>';
                }
                 else
                {
                    echo mysqli_error($con);
                }   
    
        }
        else if($_SESSION['status']==1)
        {
            $query="update profiledb set designation='$designation',yearexp='$yearexp',education='$education',experience='$experience',researcharea='$researcharea',keypub='$keypub',pd='$pd' where tid=$tid";
            if(mysqli_query($con,$query))
                {
                    echo '<script type="text/javascript"> alert("Update Done..!!")</script>';
                }
                 else
                {
                    echo mysqli_error($con);
                }
        }
    }
    ?>
    
</div>
</body>
</html>