<?php

// include 'newpackageprocess.php';

// echo $_SESSION['userlname'];

?>

<?php

include 'config.php';
($_SESSION['userregister']!= true) ? header("location:login.php"):'';


include 'header.php';   

($_SESSION['userregister']!= true) ? header("location:login.php"):'';

// $state=array("Abia", "Adamawa", "Akwa Ibom", "Anambara","Bauchi","Bayalsa","Benue","Bronue");


$nameErr = $lnameErr = $unameErr =$state1=$emailErr = $genderErr = $addErr = $passErr= $cpassErr=$phonee="";
$name = $lname = $uname = $userid=$phone=$namename =$senderphone =$senderadress =$add = $branchto=$branchfrom =$weight =$height =$width=$price  = $email = $gender= $stateE = $branch  = $pass= $gender =$phone="";


$error=false;    

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

    $senderphone=$_SESSION['number'];
    $sendername=$_SESSION['name']." ".$_SESSION['last'];
    $senderadress=$_SESSION['address'];



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


    if (empty($_POST["name"])) {
        $nameErr = "First name is reqired !";
        $error=true;
      } else {
        $name=strtolower($_POST["name"]);
        $name =ucwords(clean($name)) ;
          
      }



     
      if (empty($_POST["add"])) {
        $addErr = "Adress is reqired !";
        $error=true; 
       } else {
         $add=strtolower($_POST["add"]);
         $add =ucwords(clean($add)) ;
              
       }

       if (strlen($_POST['pname'])<5||strlen($_POST['pname'])>70) {
        $packErr = "Package name is not valid !";
        $error=true; 
       } else {
         
        $pname=strtolower($_POST["pname"]);
         $pname =ucwords(clean($pname)) ;     
       }


$userid=rand(11111111,9999999999999);
$check=$conn->query("SELECT * FROM d_orders WHERE tracking_number='$userid'");
if ($check->num_rows>0) {
  $itemid=rand(11111,999999999999999999);
}

};



if ($error==false AND isset($_POST['submit'])) {
  
// $pass=md5($pass);

$sql=$conn->query("INSERT INTO d_orders SET package_name='$pname', tracking_number='$userid', sender_name='$sendername', sender_number='$senderphone',sender_address='$senderadress', reciver_name='$name' ,reciver_number='$phone', reciver_address='$add'");

$sql2=$conn->query("INSERT INTO item_status SET tracking_number='$userid', dstatus='1', sender_number='$senderphone' ;");




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
      <p>Package has been booked successfully proceed to the nearset delivery office to complete package registration <br> Tracking Number:<?php echo $userid; ?></p>
    </div>
      <a href="newpackage.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
    </div>
  </div>
  </div>
  <div class="modal-backdrop fade show"></div>
<?php 
}
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
			<form action="" class="form w3-card-4" id="manage-parcel" method="post" style="width:70%;margin:auto;padding:12px">
       <h2 class="w3-center">Register New Package</h2><br><br>
        <div class="row">
          <div class="col-sm-6 ">
              <b>Sender Information</b>
              <div class="form-group">
                <label for="" class="control-label ">Name</label>
                <input type="text" name="sender_name" id="" class="form-control " value="<?php echo $_SESSION['name']." ".$_SESSION['last']; ; ?>" disabled >
              </div>
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="ggggadd" id="" class="form-control" value="<?php echo $_SESSION['address'];?>" disabled>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="sender_contact" id="" class="form-control" value="<?php echo $_SESSION['number'];?>" disabled>
              </div>

              <div class="form-group">
                <label for="" class="control-label"><b>Package Name</b></label>
                <input type="text" name="pname" id="" class="form-control">
              </div>
          </div>
          <div class="col-sm-6 ">
              <b>Recipient Information</b>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="name" id="" class="form-control" value="" >
                <span class="w3-text-red"><?php echo $nameErr ?></span>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="add" id="" class="form-control" value="" >
                <span class="w3-text-red"><?php echo $addErr ?></span>

              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="phone" id="" class="form-control" value="" >
                <span class="w3-text-red"><?php echo $phonee ?></span>

              </div>
          </div>
        </div>


</div>

<br><br>
<button class="btn btn-primary" type="submit" name="submit">Register Package</button>
</form>
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


<script>

</script>


