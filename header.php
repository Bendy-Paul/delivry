<!DOCTYPE html>
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
<link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
<link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
<link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
<link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">


<?php  

include_once 'config.php';

if ($_SESSION['adminsuccess'] != true) {
  header("location:adminlog.php");
}


http://localhost/project/admin/admin.php
?>






  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="./admin.css"> -->

<style>
      .sub-head{
      /* color: rgb(26, 180, 231); */
      }

      .w3-sidebar{
          left:0px;
          color:white;
      }
     

        #navsize{
          /* font-size:0.7rem; */
        }

          .w3-bar-itemd {
    width: 100%;
    display: block;
    text-align: left;
    background-color: inherit;
    color: inherit;
    border: none;
    outline: none;
    white-space: normal;
    float: none;
    }
       .main{
        margin-left:300px ;margin-right:5px;
        margin-top:40px;
        font-family: "Verdana", sans-serif;
        
}
       } 

       
      @media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;
         margin-right:0px;
         margin-top:50px;

    }
    .btm{
      left:0rem;
      width:100%;
    }

}

.w3-padding-64{
  text-align:justify;
}

.w3-panel:hover{
  color:lime;
}

.padd{
  padding: 0.9px 3.7px 2px 2.2px;
  font-size:0.6969rem;
  border-radius:50%;
}


.my-button{
  border:none;display:inline-block;outline:0;padding:6px 16px;vertical-align:middle;overflow:hidden;text-decoration:none!important;cursor:pointer;white-space:nowrap
}

.my-button:hover{color:#3f51b5 !important;background-color:#fff!important;
background:white;}

}

#id{
  display:none;
}

.icon2{
    font-size: 38vh;
    /* position: absolute; */
    /* margin:auto; */
    margin-top:30px;
    /* right: 15px; */
    /* top: 15px; */
    opacity: 0.9;
    /* transition: transform .3s linear; */
}
    </style>

<body>
    

<!-- NAVIGATION BAR FOR LARGE SCREEN -->
<nav class="w3-sidebar w3-indigo w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:280px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="my-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
   <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

    <h4 class="w3-padding-64"><b>Company Name</b></h4>


  </div>
  <div class="w3-bar-block" style="font-size:14px;">
  <a href="admin.php" class="w3-panel w3-bar-itemd  "><p class="navsize" class="w3-center">Dashboard <i class="nav-icon fas fa-tachometer-alt"></i></p></a>

  <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->



  <a href="" class="navsize w3-panel w3-bar-itemd w3-opacity" aria-expanded="false" aria-controls="collapseExample">Staff</i></a>


  
  <div style="color:white;border:none;">
  <a href="staffone.php" class="navsize w3-bar-itemd my-button w3-leftbar w3-border-white "><i  class="fa fa-plus"> </i> New Staff</a> 
  <a href="viewstaff.php" class="navsize w3-bar-itemd my-button w3-leftbar w3-border-white"><i  class="fa fa-users"></i>  Manage Workers </a> 
  <a href="viewdrivers.php" class="navsize w3-bar-itemd my-button w3-leftbar w3-border-white"><i  class="fa fa-users"></i>  Manage Drivers</a>
  <a href="incomingdrivers.php" class="navsize w3-bar-itemd my-button w3-leftbar w3-border-white"><i  class="fa fa-users"></i>  Incoming Drivers</a>
 
  <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  <a href="" class="navsize w3-panel w3-bar-itemd w3-opacity" aria-expanded="false" aria-controls="package"> Packages</a>
  <div class=" w3-text-indigo" >
  <div style="color:white;border:none;">

  <a href="newpackage1.php" class="navsize w3-bar-itemd my-button w3-leftbar w3-border-white "><i  class="fa fa-plus"> </i> New Book</a> 
  <a href="completepackage.php" onmouseover="hover(this)" onmouseout="hovero(this)" class="navsize hov w3-bar-itemd my-button w3-leftbar w3-border-white "><i  class="fa fa-plus"> </i> Complete Booking <span id="check"><?php $qry = $conn->query("SELECT * FROM d_orders WHERE item_status='1'; ");
  if ($qry->num_rows>0) {
echo "<sup><b> $qry->num_rows </b></sup>";
 }
  ?></span></a> 
  <a href="newpackage2.php?user=no" class="navsize w3-bar-itemd my-button w3-leftbar w3-border-white "><i  class="fa fa-plus">   </i> Book For New User</a> 
  <a href="vieworders.php" class="navsize w3-bar-itemd my-button w3-leftbar w3-border-white"><i  class="fa fa-shipping-fast"></i> package status </a> 
  
  <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  <a href="" class="navsize w3-panel w3-bar-itemd w3-opacity"> Branch</a>
  <div class=" w3-indigo"style="color:white;border:none;" id="branch">
  <div style="color:white;border:none;">

   <a href="newbranch.php" class="navsize w3-bar-itemd my-button w3-leftbar w3-border-white "><i  class="fa fa-plus"></i> New Office</a>
   <a href="viewoffice.php" class="navsize w3-bar-itemd my-button w3-leftbar w3-border-white"><i  class="fa fa-map-marker-alt"></i> View Office </a></div>

  </div>
  <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


  <a href="" class="navsize w3-panel w3-bar-itemd w3-opacity"> Delivery Trucks</a>
  <div class=" w3-indigo"style="color:white;border:none;" id="truck">
  <div style="color:white;border:none;">

   <a href="newtruck.php" class="navsize w3-bar-itemd my-button w3-leftbar w3-border-white "><i  class="fa fa-plus"></i> New Truck</a>
   <a href="viewvehicles.php" class="navsize w3-bar-itemd my-button w3-leftbar w3-border-white"><i  class="fa fa-truck"></i> View Trucks </a></div>


   <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->



  <a href="profile.php" class="w3-panel w3-bar-itemd  ">My Profile <i  class="fa fa-user"></i></a>
 
<br><br><br>
<!-- LOGOUT BUTTON LINK -->
  <button  class="col-sm-4 btn btn-danger btn-flat btm" style="left:60px;"  data-toggle="modal" data-target="#logout"><i  class="fa fa-power-off"></i></button>
  <!-- END OF LOGOUT BUTTON LINK -->
  <!-- END OF LOGOUT BUTTON LINK -->
  </div>

  <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

</nav>

<!-- END OF NAVIGATION BAR FOR LARGE SCREES -->

<!-- LINK TO NAVIGATION BAR FOR LARGE SCREEN -->
<header class="w3-container w3-top w3-hide-large w3-indigo w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="my-button w3-indigo w3-margin-right" onclick="w3_open()">☰</a>
  <span>Company Name</span>
</header>

<!-- END OF NAVIGATION BAR FOR SMALL SCREEN -->

<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Are you sure you want to Logout</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
        <a href="logouta.php" name="unassign" type="buton" class="btn btn-danger"> <i class="fas fa-check"></i> </a>
      </div>
    </div>
  </div>
</div>


<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

</body>

  
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


function hover(x) {
  document.getElementById("check").style.color = "#3f51b5";
}

function hovero(x) {
  document.getElementById("check").style.color = "white";
}
</script>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="../bootstrap4/js/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap4/js/popper.min.js"></script>
    <script src="../bootstrap4/js/bootstrap.js"></script>
    <script src="../bootstrap4/js/bootstrap.min.js"></script>    


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</html>  