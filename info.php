<?php
require 'dbconfig/config.php';
$tid=$_GET['id'];

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


?>
<html>
    
<head>
    <title>Responsive Design</title>
    <link href="css/style2.css" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="js/carousfredsel.js" type="text/javascript" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid  ;
    margin: 1em 0;
    padding: 0; 
    color: deepskyblue;
}
    </style>
</head>
<body>
   <header>
       <div class="container">
           <div class="row">
               <a href=""><img src="image/uem1.png"></a>
               <nav>
                   <ul>
                       
                        <li><a href="">Home</a></li>
                        <li><a href="">Work</a></li>
                        <li><a href="">Service</a></li>
                        <li><a href="">Client</a></li>
                        <li><a href="#Ourteam">Our Team</a></li>
                        <li><a href="">Contact</a></li>
                       
                   </ul>
               </nav>
           </div>
       </div>
   </header>
   <section class="slider" style="background-color:#535456;">
    
       <ul>
       <li class="img2" >
           <br><br><br><br><br><br><br><br>
<div class="col-md-4">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?php echo  $row["imglink"];?>" alt="Card image cap" width="300" height="300" style="border-radius: 50%;" >
    </div>
</div>           
<div class="col-md-5" >
    <h3 class="name" style="color:deepskyblue" ><b><?php echo $row["fullname"];?></b></h3>
    <h4 class="subtitle"  ><?php echo $row["designation"];?></h4><hr/>
    <p class="text">University of Engineering & Management (UEM),Jaipur</p>
    <p class="text"><em>Email:</em></p><br><hr/>
</div>
       </li>
       </ul>
       
       
   </section>
   <?php
require 'dbconfig/config.php';
echo $_GET["id"];
?>
   <section class="intro-area white" id="intro">
       <div class="container">
           <div class="row">
               <div class="col-sm-12 text-center" >
                   <h2>ABOUT PROFESSOR  </h2>
                   <div class="sub-heading">
                   <p> 
                    Gurukul, Sikar Road NH 11, Near Udaipuria Mod, Jaipur, Rajasthan 303807<br> University of Engineering & Management ( UEM ) Jaipur
                   </p>
                   </div>
               </div>
           </div>
           <div class="row1" >
               <div class="col-sm-5">
                   
                   <div class="intro-block" >
                       <span class="intro-icon"><i class="fa fa-graduation-cap"></i></span>
                       <h3>Education</h3>
                       <p ><?php echo $row["education"];?>
                           
                        </p>
                   </div>
               </div>
                <div class="col-sm-5">
                   
                   <div class="intro-block">
                       <span class="intro-icon"><i class="fa fa-black-tie"></i></span>
                       <h3>Experience</h3>
                       <p>
                           <?php echo $row["experience"];?>
                        </p>
                   </div>
               </div>
                <div class="col-sm-5">
                   
                   <div class="intro-block">
                       <span class="intro-icon"><i class="fa fa-search"></i></span>
                       <h3>research area(s)</h3>
                       <p><?php echo $row["researcharea"];?> </p>
                   </div>
               </div>
                <div class="col-sm-5">
                   
                   <div class="intro-block">
                       <span class="intro-icon"><i class="fa fa-book"></i></span>
                       <h3>key publications</h3>
                       <p><?php echo $row["keypub"];?> </p>
                   </div>
               </div>
                <div class="col-sm-5">
                   
                   <div class="intro-block">
                       <span class="intro-icon"><i class="fa fa-user"></i></span>
                       <h3>personal distinctions</h3>
                       <p><?php echo $row["pd"];?></p>
                   </div>
               </div>
               
           </div>
       </div>
       
       </section>
       
      
      
      <section class="contact-area" id="contact">
         <div class="container">
             <div class="row">
                 <div class="col-sm-12 text-center">
                    <h2>CONTACT ME</h2>
                    <div class="sub-heading">
                        <p>
                            Gurukul, Sikar Road NH 11, Near Udaipuria Mod, Jaipur, Rajasthan 303807<br> University of Engineering & Management ( UEM ) Jaipur
                        </p>
                    </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-sm-3 divider">
                     <h3>contact</h3>
                     <div class="contact-address">
                         <ul>
                             <li>
                                 <i class="fa fa-home"></i>
                                 <div class="address-phone">
                                 <h4>address</h4>
                                 <span>UEM JAIPUR</span>
                                 <span>Rajasthan</span>
                                 </div>
                             </li>
                             
                             <li>
                                 <i class="fa fa-phone"></i>
                                 <div class="address-phone">
                                 <h4>phone</h4>
                                 <span>098873 13330</span>
                                
                                 </div>
                             </li>
                             
                             
                             <li>
                                 <i class="fa fa-paper-plane"></i>
                                 <div class="address-phone">
                                 <h4>email</h4>
                                 <span>abc@gmail.com</span>
                                 </div>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-sm-9">
                 <div class="contact-block">
                     <h3>Drop a Message</h3>
                     <form class="contact_form">
                         <div class="row">
                             <div class="col-sm-6">
                             <div class="form-group">
                                 <input type="text" class="from-control" placeholder="Your first name" required="required" style="width: 400px; height:35px;background-color: #e6f5ff">
                                 </div>
                                 
                                 <div class="form-group">
                                 <input type="email" class="from-control" placeholder="Contact@email.com" required="required" style="width: 400px; height:35px; background-color: #e6f5ff">
                                 </div>
                                 
                                 <div class="form-group">
                                 <input type="email" class="from-control" placeholder="Your phone number " required="required" style="width: 400px; height:35px;background-color: #e6f5ff">
                                 </div>
                             </div>
                             <div class="col-sm-6">
                              <div class="form-group">
                                 <textarea class="form-control" required="required" style="background-color:#e6f5ff"></textarea>
                                 </div>
                                 
                                 <div class="form-group" >
                                     <input type="submit" class="btn default-btn btn-block" value="submit quries">
                                 </div>
                             
                             </div>
                         </div>
                     
                     </form>
                     </div>
                 
                 </div>
             </div>
         </div>
          
          
      </section>
       
       
       
       
       
   
   
   
   <script src="js/main.js"></script> 
</body>
</html>