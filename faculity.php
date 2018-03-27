<?php
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>faculity.php</title>  
        <link href="css/style1.css" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!-- jQuery library -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="js/carousfredsel.js" type="text/javascript" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
       
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
   <section class="slider">
       <ul class="slider-carousel" id="slider-carousel">
           <li class="img1">
               <h2>UEM JAIPUR <SPAN >TEACHER'S</SPAN></h2>
               <P> We belive in your</P>
               <h2><b>A good teacher can inspire hope, ignite the imagination, and instill a love of learning</b></h2>
               <p><br>
                  
               </p><br>
              
           </li>
           <li class="img2">
               <h2>UEM JAIPUR <SPAN >TEACHER'S</SPAN></h2>
               <P> We belive in your</P>
               <h2><b>A good teacher can inspire hope, ignite the imagination, and instill a love of learning</b></h2>
               <p><br>
                   
               </p><br>
               
           </li>
           <li class="img3">
               <h2>UEM JAIPUR <SPAN >TEACHER'S</SPAN></h2>
               <P> We belive in your</P>
               <h2>A good teacher can inspire hope, ignite the imagination, and instill a love of learning</h2>
               <p><br>
                  
               </p><br>
               
           </li>
       </ul>
   </section>
   
       <section> 
            <div class="col-sm-12 text-center" >
                   <h2>UEM PROFESSOR  </h2>
                   <div class="sub-heading">
                   <p> 
                    Gurukul, Sikar Road NH 11, Near Udaipuria Mod, Jaipur, Rajasthan 303807<br> University of Engineering & Management ( UEM ) Jaipur
                   </p>
                   </div>
               </div>
        
    <?php
   $res = mysqli_query($con,"select * from teachertable ")or die("Could not retrieve image: " .mysqli_error($con));
        /*echo "<table>";
        while($row = mysqli_fetch_array($res))
        {
            echo"<tr>";
            echo"<td>";?> <img src="<?php echo $row["imglink"];?>" height="100" width="100"><?php  echo"</td>";
            echo"<td>";echo $row["fullname"];echo"</td>";
            echo"</tr>";
        }
        echo "</table>";*/
        
    while($row = mysqli_fetch_array($res)){
        ?>

        <div class="col-sm-3">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo  $row["imglink"];?>" alt="Card image cap" width="250" height="200" >
  <div class="card-body">
      <h4 class="card-title"><b><?php echo $row["fullname"]?></b></h4>
    <p class="card-text"><i>University of Engineering & Management (UEM),Jaipur</i> </p>
    <a href="info.php?id=<?php echo $row["id"]?>" class="btn btn-primary">View Profile</a>
  </div>
</div>
             </div>
<?php } ?>
        </section>
         <script src="js/main.js"></script> 
    </body>
</html>