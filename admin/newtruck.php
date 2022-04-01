<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include 'header.php';

include 'vehicleregistration.php';
?>

<style>
  
         
  @media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;margin-right:0px;
         margin-top:80px;
    }
}
</style>

<body class="main" class="w3-light-grey">
    


<h2 style="text-align:center">Vechicle Registration</h2>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="form" method="POST">
        <div class="row">
          <div class="col-md-12">
            <div id="msg" class=""></div>
<!-- STARTAGE OF FORM -->
            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Car Brand</label>
                <input type="text" name="brand" id="" cols="30" rows="1" class="form-control"><?php echo isset($adress) ? $adress : '' ?></input>
                <p class=w3-text-red><?php echo $brandE ?></p>
              </div>
                      <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Plate Number</label>
                <input type="text" name="plate_number" id="" cols="30" rows="1" class="form-control"><?php echo isset($city) ? $city : '' ?></input>
                <p class=w3-text-red><?php echo $plateE ?></p>
                        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Car Model</label>
                <input type="text" name="car_model" id="" cols="30" rows="1" class="form-control"><?php echo isset($state) ? $state : '' ?></input>
                <p class=w3-text-red><?php echo $modelE ?></p>
</div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


                <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Delivery State</label>
                <select name="state" id="" class="form-control">


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
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              </div>
            <!-- </div> -->

            </div>

          </div>
        </div>

        <div class="card-footer border-top border-info w3-blue ">
  		<div class="d-flex w-100 justify-content-center align-items-center">
        <!-- CANCEL BUTTON -->
  			<a class="btn btn-flat bg-gradient-secondary mx-1 w3-text-white" href="viewvehicles.php">Cancel</a>
        <!-- SAVE BUTTON -->
        <button class="btn btn-flat  bg-gradient-primary mx-2 w3-text-white" name="save">Save</button>
      </div>
  	</div>
      </form>
  	</div>
  
	</div>
</div>


</body>
</html>