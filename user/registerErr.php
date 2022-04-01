
<?php

include 'config.php';

$nameErr = $lnameErr = $unameErr = $emailErr = $genderErr = $addErr = $passErr= $cpassErr=$phonee="";
$name = $lname = $uname = $email = $gender = $add  = $pass= $gender =$phone="";


$error=false;    

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

    
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

          $check=$conn->query("SELECT dphone FROM dproject WHERE dphone='$phone'");
          if ($check->num_rows>0) {
            $phonee = "This Phone number has already been used ";
            $error=true;
            $phone = clean($_POST["phone"]);
          }
          
         
        }


    if (empty($_POST["name"])) {
        $nameErr = "First name is required!";
        $error=true;
      } else {
        $name = clean($_POST["name"]);
          
      }

    if (empty($_POST["lname"])) {
      $error=true;
      $lnameErr = "Last name is required!";
      } else {
        $lname = clean($_POST["lname"]);
        
      }


      if (empty($_POST["email"])) {
       $emailErr = "Email is required";
       $error=true;
      } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $error=true;
      }else{
        $email = clean($_POST["email"]);
        $check=$conn->query("SELECT demail FROM dproject WHERE demail='$email'");
        if ($check->num_rows>0) {
          $emailErr = "This Email has already been used";
          $error=true;
          $email = clean($_POST["email"]);

        }
        
      }

      if (empty($_POST["add"])) {
       $addErr = "Adress is required!";
       $error=true; 
      } else {
        $add = clean($_POST["add"]);
             
      }

      if (empty($_POST["pass"])) {
        $passErr = "Password is required!";
        $error=true; 
       }elseif (strlen($_POST['pass'])<6) {
            $passErr = "Your Password is too short";
            $error=true;   
        }elseif($_POST["pass"]!=$_POST["cpass"]){
         $cpassErr = "Passwords do not match";
        $error=true;
      } else {
        $pass = clean($_POST["pass"]);

      };
  

  $gender=$_POST["gender"];


};

$status1=$status2="";



if ($error==false && isset($_POST["submit"]) ) {
  
$userid=rand(10,99876543210);
$pass=md5($pass);



$sql=$conn->query("INSERT INTO dproject SET userid='$userid', dname='$name', dlname='$lname',dphone='$phone', 
demail='$email', dadd='$add' ,dpass='$pass', dgender='$gender' ");

$row = $check->fetch_assoc();



  

$_SESSION['success']= true;


$_SESSION['last']=$lname;
$_SESSION['number']=$phone;
$_SESSION['state']=$state1;
$_SESSION['email']=$email;
$_SESSION['Gender']=$gender;
$_SESSION['name']=$name;
$_SESSION['userid']=$userid;

header('Location:cart.php');


// header('Location:login.php');





if ($sql) {
 $status1="success";
}
else {
  $status2="failed";
  
}
};


  ?>