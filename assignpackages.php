
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <head> </head>
   <body class="main" onwheel="display(event)">
   <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<?php 

include 'header.php';
// ONLY STAFF CAN VIEW THIS PAGE

?>
 
 <style>

.main{
        margin-left:300px ;margin-right:5px;
        margin-top:40px;
        font-family: "Verdana", sans-serif;
        
}

.ma{
  font-family: "Verdana", sans-serif;

}  
@media only screen and (max-width: 430px) {
   
   .check{
     padding-left:30%
   }
   
     }

          
.soap{
  font-family: "Lobster", serif;

}
.scroll{
    display:block;
    transition: 5s;
}
.none{
  display:none;
  transition: 5s;

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

</style>

<div style="display:none">
  
<?php
$done=false;

$number_of_assigned_packages=0;

$office_id=$_SESSION['staffstate'];
// IF THERE IS NO INFORMATION GOTTEN DISPLAY THIS ERROR
if (isset($_GET['start'])==false||isset($_GET['end'])==false||isset($_GET['plate_number'])==false) {

  ?>

</div>


  <style> 
.icon2{
    font-size: 38vh;
    /* position: absolute; */
    margin:auto;
    /* right: 15px; */
    /* top: 15px; */
    opacity: 0.9;
    /* transition: transform .3s linear; */
}

  </style>

<div class="icon2 w3-text-indigo w3-center">

    <i  class="fa fa-box-open w3-center" style="margin:auto"></i><br>
    <h3>Invalid URL no information Found</h3>

</div>
  
<?php
// IF TRUCKS CURRENT AND DELIVERY STATE IS NOT TRUE DISPLAY THIS ERROR
}
else {
// CONFIRMATION IF SELECTED DELIVERY TRUCK BELONGS TO THE STAFF STATE
$confirm_plate_number=$conn->query("SELECT * FROM delivery_trucks WHERE dcar_id='".$_GET['plate_number']."';");
// CHECK IF DELIVERY TRUCK STARTING POINT AND DESTINATION IS CORRECT
$confirm_vehicle_movement=$conn->query("SELECT * FROM delivery_trucks WHERE dcar_id='".$_GET['plate_number']."' AND driver_office_branch_id='".$_GET['start']."' AND delivery_state='".$_GET['end']."' ;");

$confirm_plate_number_location=$conn->query("SELECT * FROM delivery_trucks WHERE dcar_id='".$_GET['plate_number']."';");

$confirm_delivery_truck_info=$conn->query("SELECT * FROM delivery_trucks WHERE dcar_id='".$_GET['plate_number']."' AND driver_office_branch_id='".$_GET['start']."' AND delivery_state='".$_GET['end']."' ;");
// CHECK IF THE CURRENT VEHICLE STATE IS TRUE
$confirm_current_state=$conn->query("SELECT * FROM office_branch WHERE dstate='".$_GET['start']."' ;");
// CHECK IF THE dELIVERY VEHICLE STATE IS TRUE
$confirm_delivery_state=$conn->query("SELECT * FROM office_branch WHERE dstate='".$_GET['end']."';");



if ($confirm_current_state->num_rows<1||$confirm_delivery_state->num_rows<1) {


  ?>

</div>
  

<div class="icon2 w3-text-indigo w3-center">

    <i  class="fa fa-map-marker-alt w3-center" style="margin:auto"></i><br>
    <h3>Sorry Office Information Not Found</h3>

</div>
  


<?php

// IF DELIVERY TRUCK PLATE NUMBER IS NOT FOUND OR BELONGS TO ANOTHER STATE DISPLAY THIS
}elseif ($confirm_plate_number->num_rows == 0) {


  ?>

</div>
 
<div class="icon2 w3-text-indigo w3-center">

    <i  class="fa fa-truck w3-center" style="margin:auto"></i><br>
    <h3>Sorry This Delivery Truck Does Not Exist Or May Belong To Another State Office</h3>

</div>
  
<?php

// IF DELIVERY TRUCK MOVEMENT IS INCORRECT DISPLAY THIS ERROR
}elseif ($confirm_vehicle_movement->num_rows == 0) {


  ?>

</div>
 
<div class="icon2 w3-text-indigo w3-center">

    <i  class="fa fa-route w3-center" style="margin:auto"></i><br>
    <h3>Delivery Truck Route Is Incorrect</h3>

</div>
  
<?php


  ?>

</div>
  
<?php



  
// IF DELIVERY TRUCK INFORMATION IS CORRECT DISPLAY ALL AVAILABLE PACKAGES
}else {
  


?>


<?php 

// include 'header.php';

 $from=$_GET['start'];
 $to=$_GET['end'];
 $plate=$_GET['plate_number'];
//  GET ALL PACKAGES THAT ARE ALREADY ASSIGNED TO THE DRIVER
$limit= $conn->query("SELECT * FROM d_orders WHERE delivery_truck_number='$plate' AND (item_status!=8 AND item_status!=9) ;")->num_rows;

//THIS IS TO GET HOW MUCH MORE PACKAGES THE DRIVER CAN CARRY
$available=25-$limit;
// echo $available ;


 ?>
</div>
<a href="#show<?php echo $plate ?>case" ><i class="btn btn-primary w3-text-white none" id="something" style="position:fixed;"><i class=" fa fa-arrow-down  "></i></i></a>

<div>

<br><br><br>    

<h1 class="w3-center w3-text-indigo">Available Packages Going From <?php echo $from?> To <?php echo $to?></h1>
<br><br><br>    

<script src="../4/w3.js">
</script>


<?php
//  GET ALL PACKAGES THAT ARE AVAILABLE
$available_package= $conn->query("SELECT * FROM d_orders WHERE (item_status!=1 OR	item_status!=8 OR item_status!=9) AND delivery_truck_number='Not Assigned' AND sending_branch_state='$from' AND reciving_branch_state='$to' ;");

$limit= $conn->query("SELECT * FROM d_orders WHERE delivery_truck_number='$plate' AND (item_status!=8 OR item_status!=9) ;")->num_rows;

$n=$limit;

$increase=1;

while ($assign=$available_package->fetch_assoc() ) {
  // IF THERE ARE AVAILABE PACKAGES DISPLAY THE PACKAGE
if ( $available_package->num_rows>0 ){
  $limit= $conn->query("SELECT * FROM d_orders WHERE delivery_truck_number='$plate' AND (item_status!=8 AND item_status!=9) ;")->num_rows;

  // $available_package= $conn->query("SELECT * FROM d_orders WHERE (item_status!=1 OR	item_status!=8 OR item_status!=9) AND delivery_truck_number='Not Assigned' AND sending_branch_state='$from' AND reciving_branch_state='$to' ;");

?>

<div style="display:none;font-size:0px">
  
<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $tn=$assign['tracking_number'];
  
  
if ($_POST["$tn"] !="") {
  $tr_numb=$assign['tracking_number'];

  $plateN=$_POST['plateN'];


  $n=$n+1;

if (isset($_POST['assign'])&&$n<=25) {

    // $n=$n+1;


  $sql=$conn->query("UPDATE d_orders SET  delivery_truck_number='$plateN' WHERE tracking_number='$tr_numb';");

  $done=true;

  $number_of_assigned_packages=$number_of_assigned_packages+1;

}

}

}


?>

</div>

<form action="" class="form" method="POST">


<span>
<?php
if($increase=="1"){
?>
<span class="w3-right"><h6>
Select All
<input type="checkbox" id="<?php echo $assign['tracking_number'] ?>">
</h6></span>
<?php
}
?>

<h3 class="ma"><?php echo $increase ?></h3>


<script>
  
$(document).ready(function() {
    $('#<?php echo $assign['tracking_number'] ?>').click(function() {
        var checked = this.checked;
        $('input[type="checkbox"]').each(function() {
        this.checked = checked;
    });
    })
});



</script>

<style>
    .p{
    font-family: "Verdana", sans-serif;  font-size:12px;

}

.b{
  font-size:13px;
}
</style>
<div class="w3-padding-large">

<h3  class="soap w3-center w3-text-indigo w3-text-indigo h4"><?php echo $assign['tracking_number'] ?></h3>
<ul style="list-style-type:disc">
                                

                            <li class=" w3-text-indigo"><b class="b">Package Name:</b></li>
                            <p class="p"><?php echo $assign['package_name'] ?></p>

                            <li class=" w3-text-indigo"><b class="b">Date Of Registration:</b></li>
                              <p class="p"><?php
                             $d=strtotime($assign['registration_date']);
                            echo date("l F d Y", $d);?></p>            


                             <li class="w3-text-indigo"><b class="b">Packege Weight</b></li>
                            <p class="p"><?php echo $assign['item_weight']; ?> Grams</p>

                            
                            <li class="w3-text-indigo"><b class="b">Packege Height</b></li>
                            <p class="p"><?php echo $assign['item_height']; ?> Meters</p>
                            
                            
                            <li class="w3-text-indigo"><b class="b">Packege Width</b></li>
                            <p class="p"><?php echo $assign['item_width']; ?> Meters</p>

                            <li class="w3-text-indigo"><b class="b">Packege price</b></li>
                            <p class="p">N <?php echo $assign['item_price']; ?></p>

                            <li class="w3-text-indigo"><b class="b">Package Sender</b></li>
                            <p class="p"><?php echo $assign['sending_branch']; ?></p>

                            <li class="w3-text-indigo"><b class="b">Package Reciver</b></li>
                            <p class="p"><?php echo $assign['reciving_branch']; ?></p>


</ul style="list-style-type:disc">

<span class="w3-right"><h6 class="w3-text-indigo">
Select Package 
<input  type="checkbox" name="<?php echo $assign['tracking_number']?>" value="<?php echo $assign['tracking_number']; ?>">
</h6></span>


<input type="hidden" id="open" value="<?php echo $plate ?>" name="plateN">
<br><br>

</div>
<hr style="width:100%">



<?php
}

$increase=$increase+1;

}
?>
</span>

<!-- THIS WILL BE DISPLAYED ID THERE ARE NO AVAILABLE PACKAGES -->
<?php
if($available_package->num_rows=='0' && $plate!=="None") {
  ?>

  <style> 
.icon2{
    font-size: 38vh;
    /* position: absolute; */
    margin:auto;
    /* right: 15px; */
    /* top: 15px; */
    opacity: 0.9;
    /* transition: transform .3s linear; */
}

  </style>
</div>
<div class="icon2 w3-text-indigo w3-center">

    <i  class="fa fa-box-open w3-center" style="margin:auto"></i><br>
    <h3>There Are No Available Packages Going To <?php echo " $to From $from "?> At This Time</h3>

</div>
  
<?php
}
?>

<small><i>This driver can be assigned <b><?php echo $available ?></b> more packages</i>
</small>
<br><br>
      <div class="w3-padding-large">
<span  style="right:0px"><button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
</span>
<!-- THE ASSIGN BUTTON WILL BE DISABLED IF THE PACKAGE LIMIT IS REACHED -->
<span style="float:right"><input type="submit"  name="assign" class="btn btn-primary" value="Assign"
<?php
if ($limit>=25) {
?>
disabled
<?php
}
?>
>
</span>
</form>
<div id="show<?php echo $plate ?>case">
  <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit delectus incidunt laborum error eligendi aliquam doloribus totam natus vitae. Eos sit officia, ratione facilis aliquid architecto, ipsum aspernatur repellat delectus modi alias tempore mollitia voluptas voluptatem natus, debitis corrupti beatae. Provident laborum vitae, tempora corrupti et recusandae nulla dicta. Fugit dolorem nobis magnam repellendus magni consectetur soluta exercitationem cum odit vero, esse velit voluptates. Alias illum officia quia labore harum dicta suscipit, aspernatur enim recusandae facilis esse veritatis temporibus excepturi pariatur praesentium consequuntur tempore deserunt deleniti vel, est in! Error nostrum veniam ullam provident iusto aliquid aperiam laborum ipsa voluptas ex labore, consequuntur architecto incidunt quasi asperiores ad dolor facere, nobis, odit natus magnam tempore assumenda placeat hic? Laboriosam possimus cumque quos voluptates quod error sint eligendi, dolor ullam deleniti sequi nobis dolorem tenetur, saepe itaque. Reiciendis, vitae illo unde iste ratione similique autem ad amet molestiae natus nulla iusto sit eum itaque quasi perspiciatis in. Doloremque repellendus nulla officia sed eveniet, sunt, culpa ullam, aut enim ea corporis numquam blanditiis delectus nisi quae mollitia porro reiciendis vitae consequatur eligendi neque atque cupiditate omnis optio! Molestiae ea quisquam cupiditate commodi provident facere et eligendi sit, quis vitae ipsa ex corporis atque amet laudantium! Exercitationem perspiciatis quae, laboriosam veniam hic repudiandae incidunt, quos, temporibus ut odio molestiae fugiat doloribus. Reiciendis, laborum nobis. Maxime obcaecati pariatur iste aliquam inventore est enim saepe! Nemo et qui numquam molestiae incidunt, velit fuga ad aperiam laboriosam nobis blanditiis quod at praesentium earum reiciendis quos quibusdam sunt provident omnis accusantium! Eligendi deserunt fugiat harum inventore tempore, dignissimos sint illum officiis? Iste sequi soluta maiores deleniti, doloribus nobis accusantium sed quidem. Dolorum, modi autem. Unde, placeat velit qui natus quae rem laboriosam sint est sapiente quaerat harum quam itaque vel impedit consectetur. Nulla incidunt debitis dignissimos nam explicabo fuga officiis sit ducimus vel fugiat qui omnis temporibus, similique officia quasi aut facilis esse nemo voluptatibus numquam provident. Facilis error rem ipsam obcaecati repellendus voluptatum, vel, impedit sit, illo nesciunt minima ut eos magni. Quis quasi tempore distinctio cum quod dolor consequuntur eaque. -->
</div>
<br><br>



</div>

    
<script>
const div = document.getElementById("something");


function display(event) {
    var y = event.deltaY;
    console.log(y);

    
if(y<0){
  div.classList.remove("scroll");
  div.classList.add("none");

}
if (y>0) {

  div.classList.remove("none");
  div.classList.add("scroll");
}

}
</script>

<?php
}

if ($done==true) {
  ?>
  <div class="modal show" tabindex="1" style="display:block"  data-aos="zoom-in">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title"></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      </button>
    </div>
    <div class="modal-body">
      <p><?php echo $number_of_assigned_packages?> Packages Has Been Assigned To Delivery Truck Plate Number <?php echo $_GET['plate_number']?> </p>
    </div>
      <a href="viewdrivers.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
    </div>
  </div>
  </div>
  <div class="modal-backdrop fade show"></div>
<?php
}

?>

<?php
}
?>

</body>
</html>