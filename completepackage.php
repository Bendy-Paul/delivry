<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="main" class="w3-light-grey">


<?php include 'header.php';
// include 'cancelpackage.php';

$T_N="";



if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

  // IF SENDER HAS AN ACCOUNT
 if (isset($_POST['cancel'])) {

  $delete= $conn->query("DELETE FROM d_orders WHERE tracking_number='".$_POST['delete_number']."';");

 }
  }  


  if (isset($_POST['track_number'])!==false){
    $T_G=$_POST['track_number'];
 }else {
   $T_G="";
 }
                   
?>

<style>
     @media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;margin-right:0px;
    }

}

.table{
    font-size:10.7px;
}
.modal{
    font-size:14.8px;
    float: left !important;

}


#id{
    display:none;
}

.data{
  display: block;
}
</style>


<br><br>
<div class="card card-outline card-primary">
		<div class="card-header">
		    	<div class="card-tools">
              <form method="POST" class="">

                 <div class="row">  
                    <label for="">Enter Tracking Number</label>
			                	<div class="input-group col-sm-12">
                             <input type="text" name="track_number" id="ref_no" class="form-control" value="<?php echo $T_G  ;?>">
                                 <div class="input-group-append">
                        <button type="submit" name="track-btn" class="btn btn-sm btn-primary btn-gradient-primary"> <i class="fa fa-search"></i> </button>
                        <button type="submit" class="btn btn-sm btn-danger btn-gradient-danger" id="id"><i class="fa fa-times"></i></button>
                    </div>
                </form>
</div>		
</div>
    <br>
