<?php
// include 'config.php';

include 'header.php';

$adminid=$_SESSION['staffid'];

$email=$_SESSION['staffemail'];
// ($_SESSION['userregister']!= true) ? header("location:login.php"):'';

$see=$conn->query("SELECT * FROM dstaff WHERE dstaffid='".$adminid."';");
$admin = $see->fetch_assoc();



$password=$admin['dstaffid'];
$error=false;



$nameErr = $lnameErr = $unameErr = $stateE=$opass=$emailErr = $genderErr = $addErr = $passErr= $cpassErr=$phonee="";
$name = $lname = $uname = $email = $state1=$gender = $branch  = $pass= $gender =$phone="";


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

    
    if (strlen($_POST['phone'])<1||strlen($_POST['phone'])>12||strlen($_POST['phone'])<10) {
        $phonee = "Invalid Number Length <br>";
        $error=true;
       
        }else {
          $phone = clean($_POST["phone"]);

          $check=$conn->query("SELECT * FROM dstaff WHERE dphone='$phone'");
          if ($check->num_rows>0 && $phone!=$_SESSION['staffnumber']) {
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
        $check=$conn->query("SELECT * FROM dstaff WHERE demail='$email'");
        if ($check->num_rows>0 && $email!=$_SESSION['staffemail']) {
          $emailErr = "Email already used by another admin <br>";
          $error=true;

          $email = clean($_POST["email"]);

        }
        
      }

      $opass=$_POST["opass"];

      if ($opass!=$_SESSION['staffid']) {
        $error=true;
      $passErr="Incorect password <br>";
      }else{
      $opass=$_POST["opass"];
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
        <a href="staffprofile.php" style="width:70%;margin:auto" class="btn btn-danger" data-dismiss="modal">Close</a><br>
      </div>
    </div>
    </div>
    <div class="modal-backdrop fade show"></div>
<?php
}

}









if ($error==false && isset($_POST["submit"]) && $opass==$password ) {

    

$sql=$conn->query("UPDATE dstaff SET dphone='$phone', demail='$email' WHERE dstaffid='".$_SESSION['staffid']."';");


  
						
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
	  <a href="staffprofile.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
  </div>
</div>
</div>
<div class="modal-backdrop fade show"></div>
<?php
 ;


//hp


$check=$conn->query("SELECT * FROM dstaff WHERE dstaffid='".$_SESSION['staffid']."'");
if ($check->num_rows>0) {
   
   
    
$admin = $check->fetch_assoc();                       
$_SESSION['staffname']=$admin['dfname'];
$_SESSION['stafflast']=$admin['dlname'];
$_SESSION['staffnumber']=$admin['dphone'];
$_SESSION['staffstate']=$admin['dstate'];
$_SESSION['staffemail']=$admin['demail'];
$_SESSION['staffGender']=$admin['dgender'];
$_SESSION['staffid']=$admin['dstaffid'];
$_SESSION['staffdate']=$admin['ddatesign'];
$_SESSION['staffstatus']=$admin['dstatus'];
$_SESSION['staffoffice']=$admin['dbranch'];

// $_SESSION['date']=$admin['ddatesign'];
// $_SESSION['dob']=$admin['ddob'];

   

}

}
}
?>


<?php

?>