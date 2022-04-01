<!DOCTYPE html>



<?php 

// include 'loginerr.php';



// include 'header.php';

include 'profileprocess.php';


$fname=$lname=$last=$numb=$add=$gend=$mail="one";

$fname=$_SESSION['staffname'];
$mail=$_SESSION['staffemail'];
$last=$_SESSION['stafflast'];
$numb=$_SESSION['staffnumber'];
$add=$_SESSION['staffstate'];
$gend=$_SESSION['staffGender'];


// $_SESSION['staffname']=$row['dfname'];
// $_SESSION['stafflast']=$row['dlname'];
// $_SESSION['staffnumber']=$row['dphone'];
// $_SESSION['staffstate']=$row['dstate'];
// $_SESSION['staffemail']=$row['demail'];
// $_SESSION['staffGender']=$row['dgender'];
// $_SESSION['staffid']=$row['dstaffid'];
// $_SESSION['staffdate']=$row['ddatesign'];
// $_SESSION['staffstatus']=$row['dstatus'];

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../3/w3.css">  

<?php




?>

<style>
    strong{
        font-size:20px;
    }
    .profile{
        border-bottom:2px Solid white;
    }

    #order{
        float:right;
    }

    .main{
        margin-top:50px;
    }
</style>

<body class="main" class="w3-light-grey">


     <!-- Left Column -->
     <div class=""><br><br>
    











    <div class="w3-white w3-text-grey w3-card-4" style="margin:auto; width:75%">
      <div class="w3-display-container">
        <img src="../delivery12.jpg" style="width:100%" alt="Avatar">
        <div class="w3-display-bottomleft w3-container w3-text-indigo">
          <h2><?php echo $fname.' '.$last ;?></h2>
        </div>
      </div>
      <div class="w3-container">
     
      <br>
        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-indigo"></i><?php echo $mail?></p>
        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-indigo"></i><?php echo $numb ;?></p>
        <p><i class="fa fa-venus fa-fw w3-margin-right w3-large w3-text-indigo"></i><?php echo ucfirst($gend) ;?></p>

        

        <p><i class="fa  fa-map-marker-alt fa-fw w3-margin-right w3-large w3-text-indigo"></i>  <?php
                       
                        echo  $_SESSION['staffstate'];

                        ?></p>




        <p><i class="fa fa-building fa-fw w3-margin-right w3-large w3-text-indigo"></i>  <?php echo  $_SESSION['staffoffice']; ?></p>
        
        <br><br>
</div>
        <div class="row btn-group" style="width:100%; margin:auto;">
             <button  class="col-sm-6 btn btn-danger btn-flat btm"  data-toggle="modal" data-target="#logout">Logout</button>
             <button data-toggle="modal" data-target="#edit" href="updateadmin.php" class="col-sm-6 btn btn-primary btn-flat btm">Edit profile</button>
        </div>

<br><br>















<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Are you sure you want to Logout</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
        <a href="logout.php" name="unassign" type="buton" class="btn btn-danger"> <i class="fas fa-check"></i> </a>
      </div>
    </div>
  </div>
</div>



<?php


?>


<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <form class="container form" method="POST"  action="#">
    <br><br>
   <div class="row">
   <div class="form-group column col-6">
    <label for="text">Firstname:</label>
    <input type="text" class="form-control" id="text" placeholder="Eg.Paul" name="name" value="<?php echo $_SESSION['staffname']?>" disabled>
    <!-- <span class="text-danger fade show"><?php echo $password?></span> -->
  </div>

    <div class="form-group column col-6">
    <label for="text">Lastname:</label>
    <input type="text" class="form-control" id="text" name="lname" value="<?php echo $_SESSION['stafflast']?>" disabled>
    <span class="text-danger fade show"><?php echo $lnameErr;?></span>
  </div>
   </div>

   <div class="form-group">
    <label for="pwd">Phone Number:</label>
    <input type="text" class="form-control" id="pwd" value="<?php echo $_SESSION['staffnumber']?>" name="phone">
    <span class="text-danger fade show"><?php echo $phonee;?></span>
  </div>


  <div class="form-group">
    <label for="pwd">Office Branch:</label>
    <input type="text" class="form-control" id="pwd" value="<?php echo $_SESSION['staffoffice']?>" disabled>
    <span class="text-danger fade show"><?php echo $phonee;?></span>
  </div>


  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['staffemail']?>" name="email">
    <span class="text-danger fade show"><?php echo $emailErr;?></span>
  </div>

   
  <br>

  
<div class="form-group ">
    <label for="pwd">Confirm Staff ID:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Please confirm Staff ID"name="opass">
    <span class="text-danger fade show"><?php echo $cpassErr;?></span>
    <i style="font-size:12px">Confirm Staff ID to save profile changes</i>

  </div>
  <!-- </div> -->

  <button type="submit" name="submit"  style="background-color:rgb(51, 51, 255)" class="btn btn-primary  w3-right">Edit</button>
     
  
  <!-- <button class="btn btn-secondary"  style="background-color:rgb(51, 51, 255)">Update</button> -->
      
        <a href="profile.php" class="btn btn-primary" data-dismiss="modal">Close</a><br>
        </div>
    </div>
  </div>
</div>


        <br>


        <div class="modal fade" id="sure" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
Are You Sure You Want to Delete Your Account you Will Not Be Able To Acsess It again</div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
        <a href="delete.php" class="btn btn-danger"> <i class="fas fa-check"></i> </a>
      </div>
    </div>
  </div>
</div>
<!--       
        <hr>

        <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
        <p>Adobe Photoshop</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div>
        </div>
        <p>Photography</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
            <div class="w3-center w3-text-white">80%</div>
          </div>
        </div>
        <p>Illustrator</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>
        </div>
        <p>Media</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">50%</div>-->
          </div>
          </div>
          </div>



        <br> 
</body>

<script>
    
    
var d = new Date("<?php echo $_SESSION['date']?> ");
document.getElementById("demo").innerHTML = d.toDateString();


var e = new Date("<?php echo $_SESSION['dob']?> ");
document.getElementById("emo").innerHTML = e.toDateString();
</script>

</script>
</html>

<!-- <form class="container form"   action="#"> -->

<!-- 
<div><a href="Profile.php"></a></div>
<div><a href="Orders.php"></a></div>
<div><a href="Inbox"></a></div>
<div><a href=""></a></div>
<div><a href=""></a></div> -->

</body>
</html>
