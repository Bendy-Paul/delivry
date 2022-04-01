<?php
include 'header.php';

$getall=$_GET['staffvalue'];

$collect = $conn->query("SELECT * FROM dstaff WHERE dstaffid=$getall ORDER BY dstate ASC; ");
		$row= $collect->fetch_assoc();

		$office = $conn->query("SELECT * FROM office_branch ORDER BY dstate ASC ");
	// $off= $office->fetch_assoc();


						$nameErr = $lnameErr = $unameErr = $emailErr = $genderErr = $addErr = $passErr= $cpassErr=$phonee="";
						$name = $lname = $uname = $email = $code=$sity=$gender =$dstaffstate= $add  = $pass= $gender =$phone="";
						
						
						$error=false;    
						
						if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
						
							
							if (strlen($_POST['phone'])<1||strlen($_POST['phone'])>12||strlen($_POST['phone'])<10) {
								$phonee = "Invalid length for staff number";
								$error=true;
								}else {
								  $phone = clean($_POST["phone"]);
								  $check=$conn->query("SELECT dphone FROM dstaff WHERE dphone='$phone'");
								  if ($check->num_rows>0&&$phone!=$row['dphone']) {
									$phonee = "This Phone number has already been used ";
									$error=true;
									$phone = clean($_POST["phone"]);
								  }
								  
								 
								}
						        // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

						
						
							  if (empty($_POST["email"])) {
							   $emailErr = "Email is required";
							   $error=true;
							  } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
								$emailErr = "Invalid email format";
								$error=true;
							  }else{
								$email = clean($_POST["email"]);
								$check=$conn->query("SELECT demail FROM dstaff WHERE demail='$email'");
								if ($check->num_rows>0 && $email!= $row['demail']) {
								  $emailErr = "This Email has already been used";
								  $error=true;
								  $email = clean($_POST["email"]);
						
								}
								
							  }
						
							  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

							  
						 
							 $branch=$_POST["staffbranch"];
						 	 $exp=explode(" , ",$branch);
						  	 $branchr=$exp[3];
							   $branch=str_replace("$branchr","",$branch);
							//    $branch=str_replace(',','',$branch);
							   $branch=str_replace(" - ",", ",$branch);
							   $branch=str_replace(" -","",$branch);


							   $branchid=$_POST["staffbranch"];
							   $exp2=explode(" ,",$branchid);
								$brancht=$exp[3];
								
								$branchid=clean($brancht);
 
 
								// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

						// print_r($exp2);
						// echo $branchid;
						 

					 		$state=$_POST["staffbranch"];
							$ex=explode(",",$state);
							 $state=$ex[3];
							 $state=str_replace(" ","",$state);
							 $state=str_replace("state","",$state);
							 echo "<br>".$state;

						};
						
				        // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

						
						if ($error==false && isset($_POST["submit"]) ) {
						  	
							$sql2=$conn->query("UPDATE delivery_trucks SET driver_office_branch_id='$state'	WHERE driverid='$getall';");

						
							$sql=$conn->query("UPDATE dstaff SET dstate='$state',dphone='$phone', demail='$email',dbranch='$branch',branchid='$branchid' WHERE dstaffid=$getall;");
							
							};?>

						<!DOCTYPE html>
						<html lang="en">
						<head>
							<meta charset="UTF-8">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<title>Document</title>
						</head>

					
						
						
<style>
    
	h1{
		text-align:center;
		/* color:rgb(51, 51, 255); */
		/* text-shadow: 3px 2px rgb(11, 147, 226); */ 
	}
	
	   .form{
		background-color:white;
		border-radius: 2%;
		width:80%;
		border:2px,solid,red;
		/* border-style: double;*/
	}  
		.form-control{
		  /* border-radius: 5px; */
		  border: 2px solid indigo;
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
		#main{
			 margin-left:0px;margin-right:0px;
		}
	}
	
	</style>
	
	<body class="main">
	<form class="container form w3-card-3" method="POST"  action="" data-aos="fade-left">
		<h1>Update Staff Information</h1>
		<br><br><br>
		        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

		<div class="form-group">
		<label for="text">Firstname:</label>
		<input type="text" class="form-control" id="text" placeholder="Eg.Paul" name="name" value="<?php echo $row['dfname']?>" disabled>
		<span class="text-danger fade show"><?php echo $error;?></span>
	  </div>
	        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

		<div class="form-group">
		<label for="text">Lastname:</label>
		<input type="text" class="form-control" id="text" placeholder="Eg.John" name="lname" value="<?php echo $row['dlname']?>" disabled>
		<span class="text-danger fade show"><?php echo $lnameErr;?></span>
	  </div>
	        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

	  <div class="form-group">
		<label for="pwd">Phone Number:</label>
		<input type="text" class="form-control" id="pwd" placeholder="Eg.11122233344" name="phone"  value="<?php echo $row['dphone']?>">
		<span class="text-danger fade show"><?php echo $phonee;?></span>
	  </div>
	        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

	  <div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" id="email" placeholder="Eg.example@exam.com" name="email" value="<?php echo $row['demail']?>">
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

		
		<span class="text-danger fade show"><?php echo $emailErr;?></span>
	  </div>
	        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

	
	
		<br>
	
		
	  <div class="form-group">
		<label for="text"  >Status:</label>
		<input id="text"  class="form-control" name="status"  value="<?php echo $row['dstatus']?>" disabled>
		</input>
	  </div>
	        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

	
	  
	
	  <div class="form-group">
		<label for="state">Office Branch</label>
		 <select class="form-control"  name="staffbranch" id="state" onclick="checkName()">
		   <?php
		  
		   // $staffstate;
		   $qry = $conn->query("SELECT * FROM office_branch ORDER BY dstate ASC ");
			   while($row= $qry->fetch_assoc()){
		   ?>
		  <option><?php echo $row['branch_code']." , ". $row['office_address']." , ".$row['city']." , ".$row['dstate']." state ";?></option>
			<?php
		   };
		   ?>
		 </select>
		 <?php
?>	

        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

	  </div>
	<br>
	        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

	  <button type="submit" style="float:right" class="btn btn-primary" name="submit" data-toggle="modal" data-target="#exampleModal">Submit</button> 
	          <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

	  <a href="viewstaff.php" style="float:left" type="submit" class="btn btn-danger" name="submit">Back</a>
	          <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

	  <br><br><br><br>
	  
	  <!-- <?php echo $dstaffstate;  ?> -->
	
	
	</form>
	
	<!-- <div class="error">kvjfvk</div> -->
	
	
	</body>
	</html>
	