<a class="btn btn-block btn-sm btn-default btn-flat border-primary btn-primary" href="newpackage1.php"><i class="fa fa-plus"></i> Add New</a>

		</div>
		<div class="card-body w3-responsive">

    <table class="table w3-table-all table-bordered cd-table order-table table" id="myTable" id="list">

				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup> -->
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Sender Name</th>
						<th>Sender Number</th>
						<th>Reciver Name</th>
						<th>Reciver Number</th>
						<th>pickup Station</th>
						<th>Item Status</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody id="myMenu" id="data">
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM d_orders WHERE item_status='1';");
                    $status="";
                    if($qry->num_rows>0){

					while($row= $qry->fetch_assoc()):
                        switch ($row['item_status'] ) {
                            case '1':
                                $status= "<span class='w3-center badge badge-info'>pending</span>";
                                break;
                            case '2':
                                $status= "<span class='w3-center badge badge-info'>Collected by delivery company</span>";
                                break;
                            case '3':
                                $status= "<span class='w3-center badge badge-primary'> Shipped</span>";
                                break;
                            case '4':
                                $status= "<span class='w3-center badge badge-primary'>In Transit</span>";
                                break;
                            case '5':
                                 $status= "<span class='w3-center badge badge-primary'>Out for Delivery</span>";
                                 break; 
                                    
                             case '6':
                                $status= "<span class='w3-center badge badge-primary'>Arrived At Pickup Station</span>";
                                 break;
                            case '7':
                                $status= "<span class='w3-center badge badge-primary'>Ready for Pickup</span>";
                                break;
                            case '8':
                                $status= "<span class='w3-center badge badge-success'>Picked-up</span>";
                                break;
                            case '9':
                                $status= "<span class='w3-center badge badge-danger'>Unsuccessfull Delivery Attempt</span>";
                                break;
                            };
                        // echo print_r($row);
                        if (isset($_POST['track-btn'])==false OR $_POST['track_number']=="" ) {
                         
?>

<span id="data">
  
<tr>

<td id="data"><b><?php echo $row['tracking_number'] ?></b></td>
<td id="data"><b><?php echo $row['sender_name']; ?></b></td>
<td id="data"><b><?php echo $row['sender_number'] ?></b></td>
<td id="data"><b><?php echo $row['reciver_name'] ?></b></td>
<td id="data"><b><?php echo $row['reciver_number'] ?></b></td>
<td id="data"><b><?php echo $row['reciving_branch'] ?></b></td>
<td id="data" class="w3-center"><b><?php echo $status;?></b></td>

<td class="text-center">
  
<div class="btn-group">
     <button name="name" class="btn btn-info w3-text-white btn-flat view_parcel" data-toggle="modal" data-target="#<?php echo $row['tracking_number']?>"> <i class="fas fa-eye"></i> </button>
     <button name="name" class="btn w3-teal btn-flat view_parcel" data-toggle="modal" data-target="#<?php echo $row['tracking_number']?>status"                                                                         
<?php
if($row['item_status'] =="8") {

?>
disabled
<?php
}
?>
     > <i class="fas fa-clipboard-list"></i> </button>
<a  class="btn w3-text-white w3-amber btn-flat" 
                                                             
<?php
if($row['item_status'] >="3" && $row['item_status']!="9") {

?>
style="opacity: 0.5;"
<?php
}
else {

?>
href="updatepackage.php?tracking_number=<?php echo $row['tracking_number'] ?>"
<?php
}
?>
     
> <i class="fas fa-edit"></i></a>
<button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#<?php echo $row['tracking_number']."cancel"?>"                                                                         
<?php
if($row['item_status'] =="8") {

?>
disabled 
<?php
}elseif($row['item_status'] =="9") {

?>
style="display:none"
<?php
}
?>
>                           
<i class="fas fa-times"></i>
</button>


<button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#<?php echo $row['tracking_number']."delete"?>"                                                                         
<?php
if($row['item_status'] !=="9") {

?>
style="display:none"
<?php
}elseif($row['item_status'] =="9") {

?>
style="display:block"
<?php
}
?>

>
<i class="fas fa-trash"></i>
</button>
</div>
</td>
</tr>
<?php
  }
  ?>







<!-- MODAL TO CANCEL PACKAGE -->
<div class="modal fade" id="<?php echo $row['tracking_number']."cancel" ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cancel Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			Are you sure you want to cancel this item tracking number <?php echo $row['tracking_number']?></div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fas fa-times"></i> </button>

          <!-- <input type="text" name="track" value="" style="display:none" id=""> -->
      <a href="cancelpackage.php?track=<?php echo $row['tracking_number']?>" name="cancel" class="btn btn-danger"> <i class="fas fa-check"></i> </a>
      </div>
    </div>
  </div>
</div>






<!-- MODAL TO DELETE PACKAGE -->
<div class="modal fade" id="<?php echo $row['tracking_number']."delete" ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cancel Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		      	Are you sure you want to delete this item tracking number <?php echo $row['tracking_number']?></div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fas fa-times"></i> </button>

      <form method="POST">
        <input type="hidden" name="delete_number" value="<?php echo $row['tracking_number'] ?>">

      <button type="submit" name="cancel" class="btn btn-danger"> <i class="fas fa-check"></i> </button>
      </div>
          </form>

    </div>
  </div>
</div>





<!-- MODAL TO UPDATE PACKAGE STATUS-->
<div class="modal fade" id="<?php echo $row['tracking_number']?>status" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="staticBackdropLabel">Update Package Status</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="" method="get">
                    
      <h5 class="w3-center">Package Status</h5>  
<!-- <hr> -->
<div class="">
<select name="stat" id="to" class="form-control" style='font-size:12px'>
<option value="<?php 


$number=$row['tracking_number'];

$all=$conn->query("SELECT * FROM d_orders WHERE tracking_number='$number'");
$pack=$all->fetch_assoc();







echo $pack['item_status'] ?>" class="btn btn-success" style='font-size:12px'>change Package Status</option> 
<option value="1">Pending</option>
<option value="2">Collected by delivery company</option>
<option value="3">Shipped</option>
<option value="4">In Transit</option>
<option value="5">out to pickup station</option>
<option value="6">Arrived at pickup station</option>
<option value="7">Ready For pickup</option>
<option value="8">Picked-up</option>
<option value="9">Unsuccessfull Delivery Attempt</option>
</select>
</div>

<input type="hidden" name="numb" value="<?php echo $row['tracking_number'] ?>">
<input type="hidden" name="truck_id" value="<?php echo $row['delivery_truck_number'] ?>">


<!-- <input type="hidden" name="pack" value="<?php echo $row['sender_number'] ?>"> -->

      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-times"></i> </button>

          <!-- <input type="text" name="track" value="" style="display:none" id=""> -->
      <button name="update" type="submit" class="btn btn-success" > <i class="fas fa-check"></i> </button>
      </form>

      </div>
    </div>
  </div>
</div>
                          </div></div>

<!-- MODAL TO VIEW PACKAGE INFORMATION -->
<div class="modal fade" id="<?php echo $row['tracking_number']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">                        
          <div class="modal-dialog modal-xl" >
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Package Info</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                </div>
                                 <div class="modal-body ">
                                    <!-- item Tracking id -->
                                <div class="w3-card-4 card-primary  w3-padding-large w3-round w3-leftbar w3-border-indigo"><h4 class="fa  fa-address-card fa-fw fa-lg w3-margin-right w3-text-indigo"></h4><?php echo $row['tracking_number']?></div>


                            <div class="row">
                                <!-- user and sender information card -->
                                <div class="col-sm-6">
                                     <br>
                                    <div class="w3-card-4 card-primary  w3-padding-large  w3-border w3-round w3-leftbar w3-border-indigo">
                                        <h3 class="w3-center">Sender Information</h3>
                                        <!-- sender name -->
                                        <p><h6> <i class="fa  fa-user fa-fw fa-lg w3-margin-right w3-text-indigo"></i><?php echo $row['sender_name']; ?></h6></p>
                                        <!-- sender number -->
                                        <h6> <i class="fa  fa-phone fa-fw fa-lg w3-margin-right w3-text-indigo"></i><?php echo $row['sender_number']; ?></h6>
                                        <!-- sender address -->
                                        <p><h6> <i class="fa  fa-home fa-fw fa-lg w3-margin-right w3-text-indigo"></i><?php echo $row['sender_address']; ?></h6></p>
                                     </div>
<br>
                                    <div class="w3-card-4 card-primary  w3-padding-large  w3-border w3-round w3-leftbar w3-border-indigo">
                                        <h3 class="w3-center">Reciver Information</h3>
                                        <!-- reciver name -->
                                        <p><h6> <i class="fa  fa-user fa-fw fa-lg w3-margin-right w3-text-indigo"></i><?php echo $row['reciver_name']; ?></h6></p>
                                        <!-- reciver Number -->
                                        <h6><i class="fa  fa-phone fa-fw fa-lg w3-margin-right w3-text-indigo"></i><?php echo $row['reciver_number']; ?></h6>
                                        <!-- reciver addrass -->
                                        <p><h6> <i class="fa  fa-home fa-fw fa-lg w3-margin-right w3-text-indigo"></i><?php echo $row['reciver_address']; ?></h6></p>
                                </div>
<br>
                                <div class="w3-card-4 card-primary  w3-padding-large  w3-border w3-round w3-leftbar w3-border-indigo">

                                                    <?php
                                                    $plate_number=$row['delivery_truck_number']; 

                                                    $driverinfo = $conn->query("SELECT * FROM delivery_trucks WHERE dcar_id='$plate_number' ");
                                                    $info=$driverinfo->fetch_assoc();
                                                    if ($driverinfo->num_rows>0) {


                                                    $driver_id=$info['driverid'];
                                                    $driverinfo2 = $conn->query("SELECT * FROM dstaff WHERE dstaffid='$driver_id' ");
                                                    $info2=$driverinfo2->fetch_assoc();
                                                    
                                                        


                                                        $driv=$info['cardriver'];
                                                        $dphone=$info2['dphone'];
                                                        $d_t_brand=$info['carbrand'];
                                                        $t_model=$info['carmodel'];
                                                        $p_number=$info['dcar_id'];



                                                    }
                                                    else {
                                                        $driv="Not Assigned";
                                                        $dphone="None";
                                                        $d_t_brand="None";
                                                        $t_model="None";
                                                        $p_number="None";
                                                    }

                                                    ?>

                                                    <h3 class="w3-center">Package Driver information</h3>                            


                                                    
                                                    <p><h6> <i class="fa  fa-user fa-fw fa-lg w3-margin-right w3-text-indigo"></i><?php echo $driv ?></h6></p>

                                                    
                                                  
                                                    <h6> <i class="fa  fa-phone fa-fw fa-lg w3-margin-right w3-text-indigo"></i><?php echo $dphone; ?></h6>

                                                                                
                                                    
                                                    <p><h6> <i class="fa  fa-truck fa-fw fa-lg w3-margin-right w3-text-indigo"></i><?php echo $d_t_brand ?></h6></p>

                                                    
                                        
                                                    <h6> <i class="fa  fa-truck fa-fw fa-lg w3-margin-right w3-text-indigo"></i><?php echo $t_model ?></h6>


                                                  
                                                    <p><h6> <i class="fa  fa-barcode fa-fw fa-lg w3-margin-right w3-text-indigo"></i><?php echo $p_number ?></h6></p>




                                              </div>
                                                     </div>
                                                      <div class="col-sm-6"><br><div class="w3-card-4 card-primary  w3-padding-large  w3-border w3-round w3-leftbar w3-border-indigo">
                                                      <h3 class="w3-center">Package Information</h3>

                                                      <b>Item Weight</b>
                                                      <p><?php echo $row['item_weight']; ?> Grams</p> 


                                                      <div>
                                                      <b>Item Height</b>
                                                      <p><?php echo $row['item_height']; ?> Meters</p> 

                                                      </div>
                                                      
                                                      <b>Item Width</b>
                                                      <p><?php echo $row['item_width']; ?> Meters</p>

                                                      

                                                      <b>Item price</b>
                                                      <p>N <?php echo $row['item_price']; ?></p>


                                                      <b>Package Sender</b>
                                                      <p><?php echo $row['sending_branch']; ?></p>


                                                      <b>Package Reciver</b>
                                                      <p><?php echo $row['reciving_branch']; ?></p>


                                                      <b>Date of Registration</b>
                                                      <p><?php  $d=strtotime($row['registration_date']);
                                                  echo date("l F d Y", $d);
                                                  ?> </p>


                                                      <b>Package Status</b>
                                                      <p><?php echo $status?></p>


                                                      
                                                      <b>Package Driver ID</b>
                                                      <p><?php echo $row['delivery_truck_number']; ?></p>

                             </div> </div>
                
   
      </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

                                   
<?php endwhile;
}else{
	if (isset($_POST['track-btn'])==false OR $_POST['track_number']=="" ) {
 
        ?>
   <tr>
    <th colspan="8" class="w3-center w3-text-red w3-padding-large">There are no outgoing packages at this time</th>
  <tr>                                                                                        
<?php
	}
}
?>

