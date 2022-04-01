



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

       
<?php
 include 'header.php' ;


?> 
      <body class="main">



<style>

  	  
.table{
    font-size:12.7px;
}

@media only screen and (max-width: 990px) {
    .main{
         margin-left:0px !important;
         /* margin-right:0px; */
    }
}
        </style> 
    
      <br><br>
      <div class="card card-outline card-primary">
              <div class="card-header">
                  <div class="card-tools">
                    <!-- SEARCH BAR -->
                  <div class="row">  
            <h4>Search:</h4>
 
<span><input type="search" class="cd-search table-filter form-control" data-table="order-table" style="width:100%" class="form-control" placeholder="search orders"></span>
</div>		
	</div>
    <br>
    <!-- ADD NEW WORKER AS DRIVER -->
<a class="btn btn-block btn-sm btn-default border-primary btn-primary" href="newpackage1.php"><i class="fa fa-plus"></i> Add New</a>

		</div>
		<div class="card-body w3-responsive">

    <table class="table w3-table-all table-bordered cd-table order-table table" id="myTable" id="list">

    <script src="search.js"></script>
                      <!-- TABLE CONTENT -->
                      <thead>
                          <tr>
                              <th class="text-center">#</th>
                              <th>Driver Name</th>
                              <th>Staff ID</th>
                              <th>Delivery Truck</th>
                              <th>Truck Model</th>
                              <th>Plate Number</th>
                              <th>Packages That Can Be Assigned</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $i = 0;
                          $qry = $conn->query("SELECT * FROM dstaff WHERE dstatus='Driver' ORDER BY dstate ASC; ");
                          while($row= $qry->fetch_assoc()){

                            
                            $id=$row['dstaffid'];



                                $qry2 = $conn->query("SELECT * FROM delivery_trucks WHERE driverid='$id' ; ");
                                $see=$conn->query("SELECT * FROM delivery_trucks WHERE driverid=$id; ")->num_rows;
                                if ($conn->query("SELECT * FROM delivery_trucks WHERE driverid=$id; ")->num_rows!=0) {
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
                          <tr>
                            <!-- TABLE INFORMATION -->
                           <td><b><?php $i=$i+1; echo  $i ?></b></td>
                          <!-- <td><b></b></td> -->
                              <td><b><?php echo $row['dfname']." ".$row['dlname']; ?></b></td>
                              <td><b><?php echo $model ?></b></td>
                              <td><b><?php 
                                echo $car;

                              ?></b></td>



                              <td><b><?php echo $model ?></b></td>
                              
                             
                              
                              <td><b>
                              <?php
                             echo $plate;
                             $row2= $qry2->fetch_assoc();?></b></td>
                             
                              <td class="text-center"><b><?php echo $from ?></b> To <b> <?php echo $to ?> </b></td>
      
                              <td class="text-center">
                              <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


                                
                              <div class="btn-group "> <button value="<?php echo $row['dstaffid']?>" name="name" class="w3-text-white btn btn-info view_parcel" data-toggle="modal" data-target="#<?php echo $row['dstaffid']?>"> <i class="fas fa-eye"></i> </button>
                              <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

                              
                              <a href="assignpackages.php?plate_number=<?php echo $plate ?>&start=<?php echo $from ?>&end=<?php echo $to ?> " class="btn w3-teal view_parcel"> <i class="fas fa-box"></i> </a>
                              <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


                             <button value="<?php echo $row['dstaffid']?>" name="name" class="btn btn-secondary view_parcel" data-toggle="modal" data-target="#<?php echo $i?>"> <i class="fas fa-truck"></i> </button>
                              <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

                                  <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#<?php echo $i."two"?>">
                                  <i class="fas fa-times"></i>
                                  </button>
                                <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
                              </div>
                              </td>
                          </tr>	
                          <!-- END OF TABLE INFORMATION -->
      
      
      
<!-- MODAL TO UPDATE PACKAGE STATUS-->
<div class="modal fade" id="<?php echo $plate ?>assign" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Available Packages Going To <?php echo " $to From $from "?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body w3-padding-large">

      <a href="#show<?php echo $plate ?>case" ><i class="btn btn-primary w3-text-white" style="position:fixed"><i class=" fa fa-arrow-down  "></i></i></a>


<?php
      // echo $row['dstaffid'];                    

$available_package= $conn->query("SELECT * FROM d_orders WHERE (item_status!=1 OR	item_status!=8 OR item_status!=9) AND delivery_truck_number='Not Assigned' AND sending_branch_state='$from' AND reciving_branch_state='$to' ;");
$increase=1;
while ($assign=$available_package->fetch_assoc() ) {
if ( $available_package->num_rows>0 ){
 
?>

<style>

.main{
        margin-left:300px ;margin-right:5px;
        margin-top:40px;
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
</style>

<div style="display:none;font-size:0px">
  
<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $tn=$assign['tracking_number'];
  
  
if ($_POST["$tn"] !="") {
  $tr_numb=$assign['tracking_number'];

  $plateN=$_POST['plateN'];

if (isset($_POST['assign'])) {

  $sql=$conn->query("UPDATE d_orders SET  delivery_truck_number='$plateN' WHERE tracking_number='$tr_numb';");
}

}

}
?>

</div>

<form action="viewdrivers.php" class="form" method="POST">


<span>
  
<?php
if($increase=="1"){
?>
<span class="w3-right"><h4>
Select All
<input type="checkbox" id="<?php echo $assign['tracking_number'] ?>">
</h4></span>
<?php
}
?>

<h3 class="soap"><?php echo $increase ?></h3>


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


<div class="w3-padding-large">

<h2 class="soap w3-center w3-text-indigo"><?php echo $assign['tracking_number'] ?></h2>


<b class=" w3-text-indigo">Destination:</b>
  <h6><?php echo $assign['reciving_branch'] ?></h6>
<b class=" w3-text-indigo">Date Of Registration:</b>
  <h6><?php
              $d=strtotime($assign['registration_date']);
              echo date("l F d Y", $d);?></h6>            
<b class=" w3-text-indigo">Item Weight:</b>
  <h6><?php echo $assign['item_weight'] ?> Grams</h6>



<span class="w3-right"><h5>
Select Package 
<input  type="checkbox" name="<?php echo $assign['tracking_number']?>" value="<?php echo $assign['tracking_number']; ?>">
</h5></span>


<input type="hidden" id="open" value="<?php echo $plate ?>" name="plateN">

<!-- <span style="left:40px"> -->
<!-- <label class="contain"> -->
<!-- &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->

  <!-- <span class="checkmark" style="float:right"></span> -->
<!-- </label> -->

<br><br>

</div>
<hr style="width:100%">


<?php
}

$increase=$increase+1;

}
?>
</span>


<?php
if($available_package->num_rows=='0'  && $plate!=="None") {
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

<div class="icon2 w3-text-indigo w3-center">

    <i  class="fa fa-box-open w3-center" style="margin:auto"></i><br>
    <h3>Ther Are No Available Packages Going To <?php echo " $to From $from "?> At This Time</h3>

</div>
  
<?php
}
?>
      <div style="width:100%">
<span  style="right:0px"><button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
</span>

<span style="float:right"><input type="submit"  name="assign" class="btn btn-primary" value="Assign">
</span>
</form>


<div id="show<?php echo $plate ?>case">
  <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit delectus incidunt laborum error eligendi aliquam doloribus totam natus vitae. Eos sit officia, ratione facilis aliquid architecto, ipsum aspernatur repellat delectus modi alias tempore mollitia voluptas voluptatem natus, debitis corrupti beatae. Provident laborum vitae, tempora corrupti et recusandae nulla dicta. Fugit dolorem nobis magnam repellendus magni consectetur soluta exercitationem cum odit vero, esse velit voluptates. Alias illum officia quia labore harum dicta suscipit, aspernatur enim recusandae facilis esse veritatis temporibus excepturi pariatur praesentium consequuntur tempore deserunt deleniti vel, est in! Error nostrum veniam ullam provident iusto aliquid aperiam laborum ipsa voluptas ex labore, consequuntur architecto incidunt quasi asperiores ad dolor facere, nobis, odit natus magnam tempore assumenda placeat hic? Laboriosam possimus cumque quos voluptates quod error sint eligendi, dolor ullam deleniti sequi nobis dolorem tenetur, saepe itaque. Reiciendis, vitae illo unde iste ratione similique autem ad amet molestiae natus nulla iusto sit eum itaque quasi perspiciatis in. Doloremque repellendus nulla officia sed eveniet, sunt, culpa ullam, aut enim ea corporis numquam blanditiis delectus nisi quae mollitia porro reiciendis vitae consequatur eligendi neque atque cupiditate omnis optio! Molestiae ea quisquam cupiditate commodi provident facere et eligendi sit, quis vitae ipsa ex corporis atque amet laudantium! Exercitationem perspiciatis quae, laboriosam veniam hic repudiandae incidunt, quos, temporibus ut odio molestiae fugiat doloribus. Reiciendis, laborum nobis. Maxime obcaecati pariatur iste aliquam inventore est enim saepe! Nemo et qui numquam molestiae incidunt, velit fuga ad aperiam laboriosam nobis blanditiis quod at praesentium earum reiciendis quos quibusdam sunt provident omnis accusantium! Eligendi deserunt fugiat harum inventore tempore, dignissimos sint illum officiis? Iste sequi soluta maiores deleniti, doloribus nobis accusantium sed quidem. Dolorum, modi autem. Unde, placeat velit qui natus quae rem laboriosam sint est sapiente quaerat harum quam itaque vel impedit consectetur. Nulla incidunt debitis dignissimos nam explicabo fuga officiis sit ducimus vel fugiat qui omnis temporibus, similique officia quasi aut facilis esse nemo voluptatibus numquam provident. Facilis error rem ipsam obcaecati repellendus voluptatum, vel, impedit sit, illo nesciunt minima ut eos magni. Quis quasi tempore distinctio cum quod dolor consequuntur eaque. -->
</div>

      </div>
    </div>
  </div>
</div>
</div>   
      
                          
         
      <!-- MODAL TO VIEW ALL TRUCK INFORMATION -->
                          <div class="modal fade" id="<?php echo $row['dstaffid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"><h3> <i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-blue"></i><?php     echo $row['dfname']." ".$row['dlname']; ?></h3></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body w3-left-align w3-padding-large" style="width:67%;margin:auto">
           <div class="w3-card-2 card-primary w3-padding-large w3-round">
             <h2 class="w3-center">Driver's Current Truck Info</h2>

             <!-- <p><?php echo $car ?></p> -->
             <h5>Truck Brand</h5>
             <p><i class="fa fa-truck fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $car?></p><hr style="width:100%;">
             <h5>Truck Model</h5>
             <p><i class="fa fa-truck fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $model?></p><hr style="width:100%;">
             <h5>Plate Number</h5>
             <p><i class="fa fa-barcode fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $plate?></p><hr style="width:100%;">
             <h5>Truck Performance</h5>
             <p><i class="fa fa-tools fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $status?></p><hr style="width:100%;">
             <h5>State Of Delivery</h5>
             <p><i class="fa fa-route fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $locate?></p><hr style="width:100%;">
             <h5>Truck Registration Date</h5>
             <p><i class="fa fa-calendar fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $reg_date?></p><hr style="width:100%;">

           </div>

           
          </div>
            <!-- </div> -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Understood</button> -->
            </div>
          </div>
        </div>
      </div>
      </div>

    
      <!-- MODAL TO ASSIGN A DRIVER TO A DELIVERY TRUCK -->
      <div class="modal fade" id="<?php echo $i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"><h3> <i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-blue"></i><?php     echo $row['dfname']." ".$row['dlname']; ?></h3></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <br><br>
            <div class="modal-body w3-left-align w3-padding-large w3-border w3-round w3-card-2" style="width:67%;margin:auto">

            <br><br>

  <form action="updatedriver.php">

  <!-- IF DRIVER IS NOT ASSIGNED TO A TRUCK ALREADY ELSE DO NOT ALLOW HIM TO BE ASSIGNED TO ANOTHER TRUCK -->

      <?php
   
   if ($car=="Not Assigned"){
      ?>
            <br><br>
            <input type="text" name="branchid" id=""value="<?php echo $row['dstate']; ?>" style="display:none">

            <h6 for="" class="w3-center">Available Delivery Trucks To Assign To Driver</h6>
            <select name="assign" id="truck" class="form-control" style="margin:auto">


            <?php
      
            // $name=
            $id=$row['dstaffid'];
            

      $qry5 = $conn->query("SELECT * FROM delivery_trucks WHERE cardriver='Not Assigned' AND carperformance='Good'; ");
      if ($qry5->num_rows>0) {
   
          while($rowa= $qry5->fetch_assoc()){
      ?>

     <option value="<?php echo $rowa['dcar_id'];?>"><?php  echo  $rowa['carbrand'] ." ".  $rowa['carmodel']." -   ".$rowa['dcar_id'] ;?></option>
      <?php
      }   }else {
        echo"<option>sorry No avialable trucks at this time</option>";
      ?>
      
      <?php
      }
      ?>
            </select>

            <input type="text" name="name" id=""value="<?php echo $row['dfname']." ".$row['dlname']; ?>" style="display:none">
            <input type="text" name="id" id=""value="<?php echo $row['dstaffid']; ?>" style="display:none">


            <br><br>
            <button type="submit" class="btn btn-primary assign" value="" style="float:right" name="edit">Assign</button>

<?php
          } elseif($car!="Not Assigned") {
             
            ?>
            <br>
<h5 class="w3-text-red w3-center">Unassign Drivers current Truck and Try Again!</h5>
<br>
<?php
      }
      ?>
            </form>
            <br><br>

</div><br><br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Understood</button> -->
            </div>
          </div>
        </div>
      </div>
      </div>




      <!-- MODAL TO UNASSIGN A DRIVER'S DELIVERY TRUCK -->
      <div class="modal fade" id="<?php echo $i."two"?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unassign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Are you sure you want to unassign this drivers truck</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
        <a href="unassign.php?staff=<?php echo $row['dstaffid']?>" name="unassign" type="buton" class="btn btn-danger"> <i class="fas fa-check"></i> </a>
      </div>
    </div>
  </div>
</div>

      <?php
      }
      ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      

<div class="card-footer w3-center">
<div class="card-tools">
    
<span colspan="8" style="margin:auto">End Of List</span>

</div>
</div>
<script src="../4/w3.js"></script>

      </body>
      </html>




</body>
</html>