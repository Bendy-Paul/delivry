

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

include 'header.php';
// include '../admin/config.php';   


$check=$conn->query("SELECT * FROM dstaff WHERE dstaffid='".$_SESSION['staffid']."'");


?>

<body class="main">
  


<?php
$row = $check->fetch_assoc();

// echo $_SESSION['staffid'];





// print_r($row);

?>

<style>
  #nothero {
    width: 98%;
    height: 50vh;
    margin:auto;
    /* background: url(../delivery4.jpg) top center; */
    background-size: cover;
    position: relative;
}

.small-box {
    border-radius: 0.25rem;
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    display: block;
    margin-bottom: 20px;
    position: relative;
    text-align:justify;
    
}

.small-box .icon>i.fa, .small-box .icon>i.fab, .small-box .icon>i.fad, .small-box .icon>i.fal, .small-box .icon>i.far, .small-box .icon>i.fas, .small-box .icon>i.ion {
    font-size: 70px;
    top: 20px;
}
.small-box .icon>i {
    font-size: 90px;
    position: absolute;
    right: 15px;
    top: 15px;
    opacity: 0.6;
    transition: transform .3s linear;
}


.main{
        margin-left:300px ;margin-right:5px;
        margin-top:40px;
        font-family: "Verdana", sans-serif;
        
}
       } 

     
@media (max-width: 990px){
.small-box .icon {
    display: none;
    margin:auto;
}
.small-box{
  margin-left:auto;
  margin-right:auto;
  width:100%;
  text-align:center;

}

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

    
@media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;margin-right:0px;
    }
}
</style>

<body class="main">
    <!-- <form class="d-flex">
      <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav> -->


<!-- Top me
<!-- Overlay effect when opening sidebar on small screens -->


<!-- WELCOME HEADER -->
<section id="nothero" class="d-flex justify-content-center align-items-center w3-text-ingigo">
    <div class="container position-relative sub-head" data-aos="zoom-in" data-aos-delay="100">
    <div class="w3-container w3-text-indigo" id="showcase" data-aos="fade-up">

<h3><b>Welcome <?php echo $_SESSION['staffname']." ".$_SESSION['stafflast'];?></b></h3>
    <br>
    <p class="sub-head">Email: <?php echo $_SESSION['staffemail']?></p>
    <hr style="width:50px;border:2px solid ;" class="w3-round">

    <p class="sub-head">Phone Number: <?php echo $_SESSION['staffnumber']?></p>
    <hr style="width:50px;border:2px solid ;" class="w3-round">
 
    </div>
    </div>
  </section>

<!-- END OF WELCOME HEADER   -->

    <!-- COMPANY INFORMATION -->
    
<?php

if ($_SESSION['staffstatus']=="Driver") {



    $check=$conn->query("SELECT * FROM dstaff WHERE dstaffid='".$_SESSION['staffid']."'");
    $rap = $check->fetch_assoc();


    $truck=$conn->query("SELECT * FROM delivery_trucks WHERE driverid='".$_SESSION['staffid']."'");

    if ( $truck->num_rows>0) {
 
    $delivery_info=$truck->fetch_assoc();
    
    
    $truckid=$delivery_info['dcar_id'];

   $assigned_packages= $conn->query("SELECT * FROM d_orders WHERE delivery_truck_number='".$delivery_info['dcar_id']."' AND item_status!=8 AND  item_status!=9")->num_rows;


   $destination=$delivery_info['delivery_state'];
   }else {
    $truckid="Not Assigned";

    $assigned_packages="0";

    $destination="Not Assigned";
     }
$_SESSION['staffstatus']=$rap['dstatus'];


?>



</div>
      </div>
  </div>

    <br>
    <br>
    <br>    


<div class="3-text-indigo w3-container" data-aos="fade-buttom">
    
    <h1 class="w3-text-indigo"><b>Company info</b></h1>
    <hr class="w3-round">

    <div class="row w3-center">

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
    

    <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  shadow-sm border">
              <div class="inner">
                <h1> <?php echo $assigned_packages; ?></h1>

                <p>Current Assigned Goods</p>
              </div>
              <div class="icon">
                <i class="fa fa-box"></i>
                <br>
              </div>
            </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

          </div> <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  shadow-sm border">
              <div class="inner">
                <h3><?php echo $truckid; ?></h3>

                <p>Truck Plate Number</p>
              </div>
              <div class="icon">
                <i class="fa fa-truck"></i>
                <br>
              </div>
            </div>
          </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

          <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  shadow-sm border">
              <div class="inner">
                <h3><?php echo $_SESSION['staffstate']; ?></h3>

                <p>State Of Operation</p>
              </div>
              <div class="icon">
                <i class="fa fa-map-marker-alt"></i>
                <br>
              </div>
            </div>
          </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

          <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo shadow-sm border">
              <div class="inner">
                <h3><?php echo $destination; ?></h3>

                <p>Destination</p>
              </div>
              <div class="icon">
                <i class="fa fa-route"></i>
                <br>
              </div>
            </div>
          </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

          
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


            <?php
}
elseif ($_SESSION['staffstatus']=="Staff") {

            ?>

<div class="row">
  
<div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  shadow-sm border">
              <div class="inner">
                <h1> <?php echo $conn->query("SELECT * FROM d_orders WHERE reciving_branch_id='".$_SESSION['staffofficeid']."' AND item_status!=8 AND  item_status!=9")->num_rows; ?></h1>

                <p>Incoming Packages</p>
              </div>
              <div class="icon">
                <i class="fa fa-box"></i>
                <br>
              </div>
            </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

          </div> <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  shadow-sm border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE sending_branch_id='".$_SESSION['staffofficeid']."' AND item_status!=8 AND  item_status!=9")->num_rows; ?></h1>

                <p>Outgoing Packages</p>
              </div>
              <div class="icon">
                <i class="fa fa-box"></i>
                <br>
              </div>
            </div>
          </div>

</div>
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


<?php

}

?>

</body>
</html>



</body>
</html>