</span>	

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
 if (isset($_POST['track-btn']) AND $_POST['track_number']!="") {

  
    ?>

<script>

document.getElementById("id").style.display = "block"
document.getElementById("data").style.display = "none"

</script>
    <?php
$T_N=$_POST['track_number'];
$T_N=clean($T_N);

$item_status="";
switch ( strtolower($T_N) ) {
  case 'pending':
      $item_status= "1";
      break;
  case 'collected by delivery company':
      $item_status= "2";
      break;
  case 'shipped':
      $item_status= "3";
      break;
  case 'in transit':
      $item_status= "4";
      break;
  case 'out to pickup station':
       $item_status= "5";
       break; 
          
   case 'arrived at pickup station':
      $item_status= "6";
       break;
  case 'ready for pickup':
      $item_status= "7";
      break;
  case 'picked-up':
      $item_status= "8";
      break;
  case 'unsuccessfull delivery attempt':
      $item_status= "9";
      break;
  };


    $getitem = $conn->query("SELECT * FROM d_orders WHERE (tracking_number LIKE '%$T_N%' OR sender_number LIKE '%$T_N%'OR reciver_number LIKE '%$T_N%' OR package_name LIKE '%$T_N%' OR sender_name LIKE '%$T_N%'OR reciver_name LIKE '%$T_N%'OR sending_branch_state LIKE '%$T_N%'OR reciving_branch_state LIKE '%$T_N%'OR delivery_truck_number LIKE '%$T_N%' OR package_name LIKE '%$T_N%'OR reciving_branch_id LIKE '%$T_N%'OR  reciving_branch LIKE '%$T_N%' OR sending_branch LIKE '%$T_N%'OR  item_status='$item_status') AND item_status='1' ");
if ($getitem->num_rows>0 AND $_POST['track_number']!="") {
    $num=0;

while ($get_item_status=$getitem->fetch_assoc()) {

  switch ($get_item_status['item_status'] ) {
    case '1':
        $status= "<span class='w3-center badge badge-info'>pending</span>";
        break;
    case '2':
        $status= "<span class='w3-center badge badge-info'>Collected by delivery company</span>";
        break;
    case '3':
        $status= "<span class='w3-center badge badge-primary'> Shipped</span>";
        break;
    case '4':
        $status= "<span class='w3-center badge badge-primary'>In Transit</span>";
        break;
    case '5':
         $status= "<span class='w3-center badge badge-primary'>Out for Delivery</span>";
         break; 
            
     case '6':
        $status= "<span class='w3-center badge badge-primary'>Arrived At Pickup Station</span>";
         break;
    case '7':
        $status= "<span class='w3-center badge badge-primary'>Ready for Pickup</span>";
        break;
    case '8':
        $status= "<span class='w3-center badge badge-success'>Picked-up</span>";
        break;
    case '9':
        $status= "<span class='w3-center badge badge-danger'>Unsuccessfull Delivery Attempt</span>";
        break;
    };

?>
  
  <tr>

<td><b><?php echo $get_item_status['tracking_number'] ?></b></td>
<td><b><?php echo $get_item_status['sender_name']; ?></b></td>
<td><b><?php echo $get_item_status['sender_number'] ?></b></td>
<td><b><?php echo $get_item_status['reciver_name'] ?></b></td>
<td><b><?php echo $get_item_status['reciver_number'] ?></b></td>
    <td><b><?php echo $get_item_status['reciving_branch'] ?></b></td>
    <td class="w3-center"><b><?php echo $status;?></b></td>

<td class="text-center">
      
    <div class="btn-group">
         <button name="name" class="btn btn-info w3-text-white btn-flat view_parcel" data-toggle="modal" data-target="#<?php echo $get_item_status['tracking_number']?>"> <i class="fas fa-eye"></i> </button>
         <button name="name" class="btn w3-teal btn-flat view_parcel" data-toggle="modal" data-target="#<?php echo $get_item_status['tracking_number']?>status"                                                                         
<?php
if($get_item_status['item_status'] =="8") {

?>
disabled
<?php
}
?>
         > <i class="fas fa-clipboard-list"></i> </button>
<a  class="btn w3-text-white w3-amber btn-flat" 
                                                                 
<?php
if($get_item_status['item_status'] >="3" && $get_item_status['item_status']!="9") {

?>
style="opacity: 0.5;"
<?php
}
else {

?>
href="updatepackage.php?tracking_number=<?php echo $get_item_status['tracking_number'] ?>"
<?php
}
?>
         
> <i class="fas fa-edit"></i></a>
<button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#<?php echo $get_item_status['tracking_number']."cancel"?>"                                                                         
<?php
if($get_item_status['item_status'] =="8") {

?>
disabled 
<?php
}elseif($get_item_status['item_status'] =="9") {

?>
style="display:none"
<?php
}
?>
>                           
    <i class="fas fa-times"></i>
    </button>


    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#<?php echo $get_item_status['tracking_number']."delete"?>"                                                                         
<?php
if($get_item_status['item_status'] !=="9") {

?>
style="display:none"
<?php
}elseif($get_item_status['item_status'] =="9") {

?>
style="display:block"
<?php
}
?>

>
    <i class="fas fa-trash"></i>
    </button>
    </div>
</td>
</tr>	

<?php
}

}

else {
   ?>
   <tr class="w3-white">
    <th colspan="8" class="w3-center w3-text-red w3-padding-large">No Information Found</th>
  <tr>       
<?php
}

}
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

