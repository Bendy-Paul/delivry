<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.Jumia.com</title>
</head>
<body>
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
<link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
<link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
<link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
<link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">

  <link rel="stylesheet" href="4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../3/w3.css">  
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  


  
<link rel="stylesheet" href="4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../3/w3.css">  


<style>
   


.in{
    background-color: aliceblue;
    color: black;
  }
  body ,nav{
    color:white;
    width:100%;
}


.in{
background-color: aliceblue;
color: black;
/* border-radius:%; */
}
/* 
.anime{
animation-name: example; /* For Safari 3.1 to 6.0 */
/* -webkit-transition: width 2s; */

.rotate:hover {
    /* font-size: 22px; */
    /* border: 3px solid white; */
    transform: rotateY(360deg);
    top:11px;
    color:green;
    transition: 1.2s;
    /* border-radius:7% */
}
.nav{
  /* position: -webkit-sticky; Safari */
    position:sticky;
  background-color: green;

} 
.nav2{
    margin:auto;
   
    padding-right:2.3rem;
    padding-left:2.3rem;
    border-right:2px white solid;
    border-left:2px white solid;
}

.nav-link{
  font-size:92%
}

.new{
  border:none
}

@media (max-width: 990px) {
  .nav2{
    /* border:none; */
    padding-top:2.3rem;
    padding-bottom:2.3rem;
    border-top:2px white solid;
    border-bottom:2px white solid;
    width: 100%;
    text-align:center;
    /* height: 100%; */
  }

  
  .new{
    border:none;
    border-right:2px white solid;
    border-left:2px white solid;
  }
}

body{
  color:black;
}


#see{
  padding:5px;
  color:#3f51b5;

}
</style>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between w3-left">

      <a href="index.html" class="logo d-flex align-items-center">
      <i class="fa fa-box-open fa-3x w3-left w3-indigo"></i>
        <span> Company</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="dashboard.php">Home</a></li>
          <!-- <li><a class="nav-link scrollto" href="register.php">Register Account</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <!-- <li><a class="active" href="blog.html">Blog</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->

<?php
if(isset($_SESSION['userregister'])) {
?>
          <li><a class="nav-link scrollto" href="Login.php">Dashboard</a></li>

          <li><a class="nav-link scrollto" href="newpackage.php">Book New Package</a></li>

          <li><a class="nav-link scrollto" href="viewpackage.php">View Packages</a></li>

          <li><a class="nav-link scrollto" href="inbox.php">
            
          <?php 
    $numb=$_SESSION['number'];
      
$inform = $conn->query("SELECT * FROM item_status WHERE sender_number='$numb' AND view='No'");
$confirm=$inform->num_rows;

if ($confirm < 1) {
?>
          Inbox
        
        <?php
}else {
?> 

<b style="font-size:22px">Inbox<sup><span id="see" class="w3-button w3-circle w3-indigo"></span></sup></b>
<?php
}
?>

</a></li>

          <li><a class="nav-link scrollto" href="trackpackage.php">Track Packages Movement</a></li>

          <li><a class="getstarted scrollto" href="profile.php">My Profile</a></li>


<?php
}else{
?>
          <li><a class="nav-link scrollto" href="Login.php">My Account</a></li>
<?php
}
?>
          <!-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


<!-- <div><i class="fas fa-home fa-fw" ></i></div> -->
<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="../bootstrap4/js/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap4/js/popper.min.js"></script>
    <script src="../bootstrap4/js/bootstrap.js"></script>
    <script src="../bootstrap4/js/bootstrap.min.js"></script>    


</body>
</html>