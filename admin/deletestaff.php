<?php
include 'viewstaff.php';

$failded=false;
$staffid=$_GET['staffid'];
    // session_destroy();/



    $unassign=$conn->query("SELECT * FROM delivery_trucks WHERE driverid='$staffid'");

    if ($unassign->num_rows>0) {
        $unassign2=$conn->query("UPDATE delivery_trucks SET cardriver='Not Assigned',driverid='Not Assigned' WHERE driverid='$staffid'");
    }

   $delete= $conn->query("DELETE FROM dstaff WHERE dstaffid='$staffid'");
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
       <div class="modal-body">
         <p>Staff Has Been Deleted successfully</p>
       </div>
         <a href="profile.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
     </div>
   </div>
   </div>
   <div class="modal-backdrop fade show"></div>
   <?php



?>