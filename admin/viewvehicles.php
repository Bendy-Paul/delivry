<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </head>
<?php include 'header.php';




$error=false;
$peform="";
$plateE="";
$stateE="";

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

	$id=$_POST['id'] ;

echo $id;

	$peform=$_POST['peform'];

if (strlen($_POST['plate_number'])>7||strlen($_POST['plate_number'])<6) {
	$plateE = "Invalid Length For Plate Number <br>";
	$error=true; 
}else {
$plate_number = clean(ucfirst(str_replace(' ','-',$_POST["plate_number"])));
$plate_number = strtoupper($plate_number);

$check=$conn->query("SELECT * FROM delivery_trucks WHERE dcar_id='$plate_number';");
if ($check->num_rows>0 && $plate_number!==$id) {
	$error=true;
	$plateE = "This Plate number has already been registered <br>";
   $plate_number = $plate_number;}
// $city = ucfirst($city);
};



$check1=$conn->query("SELECT * FROM delivery_trucks WHERE dcar_id='$id';");
$truckstate=$check1->fetch_assoc();

	$package=$conn->query("SELECT * FROM d_orders WHERE delivery_truck_number='$id' AND (item_status!='8' OR item_status!='9')");
	$deliverystate = $package->fetch_assoc();


if ($truckstate['delivery_state'] != $_POST['state']) {
	if ($package->num_rows>0) {
	$error=true;
	$stateE="Cannot Change Delivery State while truck is still delivering packages <br>";
}else {
$dstate=$_POST['state'];
}
}else {
	$dstate=$_POST['state'];
}
if ($error==true) {
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
  <p><?php echo $plateE . $stateE;?></p>
  </div>
	<a href="viewvehicles.php" style="width:70%;margin:auto" class="btn btn-danger" data-dismiss="modal">Close</a><br>
</div>
</div>
</div>
<div class="modal-backdrop fade show"></div>


<?php		
	}
}

// if ($error=true) {
	
  

  


if ($error==false && isset($_POST["submit"])) {

	// $state1=$_POST["state"];
	$sql2=$conn->query("UPDATE d_orders SET delivery_truck_number='$plate_number' WHERE delivery_truck_number='$id';");


$sql=$conn->query("UPDATE delivery_trucks SET dcar_id='$plate_number',carperformance='$peform', delivery_state='$dstate' WHERE dcar_id='$id';");
						
if ($sql) {
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
<p>Vehicle Status Has Been updated successfully</p>
</div>
<a href="viewvehicles.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
</div>
</div>
</div>
<div class="modal-backdrop fade show"></div>
<?php

} }?>


  <style>
	  
.table{
    font-size:12.7px;
}
       
@media only screen and (max-width: 990px) {
        .main{
         margin-left:0px;
         margin-right:0px;
         padding-right:0px;
         margin-top:50px;
        }
}
  </style> 

<body class="main" class="w3-light-grey">

<br><br>
<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
			 <div class="row">  
            <h4>Search:</h4>
 
<span><input type="search" class="cd-search table-filter form-control" data-table="order-table" style="width:100%" class="form-control" placeholder="search vehicles"></span>
</div>		
	</div>
    <br>
<a class="btn btn-block btn-sm btn-default btn-flat border-primary btn-primary" href="newpackage1.php"><i class="fa fa-plus"></i> Add New</a>

		</div>
		<div class="card-body w3-responsive">

    <table class="table w3-table-all table-bordered cd-table order-table table" id="myTable" id="list">

    <script src="search.js"></script>
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
						<th>Car Brand</th>
						<th>Plate Number</th>
						<th>Car Model</th>
						<th>Car Status</th>
						<th>Car Driver</th>
                        <th>Driver ID</th>
                        <th>Date Of Registration</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM delivery_trucks ORDER BY carbrand ASC; ");
					while($row= $qry->fetch_assoc()):
?>

					<tr>
                     <td><b><?php echo $i++ ?></b></td>
                    <td><b><?php echo $row['carbrand'] ?></b></td>
						<td><b><?php echo $row['dcar_id'] ?></b></td>
						<td><b><?php echo $row['carmodel'] ?></b></td>
						<td><b><?php echo $row['carperformance'] ?></b></td>
                        <td><b><?php echo $row['cardriver'] ?></b></td>
                        <td><b><?php echo $row['driverid'] ?></b></td>
                        <td><b>
                        <?php
                        $d=strtotime($row['registration_date']);
                        echo date("l F d Y", $d);
                        ?></b></td>
                        
                       
                       
						<!-- <td><b><?php echo $row['dgender'] ?></b></td> -->

						<td class="text-center">
                          
                        <div class="btn-group"> <button value="<?php echo $row['dcar_id']?>" name="name" class="btn btn-info btn-flat view_parcel" data-toggle="modal" data-target="#<?php echo $row['dcar_id']?>"> <i class="fas fa-edit"></i> </button>
		                    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#<?php echo $row['dcar_id']."1"?>">
		                    <i class="fas fa-trash"></i>
		                    </button>
	                      </div>
						</td>
					</tr>	
					