</p>


<!-- VALIDATION FOR UPDATING PACKAGE STATUS -->

<?php


if (isset( $_GET['update'])) {

$number=$_GET['numb'];



$all=$conn->query("SELECT * FROM d_orders WHERE tracking_number='$number'");
$pack=$all->fetch_assoc();

$sender=$pack['sender_number'];

$status=$_GET['stat'];

if ($_GET['truck_id']=='Not Assigned' && $status!=1 && $status!=9 ) {


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
    <div class="modal-body ">
      <p> <?php echo "Assign package to a driver before changing its status"?></p>
    </div>
      <a href="vieworders.php" style="width:70%;margin:auto" class="btn btn-danger" data-dismiss="modal">Close</a><br>
    </div>
  </div>
  </div>
  <div class="modal-backdrop fade show"></div>
  <?php

} else {
  
if ($status!=$pack['item_status'] ) {

  $sql=$conn->query("DELETE FROM item_status WHERE tracking_number=$number AND dstatus>=$status;");

    $sql=$conn->query("UPDATE d_orders SET item_status=$status WHERE tracking_number=$number;");

    $sql2=$conn->query("INSERT INTO item_status SET tracking_number='$number', dstatus=$status, sender_number='$sender' ;");
    

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
  <div class="modal-body ">
    <p> <?php echo "Package Status Hat Been Updated Successfully"?></p>
  </div>
    <a href="vieworders.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
  </div>
</div>
</div>
<div class="modal-backdrop fade show"></div>
<?php
}
}
}

?>


<script src="../bootstrap4/js/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap4/js/popper.min.js"></script>
    <script src="../bootstrap4/js/bootstrap.js"></script>
    <script src="../bootstrap4/js/bootstrap.min.js"></script>    
</body>
</html>
