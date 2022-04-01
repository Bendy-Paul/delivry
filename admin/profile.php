<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

include 'header.php';

$adminid=$_SESSION['adminid'];

$adminemail=$_SESSION['ademail'];

$see=$conn->query("SELECT * FROM dadmin WHERE demail='$adminemail';");
$admin = $see->fetch_assoc();



$password=$admin['dpass'];
$error=false;



$nameErr = $lnameErr = $unameErr = $stateE=$opass=$emailErr = $genderErr = $addErr = $passErr= $cpassErr=$phonee="";
$name = $lname = $uname = $email = $state1=$gender = $branch  = $pass= $gender =$phone="";


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

    
  if (strlen($_POST['phone'])<1||strlen($_POST['phone'])>12||strlen($_POST['phone'])<10) {
      $phonee = "Invalid Number Length <br>";
      $error=true;
     
      }else {
        $phone = clean($_POST["phone"]);

        $check=$conn->query("SELECT * FROM dadmin WHERE dphone='$phone'");
        if ($check->num_rows>0 && $phone!=$_SESSION['adnumber']) {
          $phonee = " Phone number already used By another Admin <br>";
          $error=true;
          
                  $phone = clean($_POST["phone"]);          }          

        
      }



    if (empty($_POST["email"])) { 
        $error=true;
       $emailErr = "Email is required <br>";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format <br>";
      $error=true;
    
    }else{
      $email = clean($_POST["email"]);
      $check=$conn->query("SELECT * FROM dadmin WHERE demail='$email'");
      if ($check->num_rows>0 && $email!=$_SESSION['ademail']) {
        $emailErr = "Email already used by another admin <br>";
        $error=true;

        $email = clean($_POST["email"]);

      }
      
    }

    if (empty($_POST["pass"])) {
      $pass = $password;
      // $error=true; 
     }elseif (strlen($_POST['pass'])<6) {
          $passErr = "Your Password is too short <br>";
          $error=true;   
      }elseif($_POST["pass"]!=$_POST["cpass"]){
       $cpassErr = "Passwords do not match <br>";
      $error=true;
      
    } else {
      $pass = md5(clean($_POST["pass"]));

    };


$opass=md5($_POST["opass"]);
if ($opass!=$password) {
$error=true;
$passErr="Incorect password <br>";
}else{
$opass=md5($_POST["opass"]);
}




if (strlen($_POST['state'])<3) {
$stateE = "State Name is too short to be registered <br> ";
$error=true;
}else {
  $state = $_POST["state"];
  $state = clean(strtolower($state));
  $state = str_replace('state','',$state);
  $state = ucwords($state);
}





if ($error == true){
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
      <p> <?php echo $phonee .$stateE .  $passErr. $cpassErr.$emailErr ;?></p>
    </div>
      <a href="profile.php" style="width:70%;margin:auto" class="btn btn-danger" data-dismiss="modal">Close</a><br>
    </div>
  </div>
  </div>
  <div class="modal-backdrop fade show"></div>
<?php
}

}


if ($error==false && isset($_POST["submit"])&& $opass==$password ) {


$sql=$conn->query("UPDATE dadmin SET dphone='$phone', demail='$email', dpass='$pass', dstate='$state' WHERE demail='$adminemail';");


  
						
if ($sql) {
	?>


<div class="modal show" tabindex="1"  data-aos="zoom-in" data-aos-delay="100"style="display:block"  data-aos="fade-down">
<div class="modal-dialog">
  <div class="modal-content">
	<div class="modal-header">
	  <h5 class="modal-title"></h5>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<div class="modal-body">
	  <p>Admin profile Has Been updated successfully</p>
	</div>
	  <a href="profile.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
  </div>
</div>
</div>
<div class="modal-backdrop fade show"></div>
<?php
} ;
}

//hp


$check=$conn->query("SELECT * FROM dadmin WHERE userid='$adminid'");
if ($check->num_rows>0) {
   
   
    
$admin = $check->fetch_assoc();

$_SESSION['adlast']=$admin['dlname'];
$_SESSION['adnumber']=$admin['dphone'];
$_SESSION['adstate']=$admin['dstate'];
$_SESSION['ademail']=$admin['demail'];
$_SESSION['adGender']=$admin['dgender'];
$_SESSION['adname']=$admin['dname'];
$_SESSION['adminid']=$admin['userid'];
$_SESSION['date']=$admin['ddatesign'];
$_SESSION['dob']=$admin['ddob'];

   

}



?>
<style>
    .btm{
        /* min-width:18%; */
        margin:auto;
    }

    
    @media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;margin-right:0px;
    }
}

