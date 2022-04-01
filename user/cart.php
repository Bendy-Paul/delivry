<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
      <div >        
<style>
  

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
}

</style>

<?php

include 'config.php';

include 'header.php';



($_SESSION['userregister']!= true) ? header("location:login.php"):'';






// !isset($_SESSION['']) ? header("location:login.php"):'';


?>

<br>
<br>

<br>
<br>
<div class="">



<div class="w3-text-indigo w3-panel w3-border w3-card-4 " style="padding:1.4rem 1rem;width:88%;margin:auto">
<h1> <?php echo $_SESSION['name']." ".$_SESSION['last']?> </h1>

<p>Email: <?php echo $_SESSION['email']; $send=$_SESSION['number'];
?></p>

</div>


</div>
<br>
<br>

<br>
<br>

<div class="row w3-text-indigo w3-container" data-aos="fade-buttom">
    
    <h1 class="w3-text-indigo"><b>My package info</b></h1>
    <hr class="w3-round">

    <div class="row w3-center">

    

    <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  shadow-sm border">
              <div class="inner">

              
                <h1> <?php echo $conn->query("SELECT * FROM d_orders WHERE item_status='8' AND sender_number=$numb")->num_rows; ?></h1>

                <p>Successfull Packages</p>
              </div>
              <div class="icon">
                <i class="fa fa-box-open"></i>
                <br>
              </div>
            </div>


          </div> <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  shadow-sm border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE (item_status!='9' AND item_status!='8') AND sender_number=$numb")->num_rows; ?></h1>

                <p>Incoming Deliveries</p>
              </div>
              <div class="icon">
                <i class="fa fa-truck"></i>
                <br>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  shadow-sm border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE item_status='9'  AND sender_number=$numb")->num_rows; ?></h1>

                <p>Unsuccessful</p>
              </div>
              <div class="icon">
                <i class="fa fa-times"></i>
                <br>
              </div>
            </div>
          </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:rgb(11, 147, 226);">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content" style="">
      <div class="modal-header" style="text-align: center; ">
        <h3 class="modal-title" id="exampleModalLabel" style="text-align:center;margin:auto;">Enter Tracking Number:</h3>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
    
  <input type="text" name="tracking" style="width:100%" class="form-control">
      </div>
      <div class="modal-footer">
        <!-- <a type="button" class="btn btn-danger"data-dismiss="modal" style="left:0px; margin:auto">Close</a> -->
        <button type="button" class="btn btn-primary" style="left:0px; margin:auto">Check Item Status</button>
      </div>
    </div>
  </div>
</div>

<br>
<br>

    <!-- <button name="logout" class="btn btn-primary"><a href="logout.php" style="color:white;">Logout</a></button> -->

</body>
        </html>