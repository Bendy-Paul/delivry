
<?php

include 'config.php';


($_SESSION['userregister']!= true) ? header("location:login.php"):'';

$numb=$_SESSION['number'];

$conn->query("UPDATE item_status SET view='Yes' WHERE sender_number='$numb' ");

include 'header.php';



// ($_SESSION['userregister']!= true) ? header("location:login.php"):'';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
   
  #nothero {
    width: 98%;
    height: 50vh;
    margin:auto;
    background: url(../delivery4.jpg) top center;
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
    width:80%;
    left:7%;
    
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


.icon2{
    font-size: 50vh;
    /* position: absolute; */
    margin:auto;
    /* right: 15px; */
    /* top: 15px; */
    opacity: 0.9;
    /* transition: transform .3s linear; */
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

</style>

<body class="main"><br><br>
<br><br><br>

<div >
  
<br>

<input style="margin:auto;width:90%" oninput="w3.filterHTML('#main', '.small-box', this.value)"  class="form-control w3-padding align-items-center" placeholder="Search Inbox">
<br><br>
</div>
<div id="main">

<?php



$inform = $conn->query("SELECT * FROM item_status WHERE sender_number=$numb ORDER BY ddate DESC");

if ($inform->num_rows>0) {

    while ($info=$inform->fetch_assoc()) {
 
        $d=strtotime($info['ddate']);
        $date=date("l F d Y", $d);
        $time=date("h: i: sa", $d);
    
    
    
    $t_number=$info['tracking_number'];
            switch ($info['dstatus']) {
                case '1':
                    $status= "
                    <div class='small-box w3-white w3-text-indigo w3-padding-large border'>
                    <b>Tracking Number:</b>
                    <div class='item'>
                    
                    <h6> $t_number </h6>
                    <div class='inner'>
                    
                      <p> This Package Is Pending Due To Incomplete Registration Or Change in Registration Process</p>
                      <div class='icon'>
                    <i class='fa fa-undo-alt'></i>
                    <span><b>Date:</b> $date <b>At: </b>$time</span>

                    
                    </div>
                                        <br>
                  </div>
                    </div>
                   
                ";
                    break;
                case '2':
                    $status= "
                    <div class='small-box w3-white w3-text-indigo w3-padding-large border'>
                    <b>Tracking Number:</b>
                    <div class='item'>
                    
                    <h6> $t_number </h6>
                    <div class='inner'>
                    
                        <p> This Package Collected by The delivery company</p>
                      <div class='icon'>
                    <i class='fa fa-warehouse'></i>
                    <span><b>Date:</b> $date <b>At: </b>$time</span>

                    
                    </div>
                                        <br>
                  </div>
                    </div>
                   ";
                    break;
                case '3':
                    $status= "
                    <div class='small-box w3-white w3-text-indigo w3-padding-large border'>
                    <b>Tracking Number:</b>
                    <div class='item'>
                    
                    <h6> $t_number </h6>
                    <div class='inner'>
                    
                        <p>This Package Has Been Shipped</p>
                      <div class='icon'>
                    <i class='fa fa-route'></i>
                    <span><b>Date:</b> $date <b>At: </b>$time</span>

                    
                    </div>
                                        <br>
                  </div>
                    </div>
                   ";
                    break;
                case '4':
                    $status= "
                    <div class='small-box w3-white w3-text-indigo w3-padding-large border'>
                    <b>Tracking Number:</b>
                    <div class='item'>
                    
                    <h6> $t_number </h6>
                    <div class='inner'>
                    
                        <p>This Package Is In Transit</p>
                      <div class='icon'>
                    <i class='fa fa-clipboard-list'></i>
                    <span><b>Date:</b> $date <b>At: </b>$time</span>

                    
                    </div>
                                        <br>
                  </div>
                    </div>
                   ";
                    break;
                case '5':
                     $status= "
                     <div class='small-box w3-white w3-text-indigo w3-padding-large border'>
                    <b>Tracking Number:</b>
                    <div class='item'>
                    
                     <h6> $t_number </h6>
                    <div class='inner'>
                    
                        <p>The Package Is Out for Delivery</p>
                      <div class='icon'>
                    <i class='fa fa-shipping-fast'></i>
                    <span><b>Date:</b> $date <b>At: </b>$time</span>

                    
                    </div>
                                        <br>
                  </div>
                    </div>
                   ";
                     break; 
                        
                 case 
                    $status= "
                    <div class='small-box w3-white w3-text-indigo w3-padding-large border'>
                    <b>Tracking Number:</b>
                    <div class='item'>
                    
                    <h6> $t_number </h6>
                    <div class='inner'>
                    
                        <p>This Package Has Arrived At Pickup Station</p>
                      <div class='icon'>
                    <i class='fa fa-clipboard-check'></i>
                    <span><b>Date:</b> $date <b>At: </b>$time</span>

                    
                    </div>
                                        <br>
                  </div>
                    </div>
                   ";
                     break;
                case '7':
                    $status= "
                    <div class='small-box w3-white w3-text-indigo w3-padding-large border'>
                    <b>Tracking Number:</b>
                    <div class='item'>
                    
                    <h6> $t_number </h6>
                    <div class='inner'>
                    
                        <p>This package Is Ready for Pickup</p>
                      <div class='icon'>
                    <i class='fa fa-box'></i>
                    <span><b>Date:</b> $date <b>At: </b>$time</span>

                    
                    </div>
                                        <br>
                  </div>
                    </div>
                   ";
                    break;
                case '8':
                    $status= "
                    <div class='small-box w3-white w3-text-indigo w3-padding-large border'>
                    <b>Tracking Number:</b>
                    <div class='item'>
                    
                    <h6> $t_number </h6>
                    <div class='inner'>
                    
                        <p>The Package Has Been Picked-up Successfully</p>
                      <div class='icon'>
                    <i class='fa fa-box-open'></i>
                    <span><b>Date:</b> $date <b>At: </b>$time</span>

                    
                    </div>
                                        <br>
                  </div>
                    </div>
                   ";
                    break;
                case '9':
                    $status= "
                    <div class='small-box w3-white w3-text-indigo w3-padding-large border'>
                    <b>Tracking Number:</b>
                    <div class='item'>
                    
                    <h6> $t_number </h6>
                    <div class='inner'>
                    
                        <p>Package Delivery Has Been Unsuccessfull Proceed To Delivery Company To Pickup The Item</p>
                      <div class='icon'>
                    <i class='fa fa-times'></i>
                    <span><b>Date:</b> $date <b>At: </b>$time</span>

                    
                    </div>
                                        <br>
                  </div>
                    </div>
                   ";
                    break;
                }
    
    ?>
    
    
        <?php echo "<br>".$status?>
    
              </div>
    <?php 
    }
    
echo "";

}  else {
    
   ?>

<!-- <div class="small-box"> -->
<span class="icon2 w3-display-middle w3-text-indigo">

    <span  class="fa fa-frown"></span><br>
    <h1>Your Inbox Is Empty</h1>

</span>

<!-- </div> -->

<?php
}
?>

<script src="../4/w3.js"></script>

</body>
</html>