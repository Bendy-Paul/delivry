<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--     
</body>
</html> -->

<?php
 include 'header.php';

include 'updatepackageprocess.php';

$number=$_GET['tracking_number'];

$all=$conn->query("SELECT * FROM d_orders WHERE tracking_number='$number'");

$pack=$all->fetch_assoc();

// print_r($pack);

?>



<style>
  

  .form{
    background-color:white;
    border-radius: 2%;
    /* width:98%; */
    /* border:2px,solid; */
    /* border-style: double;*/
}  
    .form-control{
      /* border-radius: 5px; */
      border: 1px solid indigo;
       width: 100%;
       /* color:rgb(141, 232, 235);; */
    }

@media (max-width: 1000px) {
     body{
     background-color:white;
    }
    
  }

  a{
    color:rgb(11, 147, 226);
  }

         
  @media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;margin-right:0px;
    }
}


</style>



<body class="main w3-light-grey">
<br><br>
<!-- BEGINING OF FORM -->
			<form action="" class="form w3-card-4 w3-white" id="manage-parcel" method="post" style="width:98%;margin:auto;padding:12px">

      <input type="hidden" name="stat" value="<?php echo $pack['item_status']?>">

       <h2 class="w3-center">Update Package</h2><br>
        <div class="row">
                  <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

          <div class="col-sm-6 ">
              <b>Sender Information</b>
              <div class="form-group">
                <label for="" class="control-label ">Name</label>
                <input type="text" name="sender_name" id="" class="form-control " value="<?php echo $pack['sender_name']; ?>" disabled >
              </div>
                      <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="ggggadd" id="" class="form-control" value="<?php echo $pack['sender_address']  ?>" disabled>
              </div>
                      <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="sender_contact" id="" class="form-control" value="<?php echo $pack['sender_number'] ?>" disabled>
              </div>
                      <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

          </div>
          <div class="col-sm-6 ">
              <b>Recipient Information</b>
                      <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="name" id="" class="form-control" value="<?php echo $pack['reciver_name'] ?>" >
                <span class="w3-text-red"><?php echo $nameErr ?></span>
              </div>
                      <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="add" id="" class="form-control" value="<?php echo $pack['reciver_address'] ?>" >
                <span class="w3-text-red"><?php echo $addErr ?></span>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="phone" id="" class="form-control" value="<?php echo $pack['reciver_number'] ?>" >
                <span class="w3-text-red"><?php echo $phonee ?></span>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

                <input type="hidden" name="id" id="" class="form-control " value="<?php echo $pack['tracking_number']; ?>">


              </div>
          </div>
        </div>
        <hr>
        <div class="row" style="margin:auto">
          <div class="col-sm-6 ">
            
          <h3 class="w3-center" style="margin:auto">Delivery Information</h3><br>
<!-- <hr> -->
        <hr>
            <div class="form-group">
           

            </div> 
          </div>
          <div class="col-sm-6 " id="">
          <?php if ($pack['item_status'] == 1){ ?>
            <div class="form-group" id="tbi-field">
              <label for="" class="control-label">Reciver Branch</label>
              <select name="from" id="from" class="form-control select2">

              <option value="<?php echo $pack['sending_branch']  ?>" class=" btn btn-secondary"><?php echo $pack['sending_branch']  ?></option>
        <?php
        $qry = $conn->query("SELECT * FROM office_branch;");
            while($row= $qry->fetch_assoc()){
        ?> 
<option><?php echo $row['branch_code']." , ". $row['office_address']." , ".$row['city']." , ".$row['dstate']." state ";?></option>
	        <?php
        };
        ?>                
              </select>
              <?php 
          }else {
          ?>
              <div class="form-group" id="fbi-field">
                <label for="" class="control-label">Branch Sent from</label>
             <input type="text" name="" class="form-control" value="<?php echo $pack['sending_branch'] ?>" disabled>
<?php }
?>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              <input type="hidden" name="from_branch_id" value="">
              <br>




 <?php if ($pack['item_status'] == 1){ ?>

            <div class="form-group" id="tbi-field">
              <label for="" class="control-label">Pickup Branch</label>
              <select name="to" id="to" class="form-control select2">

              <option value="<?php echo $pack['reciving_branch'] ?>" class=" btn btn-secondary"><?php echo $pack['reciving_branch'] ?></option> 



                    <?php
              
        $qry = $conn->query("SELECT * FROM office_branch;");
            while($row= $qry->fetch_assoc()){
        ?> 
<option><?php echo $row['branch_code']." , ". $row['office_address']." , ".$row['city']." , ".$row['dstate']." state ";?></option>
	        <?php
        };
        ?>                
              </select>

<?php



            }else {
          ?>
              <div class="form-group" id="fbi-field">
                <label for="" class="control-label">Branch Sent to</label>
             <input type="text" name="" class="form-control" value="<?php echo $pack['reciving_branch'] ?>" disabled>
<?php }
?>
                      <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              <br>






              <?php
              if ($pack['item_status'] != 1) {
                $tstate=$pack['reciving_branch_state'];

                ?>

<div class="form-group" id="tbi-field">
              <label for="" class="control-label">Item Driver</label>
              <select name="driver" id="driver" class="form-control select2">
                <option value="<?php echo $pack['delivery_truck_number'] ?>"><?php echo $pack['delivery_truck_number']?></option>
        <?php
        $qry = $conn->query("SELECT * FROM delivery_trucks WHERE carperformance='Good'	AND 	driverid!='Not Assigned' AND delivery_state='$tstate' AND driver_office_branch_id='".$pack['sending_branch_state']."' ;");
            while($driver= $qry->fetch_assoc()){
        ?>
<option><?php echo $driver['driverid'] .",".$driver['cardriver']." | ". $driver['carbrand'].",". $driver['carmodel'].",".$driver['dcar_id'];?></option>
	        <?php
        };
        ?>    
                <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
            
              </select>
              <span class="w3-text-red"><?php echo $statusE ?></span>

                <?php
              }
              
              ?>


      </div>


</div>
<br>
</div>


</div>

          <br>
          <h3 class="w3-center" style="margin:auto">Parcel Information</h3><br>
<!-- <hr> -->
        <hr>
        <div class="row w3-center"style="width:100%"> 
        <br><br><br><br>

        <div class="col-sm-3">
              <b>Item Weight</b>
                       <div class="form-group">
                <input type="text" name="weight" id="" class="form-control" value="<?php echo $pack['item_weight'] ?>" >
<i><small>weight is measured in grams</small></i>    
            </div>
</div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

        <div class="col-sm-3">
              <b>Item height</b>
              <div class="form-group">
              <input type="text" name="height" id="" class="form-control" value="<?php echo $pack['item_height'] ?>" >
              <i><small>height is measured in centimeters</small></i>
            </div>
</div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

        <div class="col-sm-3">
              <b>Item Width</b>

              <div class="form-group">
              <input type="text" name="width" id="" class="form-control" value="<?php echo $pack['item_width'] ?>" >
            <i><small>Width is measured in centimeters</small></i>
            </div>
</div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


        <div class="col-sm-3">
              <b>Item Price</b>
                       <div class="form-group">
                <input type="number" name="price" id="fname" class="form-control" value="<?php echo $pack['item_price'] ?>" >
            <i><small>Price is measured in Naira</small></i>
            </div>
</div>

        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


        </div>


</div>
<br>
<!-- <h4 class="total" >Price: <span id="total"><?php echo $pack['item_price'] ?></span></h4> -->

<button class="btn btn-primary" type="submit" name="submit">Update Package</button>
</form>

<?php 
// echo $_POST['packagestatus'];
 ?>
