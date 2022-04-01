<?php
include 'config.php';
($_SESSION['userregister']!= true) ? header("location:login.php"):'';

include 'header.php';

$adminid=$_SESSION['userid'];

$email=$_SESSION['email'];
// ($_SESSION['userregister']!= true) ? header("location:login.php"):'';

$see=$conn->query("SELECT * FROM dproject WHERE userid='$adminid';");
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

          $check=$conn->query("SELECT * FROM dproject WHERE dphone='$phone'");
          if ($check->num_rows>0 && $phone!=$_SESSION['number']) {
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
        $check=$conn->query("SELECT * FROM dproject WHERE demail='$email'");
        if ($check->num_rows>0 && $email!=$_SESSION['email']) {
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

    
$send=$_SESSION['number'];
$sql2=$conn->query("UPDATE item_status SET sender_number='$phone' WHERE sender_number=$send;");


$sql2=$conn->query("UPDATE d_orders SET sender_number='$phone',sender_address='$state' WHERE sender_number=$send ;");



$sql=$conn->query("UPDATE dproject SET dphone='$phone', demail='$email', dpass='$pass', dadd='$state' WHERE userid='$adminid';");


  
						
if ($sql) {
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
	  <p>Admin profile Has Been updated successfully</p>
	</div>
	  <a href="viewstaff.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
  </div>
</div>
</div>
<div class="modal-backdrop fade show"></div>
<?php
 ;


//hp


$check=$conn->query("SELECT * FROM dproject WHERE userid='$adminid'");
if ($check->num_rows>0) {
   
   
    
$admin = $check->fetch_assoc();
$_SESSION['address']=$admin['dadd'];
$_SESSION['last']=$admin['dlname'];
$_SESSION['number']=$admin['dphone'];
$_SESSION['email']=$admin['demail'];
$_SESSION['Gender']=$admin['dgender'];
$_SESSION['name']=$admin['dname'];
$_SESSION['userid']=$admin['userid'];
// $_SESSION['date']=$admin['ddatesign'];
// $_SESSION['dob']=$admin['ddob'];

   

}

}
}
?>


<?php

?>