</style>
<body class="main" class="w3-light-grey">


     <!-- Left Column -->
     <div class=""><br><br>
    
    <div class="w3-white w3-text-grey w3-card-4">
      <div class="w3-display-container">
        <img src="../delivery23.jpg" style="width:100%" alt="Avatar">
        <div class="w3-display-bottomleft w3-container w3-text-indigo">
          <h2><?php echo $_SESSION['adname']." ".$_SESSION['adlast']?></h2>
        </div>
      </div>
      <div class="w3-container">
     
      <br>
        <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-indigo"></i>Admin</p>
        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-indigo"></i><?php echo $_SESSION['adstate']?></p>
        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-indigo"></i><?php echo $_SESSION['ademail']?></p>
        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-indigo"></i><?php echo $_SESSION['adnumber']?></p>
        <p><i class="fa  fa-calendar-alt fa-fw w3-margin-right w3-large w3-text-indigo"></i>  <?php
                        $d=strtotime($_SESSION['date']);
                        echo date("l F d Y", $d);
                        ?></p>
        <p><i class="fa fa-baby fa-fw w3-margin-right w3-large w3-text-indigo"></i><?php
                        $d=strtotime($_SESSION['dob']);
                        echo date("l F d Y", $d);
                        ?></p>
        <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-indigo"></i><?php echo $_SESSION['adminid']?></p>
        <br><br>

        <div class="row btn-group" style="width:100%; margin:auto;">
             <button  class="col-sm-4 btn btn-danger btn-flat btm"  data-toggle="modal" data-target="#logout">Logout</button>
             <button data-toggle="modal" data-target="#edit" href="updateadmin.php" class="col-sm-4 btn btn-primary btn-flat btm">Edit profile</button>
             <button  class="col-sm-4 btn btn-warning btn-flat btm" data-toggle="modal" data-target="#sure">Delete account</button>
        </div>

<br><br>

<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Are you sure you want to Logout</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
        <a href="logouta.php" name="unassign" type="buton" class="btn btn-danger"> <i class="fas fa-check"></i> </a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <form class="container form" method="POST"  action="#">
    <br><br>
   <div class="row">
   <div class="form-group column col-6">
    <label for="text">Firstname:</label>
    <input type="text" class="form-control" id="text" placeholder="Eg.Paul" name="name" value="<?php echo $_SESSION['adname']?>" disabled>
    <!-- <span class="text-danger fade show"><?php echo $password?></span> -->
  </div>

    <div class="form-group column col-6">
    <label for="text">Lastname:</label>
    <input type="text" class="form-control" id="text" name="lname" value="<?php echo $_SESSION['adlast']?>" disabled>
    <span class="text-danger fade show"><?php echo $lnameErr;?></span>
  </div>
   </div>

  <div class="form-group">
    <label for="pwd">Phone Number:</label>
    <input type="text" class="form-control" id="pwd" value="<?php echo $_SESSION['adnumber']?>" name="phone">
    <span class="text-danger fade show"><?php echo $phonee;?></span>
  </div>

  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['ademail']?>" name="email">
    <span class="text-danger fade show"><?php echo $emailErr;?></span>
  </div>

  <div class="form-group">
    <label for="state">Office State</label>
     <input type="teet" value="<?php echo $_SESSION['adstate'] ;?>" id="" name="state" class="form-control">
     <span class="text-danger fade show"><?php echo $stateE;?></span>

  </div>

   
  <br>

  
  
<div class="row">

      
  <div class="form-group column col-sm-6">
    <label for="pwd ">New Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
    <span class="text-danger "></span>
  </div>
  
  <div class="form-group column col-sm-6">
    <label for="pwd">Confirm New Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Please confirm password"name="cpass">
    <span class="text-danger fade show"><?php echo $cpassErr;?></span>
  </div>
  <br>
  <br>

  <i style="font-size:12px">leave empty if you dont want to edit Password</i>

  <br>
  <br>

<div class="form-group column col-sm-12">
    <label for="pwd">Confirm Current Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Please confirm password"name="opass">
    <span class="text-danger fade show"><?php echo $cpassErr;?></span>
    <i style="font-size:12px">Confirm current password to save profile changes</i>

  </div>
  </div>

  <button type="submit" name="submit"  style="background-color:rgb(51, 51, 255)" class="btn btn-primary  w3-right">Edit</button>
     
  
  <!-- <button class="btn btn-secondary"  style="background-color:rgb(51, 51, 255)">Update</button> -->
      
        <a href="profile.php" class="btn btn-primary" data-dismiss="modal">Close</a><br>
        </div>
    </div>
  </div>
</div>


        <br>


        <div class="modal fade" id="sure" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
Are You Sure You Want to Delete Your Account you Will Not Be Able To Acsess It again</div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
        <a href="delete.php" class="btn btn-danger"> <i class="fas fa-check"></i> </a>
      </div>
    </div>
  </div>
</div>
<!--       
        <hr>

        <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
        <p>Adobe Photoshop</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div>
        </div>
        <p>Photography</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
            <div class="w3-center w3-text-white">80%</div>
          </div>
        </div>
        <p>Illustrator</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>
        </div>
        <p>Media</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">50%</div>-->
          </div>
          </div>
          </div>



        <br> 
</body>

<script>
    
    
var d = new Date("<?php echo $_SESSION['date']?> ");
document.getElementById("demo").innerHTML = d.toDateString();


var e = new Date("<?php echo $_SESSION['dob']?> ");
document.getElementById("emo").innerHTML = e.toDateString();
</script>

</script>
</html>