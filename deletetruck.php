<?php
include 'viewvehicles.php';


$truck=$_GET['number'];






$package=$conn->query("SELECT * FROM d_orders WHERE delivery_truck_number='$truck' AND (item_status!='8' AND item_status!='9')");
if ($package->num_rows>0) {
$failed=true;
?>
<div class="modal show" tabindex="1" style="display:block"  data-aos="fade-down">
<div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body w3-text-red">
    <p> Can not Delete Delivery Truck While Still Transporting packages</p>
  </div>
    <a href="viewvehicles.php" style="width:70%;margin:auto" class="btn btn-danger" data-dismiss="modal">Close</a><br>
  </div>
</div>
</div>
<div class="modal-backdrop fade show"></div>


<?php
}else {
    $conn->query("DELETE FROM delivery_trucks WHERE dcar_id='$truck'");
}
    // header("location:viewvehicles.php");

?>