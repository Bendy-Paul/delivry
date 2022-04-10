<?php
include 'header.php';

$error=false;

$phonee=$adressE=$cityE=$stateE=$zip_codeE="";



// OFFICE VALIDATION
if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

  
    if (strlen($_POST['contact'])<1) {
        $phonee = "contact Number Required";
        $error=true;
        } elseif (strlen($_POST['contact'])>12) {
            $phonee = " Contact Number is too long";
            $error=true;  
        } elseif (strlen($_POST['contact'])<10) {
            $phonee = " Contact Number is too long";
            $error=true;
        }else {
          $contact = clean($_POST["contact"]);

          $check=$conn->query("SELECT * FROM office_branch WHERE contact='$contact'");
          if ($check->num_rows>0) {
            $phonee = " Contact number already used By another Branch";
            $error=true;
            $contact = clean($_POST["contact"]);
          }
        }

          // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


    if (strlen($_POST['adress'])<1) {
         $adressE = "Adress is too short to be Registererd";
        $error=true;
    }else {
            $adress = clean($_POST["adress"]);
            $check=$conn->query("SELECT * FROM office_branch WHERE office_address='$adress'");
            if ($check->num_rows>0) {
              $adressE = " This Adress Has already been registered ";
              $error=true;
            }else {
              $adress = ucwords(clean($_POST["adress"]));
            }
          }

            // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


    if (strlen($_POST['city'])<3) {
            $cityE = "City Name is too short to be registered";
            $error=true;
    }else {
        $city = clean($_POST["city"]);
        $city =  strtolower($city);
        $city =str_replace(' ','-',$_POST["city"]);
        $city = ucwords($city);


    }

      // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


    if (strlen($_POST['state'])<3) {
        $stateE = "State Name is too short to be registered";
        $error=true;
    }else {
      $state= $_POST['state'];
      $state = strtolower($state);
      $state = str_replace('state','',$state);
      $state = ucwords($state);
      $state = clean($state);
      $state = str_replace(' ','-',$state);
    }

      // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


      $zip_code=rand(1,9000000);

      // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


}

// END OF OFFICE VALIDATION


if ($error==false && isset($_POST["submit"]) ) {

  
  
    // $zip_code=rand(11111,99999999989);
  
  
    $sql=$conn->query("INSERT INTO office_branch SET branch_code='$zip_code', office_address='$adress', city='$city', dstate='$state', contact='$contact';");
    
    $row = $check->fetch_assoc();
    
   
    if ($sql) {
     $status1="success";
    }
    else {
      $status2="failed";
      
    }
    };

?>