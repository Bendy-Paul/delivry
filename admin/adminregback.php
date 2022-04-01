
<?php


include 'config.php';   

// $state=array("Abia", "Adamawa", "Akwa Ibom", "Anambara","Bauchi","Bayalsa","Benue","Bronue");


$nameErr = $lnameErr = $unameErr =$state1=$emailErr = $genderErr = $addErr = $passErr= $cpassErr=$phonee="";
$name = $lname = $uname = $email = $gender= $stateE = $branch  = $pass= $gender =$phone="";


$error=false;    


// FORM VALIDATION

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
    

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

          $check=$conn->query("SELECT dphone FROM dadmin WHERE dphone='$phone'");
          if ($check->num_rows>0) {
            $phonee = " Phone number already used By another Admin";
            $error=true;
            $phone = clean($_POST["phone"]);
          }
          
         
        }


          // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


    if (empty($_POST["name"])) {
        $nameErr = "First name is required!";
        $error=true;
      } else {
        $name = clean($_POST["name"]);
          
      }

        // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


    if (empty($_POST["lname"])) {
      $error=true;
      $lnameErr = "Last name is required!";
      } else {
        $lname = clean($_POST["lname"]);
        
      }

        // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&



      if (empty($_POST["email"])) {
       $emailErr = "Email is required";
       $error=true;
      } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $error=true;
      }else{
        $email = clean($_POST["email"]);
        $check=$conn->query("SELECT demail FROM dadmin WHERE demail='$email'");
        if ($check->num_rows>0) {
          $emailErr = "Email already used by another admin";
          $error=true;
        }
        $email = clean($_POST["email"]);
      }


  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


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
    // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


  $gender=$_POST["gender"];

    // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


  if (strlen($_POST['state'])<3) {
    $stateE = "State Name is too short to be registered";
    $error=true;
}else {
  $state1 = $_POST["state"];
  $state1 = clean(strtolower($state1));
  $state1 = str_replace('state','',$state1);
  $state1 = str_replace(' ','',$state1);
  $state1 = ucfirst($state1);
  
}
  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

$dob = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];

  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


$userid=rand(11111,9999999);
$check=$conn->query("SELECT * FROM dadmin WHERE userid='$userid'");
if ($check->num_rows>0) {
  $userid=rand(11111,9999999);
}
  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


}

// END OF FORM VALIDATION

if ($error==false && isset($_POST["submit"]) ) {
  
$pass=md5($pass);

$sql=$conn->query("INSERT INTO dadmin SET userid='$userid', dname='$name', dlname='$lname',dphone='$phone', demail='$email' ,dpass='$pass', dgender='$gender',dstate='$state1',ddob='$dob';");

$row = $check->fetch_assoc();

// header('Location:login.php');
$_SESSION['adlast']=$lname;
$_SESSION['adnumber']=$phone;
$_SESSION['adstate']=$state1;
$_SESSION['ademail']=$email;
$_SESSION['adGender']=$gender;
$_SESSION['adname']=$name;
$_SESSION['adminid']=$userid;
$_SESSION['dob']=$dob;
$_SESSION['date']=date("l F d Y");


$_SESSION['adminsuccess']= true;


header('Location:admin.php');


if ($sql) {
 $status1="success";
}
else {
  $status2="failed";
  
}
};