<!-- MODAL TO DELETE DELIVERY TRUCK -->
					<div class="modal fade" id="<?php echo $row['dcar_id']."1"?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Delete Truck</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
						Are You Sure You Want to Delete delivery truck <?php echo $row['carbrand']." model ".$row['carmodel']." Plate number ".$row['dcar_id'] ?> you Will Not Be Able To Acsess It again</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
								<a href="deletetruck.php?number=<?php echo $row['dcar_id'] ?>" class="btn btn-danger"> <i class="fas fa-check"></i> </a>
							</div>
							</div>
						</div>
						
					</div>
                    
   
<!-- MODAL TO VIEW TRUCK INFORMATION -->
					<div class="modal fade" id="<?php echo $row['dcar_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Staff Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body w3-left-align w3-padding-large w3-border w3-round ">
      <form class="container form" method="POST"  action="#">
	<div class="row">
   <div class="form-group column col-6">
    <label for="text">Truck Name</label>
    <input type="text" class="form-control" id="text" placeholder="Eg.Paul" name="" value="<?php echo $row['carbrand']?>" disabled>
    <!-- <span class="text-danger fade show"><?php echo $password?></span> -->
  </div>

    <div class="form-group column col-6">
    <label for="text">Truck Model</label>
    <input type="text" class="form-control" id="text" name="" value="<?php echo $row['carmodel']?>" disabled>
    <!-- <span class="text-danger fade show"><?php echo $lnameErr;?></span> -->
  </div>
   </div>

   <input type="hidden" class="form-control" id="text" placeholder="Eg.Paul" name="id" value="<?php echo $row['dcar_id']?>">


  <div class="form-group">
    <label for="pwd">Plate Number</label>
    <input type="text" class="form-control" id="pwd" value="<?php echo $row['dcar_id']?>" name="plate_number">
    <span class="text-danger fade show"><?php echo $plateE;?></span>
  </div>

  <div class="form-group">
    <label for="email">Delivery State</label>
    <select name="state" id="" class="form-control">

		<option class="btn btn-secondary" value="<?php echo $row['delivery_state'] ?>"><?php echo $row['delivery_state'] ?></option>

	<?php 


		$allstate = array();

       $state1 = $conn->query("SELECT * FROM office_branch;");
			while ($office_state=$state1->fetch_assoc()) {
			array_push($allstate,$office_state['dstate']);
			$state=array_unique($allstate);

			$inplode= implode(" ",$state);
			$new=explode(" ",$inplode) ;
}
$arrlength = count($new);

for($x = 0; $x < $arrlength; $x++) {
?>

<option value="<?php echo $new[$x] ?>"><?php echo $new[$x] ?></option>

<?php }
 
?>

	</select>
    <!-- <span class="text-danger fade show"><?php echo $emailErr;?></span> -->
  </div>


  <div class="form-group">
    <label for="email">Car Peformance</label>
    <select name="peform" id="" class="form-control">
<option value="Good">Good</option>
	<option value="Bad">Bad</option>
	</select>
    <!-- <span class="text-danger fade show"><?php echo $emailErr;?></span> -->
  </div>



  <div class="form-group">
    <label for="pwd">Registration Date</label>
    <input type="text" class="form-control" id="pwd" value="<?php  echo date("l F d Y", $d);?>" name="number" disabled>
    <!-- <span class="text-danger fade show"><?php echo $phonee;?></span> -->
  </div>

  
  <button type="submit" name="submit"  style="background-color:rgb(51, 51, 255)" class="btn btn-primary  w3-right">Edit</button>
     
  
  <!-- <button class="btn btn-secondary"  style="background-color:rgb(51, 51, 255)">Update</button> -->
      
        <a href="profile.php" class="btn btn-primary" data-dismiss="modal">Close</a><br>
					</form>
    <!-- </div> -->
      </div>
    
    </div>
  </div>
</div>
</div>


				<?php endwhile; ?>
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

</body>
</html>