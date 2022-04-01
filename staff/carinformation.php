<?php

include "header.php";

$qry2 = $conn->query("SELECT * FROM delivery_trucks WHERE driverid='".$_SESSION['staffid']."' ; ");
$see=$conn->query("SELECT * FROM delivery_trucks WHERE driverid=".$_SESSION['staffid']."; ")->num_rows;
if ($conn->query("SELECT * FROM delivery_trucks WHERE driverid=".$_SESSION['staffid']."; ")->num_rows!=0) {
  // DISPLAY CAR DETAILS IF HE HAS BEEN ASSIGNED TO ONE
$row2= $qry2->fetch_assoc();
$car=$row2['carbrand'] ;
$plate=$row2['dcar_id'] ;
$model=$row2['carmodel'];
$locate=$row2['delivery_state'];
$status=$row2['carperformance'];
$reg_date=$row2['registration_date'];
$from=$row2['driver_office_branch_id'];
$to=$row2['delivery_state'];


    }else {
    // DISPLAY  "NOT ASSIGNED AND NONE" IF HE IS NOT ASSIGNED TO ONE
        $car="Not Assigned";
        $plate="None";
        $model="None";
        $status='None';
        $reg_date="None";
        $from="Not Assigned";
        $to="";                                    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="main">
    
<h1 class="w3-center">Delivery Truck Information</h1>
<!-- <div style="left:0%"> -->


             

            <div style="margin-left:4%">
                 <h5>Truck Brand</h5>
             <p><i class="fa fa-truck fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $car?></p>
             </div><hr style="width:100%;">
             
             
             <div style="margin-left:4%">
                 <h5>Truck Model</h5>
                 <p><i class="fa fa-truck fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $model?></p>
             </div><hr style="width:100%;">
             
             
             <div style="margin-left:4%">
                 <h5>Plate Number</h5></p>
                 <p><i class="fa fa-barcode fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $plate?>
             </div><hr style="width:100%;">
             
             
             <div style="margin-left:4%">
                 <h5>Truck Performance</h5>
                 <p><i class="fa fa-tools fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $status?></p>
             </div><hr style="width:100%;">
             
             
             <div style="margin-left:4%">
                 <h5>State Of Delivery</h5>
                 <p><i class="fa fa-route fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $locate?></p>
             </div><hr style="width:100%;">
             
             
             <div style="margin-left:4%">
                 <h5>Truck Registration Date</h5>
                 <p><i class="fa fa-calendar fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $reg_date?></p>
             </div><hr style="width:100%;">

           </div>

           
          </div>
    


</body>
</html>




