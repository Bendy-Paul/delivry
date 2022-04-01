<?php

// include 'newpackageprocess.php';

// echo $_SESSION['userlname'];

?>

<?php



include 'header.php';   

// $state=array("Abia", "Adamawa", "Akwa Ibom", "Anambara","Bauchi","Bayalsa","Benue","Bronue");


 
$senderphone=$sendername=$nameErr=$sendername =$sender_email= $lnameErr = $unameErr =$state1=$emailErr = $genderErr = $addErr = $passErr= $cpassErr=$phonee="";
$send_addErr=$send_nameErr=$send_phonee=$name = $lname = $uname = $userid=$phone=$namename =$senderphone =$senderadress =$add = $branchto=$branchfrom =$weight =$height =$width=$price  = $email = $gender= $stateE = $branch  = $pass= $gender =$phone="";

$gender="";

$error=false;    

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

// IF SENDER HAS AN ACCOUNT
  if($_GET['user'] == 'yes' ){


                      $senderphone=$_SESSION['userphone'];
                      $sendername=$_SESSION['userfname']." ".$_SESSION['userlname'];
                      $senderadress=$_SESSION['add'];
  // IF SENDER DOES NOT HAVE AN ACCOUNT
  } else{
                        
                    


                      if (strlen($_POST['sender_contact'])<1) {
                        $send_phonee = "Phone Number Required";
                        $error=true;
                        } elseif (strlen($_POST['sender_contact'])>12) {
                            $send_phonee = "Your Phone Number is too long";
                            $error=true;  
                        } elseif (strlen($_POST['sender_contact'])<10) {
                            $send_phonee = "Your Phone Number is too long";
                            $error=true;
                        }else {
                          $sender_phone = clean($_POST["sender_contact"]);
                
                          $check=$conn->query("SELECT * FROM dproject WHERE dphone='$sender_phone'");
                          if ($check->num_rows>0) {
                            $send_phonee = " Phone number already used By another Admin";
                            $error=true;
                          }
                          $senderphone = clean($_POST["sender_contact"]);
                        }

                         // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


                  if (empty($_POST["sender_name"])) {
                    $send_nameErr = "First name is reqired !";
                      $error=true;
                    } else {
                      $send_name=strtolower($_POST["sender_name"]);
                      $sendername =ucwords(clean($send_name)) ;
                        
                    }

                     // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

                    
                    if (empty($_POST["sender_address"])) {
                      $send_addErr = "Adress is reqired !";
                      $error=true; 
                    } else {
                      $send_add=strtolower($_POST["sender_address"]);
                      $senderadress=ucwords(clean($send_add)) ;
                            
                    }
                     // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


                    if (empty($_POST["sender_email"])) {
                      $emailErr = "Email is required";
                      $error=true;
                     } elseif (!filter_var($_POST["sender_email"], FILTER_VALIDATE_EMAIL)) {
                       $emailErr = "Invalid email format";
                       $error=true;
                     }else{
                       $email = clean($_POST["sender_email"]);
                       $check=$conn->query("SELECT * FROM dproject  WHERE demail='$email'");
                       if ($check->num_rows>0) {
                         $emailErr = "Email already used by another admin";
                         $error=true;
                       }
                       $email = clean($_POST["sender_email"]);
                     }

                      // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

               
$gender=$_POST["gender"];

                         // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  }

// PACKAGE RECIVER INFORMATION
    
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
          $phone=strtolower($_POST['phone']);
          $phone = ucwords(clean($phone));
        }


         // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


    if (empty($_POST["name"])) {
        $nameErr = "First name is reqired !";
        $error=true;
      } else {
        $name=strtolower($_POST["name"]);
        $name =ucwords(clean($name)) ;
          
      }

       // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

      
      $branchid=$_POST["to"];
      $ex=explode(",",$branchid);
       $branchid=$ex[0];
       $branchid=str_replace(" ","",$branchid);
       echo "<br>".$branchid;

        // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

       
      $fbranchid=$_SESSION['staffofficeid'];
     

        // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


        $fbranchstate= $_SESSION['staffstate'];
       

        // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


        $tobranchstate=$_POST["to"];
        $exts=explode(",",$tobranchstate);
         $tobranchstate=$exts[3];
         $tobranchstate = clean(strtolower($tobranchstate));
         $tobranchstate = str_replace('state','',$tobranchstate);
         $tobranchstate=str_replace(" ","",$tobranchstate);
         $tobranchstate=ucfirst($tobranchstate);
         echo "<br>".$tobranchstate;


       // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
     
      if (empty($_POST["add"])) {
        $addErr = "Adress is reqired !";
        $error=true; 
       } else {
         $add=strtolower($_POST["add"]);
         $add =ucwords(clean($add)) ;
              
       }

        // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

