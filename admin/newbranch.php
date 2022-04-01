<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
//  include 'header.php';

include 'branchvalidation.php';
?>    


<style>
   /* admin@admin.com */

   
   #form{
    background-color: white;
    /* width: 50%; */
    /* border-style: groove; */
    border-radius: 1%;
    /* border: 5px solid rgb(11, 147, 226); */
}
#main{
        margin-left:310px;margin-right:20px;
       } 

       
      @media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;margin-right:0px;
    }
}


.form-control{
      /* border-radius: 5px; */
      border: 3px solid rgb(11, 147, 226);
       width: 100%;
       /* color:rgb(141, 232, 235);; */
    }
</style>


<body class="main" class="w3-light-grey">



<br><br><br>



<h2 style="text-align:center">New Office Location</h2>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">

    <!-- OFFICE LOCATION FORM -->
			<form action="" id="form" method="POST">
        <div class="row">
          <div class="col-md-12">
            <div id="msg" class=""></div>

            <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Office Address</label>
                <textarea name="adress" id="" cols="30" rows="1" class="form-control"><?php echo isset($adress) ? $adress : '' ?></textarea>
                <p class=w3-text-red><?php echo $adressE ?></p>
              </div>

              <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Office City</label>
                <textarea name="city" id="" cols="30" rows="1" class="form-control"><?php echo isset($city) ? $city : '' ?></textarea>
                <p class=w3-text-red><?php echo $cityE ?></p>
                
              </div>
            </div>
              <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->



            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Office State</label>
                <textarea name="state" id="" cols="30" rows="1" class="form-control"><?php echo isset($state) ? $state : '' ?></textarea>
                <p class=w3-text-red><?php echo $stateE ?></p>

              <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


              </div>
            
              <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Contact #</label>
                <input type="tell" name="contact" class="form-control"></input>
                <p class=w3-text-red><?php echo $phonee ?></p>
                
              </div>

              <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

            </div>

          </div>
        </div>

        <div class="card-footer border-top border-info w3-blue ">
  		<div class="d-flex w-100 justify-content-center align-items-center">
        <!-- CANCEL BUTTON -->
  			<a class="btn btn-flat bg-gradient-secondary mx-1 w3-text-white" href="viewoffice.php">Cancel</a>
        <!-- SAVE NUTTON -->
        <button class="btn btn-flat  bg-gradient-primary mx-2 w3-text-white" name="submit">Save</button>
      </div>
  	</div>
      </form>
  	</div>
  
	</div>
</div>

</body>
</html>