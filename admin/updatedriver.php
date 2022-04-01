<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p style="display:none;font-size:0rem">
            <?php
include 'viewdrivers.php';
// include 'header.php' ;
if ($_SERVER["REQUEST_METHOD"] == "GET" ) {



    $carid=$_GET['assign'];
    $name=$_GET['name'];
    $id=$_GET['id'];
    $branchid=$_GET['branchid'];

    

}
// IF DRIVER HAS BEEN ASSIGNED TO A CAR

// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

if (isset($_GET["edit"]) && $car="Not Assigned") {
  
  
  $sql=$conn->query("UPDATE delivery_trucks SET cardriver='$name', driverid='$id', driver_office_branch_id='$branchid'	WHERE dcar_id='$carid';");

  if ($sql && $conn->query("SELECT * FROM delivery_trucks WHERE dcar_id='$carid'")->num_rows>0) {
      ?>

</p>
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
        <p>Delivery Truck number <?php echo $carid ?> has Successfully been assigned to driver <?php echo $name ?></p>
      </div>
        <a href="viewdrivers.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
    </div>
  </div>
</div>
<div class="modal-backdrop fade show"></div>
<?php

} 
// IF DRIVER HAS NOT BEEN ASSIGNED TO A CAR

// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

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
      <p>Truck Assignment Failed</p>
    </div>
      <a href="viewdrivers.php" style="width:70%;margin:auto" class="btn btn-danger" data-dismiss="modal">Close</a><br>
  </div>
</div>
</div>
<div class="modal-backdrop fade show"></div>
<?php
}
}

?>

</body>
</html>