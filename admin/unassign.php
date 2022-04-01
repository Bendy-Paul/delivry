
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="main modal-open">
   
<?php

include 'viewdrivers.php';

$id=$_GET['staff'];

$exist=$conn->query("SELECT * FROM delivery_trucks WHERE driverid=$id;")->num_rows;


// IF DRIVER HAS AN ASSIGNED CAR
if ($exist>0) {
    $assign=$conn->query("UPDATE delivery_trucks SET cardriver='Not Assigned', driverid='Not Assigned',	driver_office_branch_id='Not Assigned' WHERE driverid=$id;");


?>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

<div class="modal show" tabindex="1" style="display:block">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Delivery Truck has Successfully been unassigned</p>
      </div>
        <a href="viewdrivers.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
    </div>
  </div>
</div>
<div class="modal-backdrop fade show"></div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

<?php
// IF TH USER DOES NOT HAVE AN ASSIGNED CAR
} 
else {
    ?>
  
<div class="modal show" tabindex="1" style="display:block">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title"></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>This Driver has not Been assigned a Delivery truck yet</p>
    </div>
      <a href="viewdrivers.php" style="width:70%;margin:auto" class="btn btn-danger" data-dismiss="modal">Close</a><br>
  </div>
</div>
</div>
<div class="modal-backdrop fade show"></div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

<?php
}
?>