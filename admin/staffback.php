
<?php
include 'header.php';   

// ORDER BY DESC

// $state=array("Abia", "Adamawa", "Akwa Ibom", "Anambara","Bauchi","Bayalsa","Benue","Bronue");


$nameErr = $lnameErr = $unameErr = $emailErr = $genderErr = $addErr = $passErr= $cpassErr=$phonee="";
$name = $lname = $uname = $email = $gender = $add  = $pass= $gender =$phone="";


$error=false;    

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

    if (strlen($_POST['phone'])<1) {
        $phonee = "Phone Number Required";
        $error=true;
        } elseif (strlen($_POST['phone'])>12) {
            $phonee = "Your Phone Number is too long";
            $error=true;  
        } elseif (strlen($_POST['phone'])<10) {
            $phonee = "Your Phone Number is too long";
            $error=true;
        }else {
          $phone = clean($_POST["phone"]);

          $check=$conn->query("SELECT dphone FROM dstaff WHERE dphone='$phone'");
          if ($check->num_rows>0) {
            $phonee = "This Phone number has already been used ";
            $error=true;
            $phone = clean($_POST["phone"]);
          }
          
         
        }
        // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


    if (empty($_POST["name"])) {
        $nameErr = "First name is required!";
        $error=true;
      } else {
        $name = clean(ucfirst($_POST["name"]));
          
      }

      // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


    if (empty($_POST["lname"])) {
      $error=true;
      $lnameErr = "Last name is required!";
      } else {
        $lname = clean(ucfirst($_POST["lname"]));
        
      }

      // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

   
      $branchid=$_POST["staffbranch"];
      $ex=explode(",",$branchid);
       $branchid=$ex[0];
       $branchid=str_replace(" ","",$branchid);
       echo "<br>".$branchid;
      
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
        if ($check->num_rows>0) {
          $emailErr = "This Email has already been used";
          $error=true;
          $email = clean($_POST["email"]);

        }
        
      }

      // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


  $gender=ucfirst($_POST["gender"]);


  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
   
  $status=$_POST["status"];

  if ($_POST["staffbranch"]=="") {
    $error=true;
  }else {
    $branch=$_POST["staffbranch"];
  }

  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


};

$status1=$status2="";


      
$dstaffstate = $_GET['staffstate'];
$dstaffstate = clean(strtolower($dstaffstate));
$dstaffstate = str_replace('state','',$dstaffstate);
$dstaffstate = str_replace(' ','',$dstaffstate);
$state1 = ucwords($dstaffstate);

if ($error==false && isset($_POST["submit"]) ) {
  
$userid=rand(10,99876543210);
$pass=md5($pass);

// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

$sql=$conn->query("INSERT INTO dstaff SET dstaffid='$userid', dfname='$name',dstate='$state1', dlname='$lname',dphone='$phone', demail='$email', dgender='$gender',dstatus='$status',dbranch='$branch', branchid='$branchid';");


$_SESSION['staffid']=$userid;
$_SESSION['stafstatus']=$status;
?>
<br>
<br>
<br>
<div class="w3-container w3-green" data-aos="zoom-in">
  <h3>Success!</h3>
  <p>This Staff has successfully been registered<?php if ($status=="Driver") {
   ?> <a href="viewdrivers.php" class="w3-text-white">CLICK HERE</a> to assign this driver to a delivery truck</p><?php
  }?>

</div>
<br>
<br>
<br>
<?php
};?>