// PACKAGE INFORMATION

       if (strlen($_POST['pname'])<5||strlen($_POST['pname'])>70) {
        $packErr = "Package name is not valid !";
        $error=true; 
       } else {
         
        $pname=strtolower($_POST["pname"]);
         $pname =ucwords(clean($pname)) ;     
       }


      
$weight=$_POST['weight']  ;
$height=$_POST['height'] ; 
$width=$_POST['width'] ; 
$price=$_POST['price'] ; 


$qry = $conn->query("SELECT * FROM office_branch WHERE branch_code='".$_SESSION['staffofficeid']."'");
$row= $qry->fetch_assoc();

echo $_SESSION['staffofficeid'];

$branchfrom=$row['branch_code']." , ". $row['office_address']." , ".$row['city']." , ".$row['dstate']." state ";
 
$branchto=$_POST['to'];  


$userid=rand(11111111,9999999999999);
$check=$conn->query("SELECT * FROM d_orders WHERE tracking_number='$userid' ");
if ($check->num_rows>0) {
  $userid=rand(11111,9999999);
}
// END OF PACKAGE INFORMATION
};


if ($error==false AND isset($_POST['submit'])) {
  

$sql=$conn->query("INSERT INTO d_orders SET sending_branch_state='$fbranchstate', sending_branch_id='$fbranchid', tracking_number='$userid', package_name='$pname', sender_name='$sendername', sender_number='$senderphone',sender_address='$senderadress', reciver_name='$name' ,reciver_number='$phone', reciver_address='$add',item_status='2',reciving_branch='$branchto',sending_branch='$branchfrom',item_weight='$weight',item_height='$height',item_width='$width',item_price='$price',reciving_branch_id='$branchid', reciving_branch_state='$tobranchstate';");

$sql2=$conn->query("INSERT INTO item_status SET tracking_number='$userid', dstatus='2', sender_number='$senderphone' ;");

// THIS IS TO GIVe SENDER AN ACCOUNT IF HE DOES NOT HAVE ONE
$userlname=$userfname=$username="";
if ($_GET['user'] == 'yes' AND isset($_POST['submit'])) {
} else {

                      $username=explode(" ",$sendername);
                      $userfname=$username[0];
                      $userlname=clean($sendername);
                      $userlname=str_replace($userfname,'',$userlname);
                      $userlname=ucwords($userlname);


                      $userid=rand(11111111,9999999999999);
                      $check4=$conn->query("SELECT * FROM dproject WHERE userid='$userid' ");
                      if ($check4->num_rows>0) {
                        $userid=rand(11111,9999999);
                      }
                      
                    $phoner=md5($senderphone);

                    $sql=$conn->query("INSERT INTO dproject SET userid='$userid', dname='$userfname', dlname='$userlname',dphone='$senderphone', 
                    demail='$email', dgender='$gender', dadd='$senderadress', dpass='$phoner' ");

}

}; 





?>



<style>
  

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
  <br><br><br>
			<form action="" class="form" id="manage-parcel" method="post" style="width:70%;margin:auto;padding:12px">
       <h2 class="w3-center">Register New Package</h2><br><br>
        <div class="row">

        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


          <div class="col-sm-6 ">
              <b>Sender Information</b>
              <div class="form-group">
                <label for="" class="control-label ">Name</label>
                <!-- INPUT TO BE DISABLED IF SENDER HAS AN ACCOUNT -->
                <input type="text" name="sender_name" id="" class="form-control " value="<?php if ($_GET['user']=='yes') {
echo $_SESSION['userfname']." ".$_SESSION['userlname'] ; ?>" disabled <?php
                } else {
                 echo '"';

                }?>>
              <span class='w3-text-red'><?php echo $send_nameErr ?></span>

              </div>

        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


              <div class="form-group">
                <label for="" class="control-label">Address</label>
                                <!-- INPUT TO BE DISABLED IF SENDER HAS AN ACCOUNT -->
                <input type="text" name="sender_address" id="" class="form-control" value="<?php if ($_GET['user']=='yes') {
echo $_SESSION['add']; ?>" disabled <?php
                } else {
                 echo '"';
                 

                }?>>
                <span class='w3-text-red'><?php echo $send_addErr ?></span>
              </div>

        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                                <!-- INPUT TO BE DISABLED IF SENDER HAS AN ACCOUNT -->
                <input type="text" name="sender_contact" id="" class="form-control" value="<?php if ($_GET['user']=='yes') {
echo $_SESSION['userphone']; ?>" disabled <?php
                } else {
                 echo '"';
                }?>>
                <span class='w3-text-red'><?php echo $send_phonee ?></span>
              </div>
                      <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

<?php


                  // NOT TO SHOW AT ALL IF SENDER HAS AN ACCOUNT
if ($_GET['user']!=='yes') {
?>
<div class="form-group">
                <label for="" class="control-label">Email</label>
                <input type="text" name="sender_email" id="" class="form-control" value="" >
                <span class="w3-text-red"><?php echo $emailErr ?></span>
              </div>

                      <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


              <div class="form-group">
              <label for="" class="control-label">Gender</label>
              <select name="gender" class="form-control">
                <option>Male</option>
                <option>Female</option>
              </select>          
                </div>

              <?php
            }?>
          </div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

<!-- RECIVER INFORMATION -->
          <div class="col-sm-6 ">
              <b>Recipient Information</b>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="name" id="" class="form-control" value="" >
                <span class="w3-text-red"><?php echo $nameErr ?></span>
              </div>
                      <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="add" id="" class="form-control" value="" >
                <span class="w3-text-red"><?php echo $addErr ?></span>
                   <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="phone" id="" class="form-control" value="" >
                <span class="w3-text-red"><?php echo $phonee."  ".$error ?></span>
              </div>
          </div>
          <!-- END OF RECIVER INFORMATION -->
        </div>
        <hr>
        <div class="row" style="margin:auto">
          <div class="col-sm-6 ">
            <div class="form-group">
              <label for="dtype">Type</label>
              <input type="checkbox" name="type" id="dtype" <?php echo isset($type) && $type == 1 ? 'checked' : '' ?> data-bootstrap-switch data-toggle="toggle" data-on="Deliver" data-off="Pickup" class="switch-toggle status_chk" data-size="xs" data-offstyle="info" data-width="5rem" value="1">
              <small>Deliver = Deliver to Recipient Address</small>
              <small>, Pickup = Pickup to nearest Branch</small>
            </div>
          </div>
          <div class="col-sm-6 " id="">

            <!-- SELECT THE OFFICE THAT THE PACKAGE WAS REGISTERED -->

              <div class="form-group" id="fbi-field">
                <label for="" class="control-label">Branch Processed</label>
<input type="text" name="" value="<?php echo $_SESSION['staffoffice'] ?>" class="form-control" id="" disabled>
          
              <input type="hidden" name="from_branch_id" value="">


                          <!-- SELECT THE OFFICE THAT THE PACKAGE WILL BE PICKED-UP FROM -->

            <div class="form-group" id="tbi-field">
              <label for="" class="control-label">Pickup Branch</label>
              <select name="to" id="to" class="form-control select2">
              <!-- <select class="form-control"  name="staffbranch" id="state" onclick="checkName()"> -->
        
        <?php
       
        $qry = $conn->query("SELECT * FROM office_branch;");
            while($row= $qry->fetch_assoc()){
        ?>
<option><?php echo $row['branch_code']." , ". $row['office_address']." , ".$row['city']." , ".$row['dstate']." state ";?></option>
	        <?php
        };
        ?>                
              </select>

                      <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

</div>

</div>
      </div>
      </div>
<br><br>
<h3 class="w3-center" style="margin:auto">Parcel Information</h3><br>
<hr>
       <br>
<!-- PACKAGE INFORMATION -->
       <div class="col-sm-6">
         <label for="pname">Enter Package Name</label>
         <div class="form-group">
         <input type="text"  id="pname" class="form-control"name="pname">
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

         </div>
         <br><br>

       </div>
        <div class="row w3-center"style="width:100%"> 
            
        <div class="col-sm-3">
              <b>Item Weight</b>
                       <div class="form-group">
                <input type="text" name="weight" id="" class="form-control" value="" >
            <i>weight is measured in grams</i>
       
            </div>
</div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

        <div class="col-sm-3">
              <b>Item height</b>
              <div class="form-group">
              <input type="text" name="height" id="" class="form-control" value="" >
              <i>height is measured in centimeters</i>
            </div>
</div>

        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

        <div class="col-sm-3">
              <b>Item Width</b>
              <div class="form-group">
              <input type="text" name="width" id="" class="form-control" value="" >
            <i>Width is measured in centimeters</i>
            </div>
</div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

        <div class="col-sm-3">
              <b>Item Price</b>
                       <div class="form-group">
                <input type="number" name="price" onkeyup="myFunction()" id="fname" class="form-control" value="" >
            <i>Price is measured in Naira</i>
            </div>
</div>
        </div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

<!-- END OF PACKAGE INFORMATION -->
</div>
<br>
<h4 class="total" >Total <span id="total">0.00</span></h4>

<button class="btn btn-primary" type="submit" name="submit">Register Package</button>
</form>

<!-- END OF FORM -->
<br><br>
<script>
function myFunction() {
    var x = document.getElementById("fname").value;
    // document.getElementById("fname").innerHTML ="N"+x;

 document.getElementById("total").innerHTML ="N"+x;

if (str3>999999999999) {
}

}
</script>

<!-- END OF PAGE BODY -->

</body>
</html>
