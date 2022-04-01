
<?php



// include 'config.php';   

// $from=array("Abia", "Adamawa", "Akwa Ibom", "Anambara","Bauchi","Bayalsa","Benue","Bronue");


$nameErr=$driver = $lnameErr = $unameErr =$state1=$emailErr = $genderErr = $addErr = $passErr= $cpassErr=$phonee="";
$name= $statusE = $lname = $uname = $userid=$id=$phone=$status=$namename =$senderphone =$senderadress =$add = $branchto=$branchfrom =$weight =$height =$width=$price  = $email = $gender= $stateE = $branch  = $pass= $gender =$phone="";


$error=false;    

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {


  
$number=$_POST['id'];
$all=$conn->query("SELECT * FROM d_orders WHERE tracking_number='$number'");

$pack=$all->fetch_assoc();
if ($pack['item_status'] == 1){ 
  $branchfrom=$_POST['from'] ; 

  $branchto=$_POST['to'];  


  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
         
  $branchid=$_POST["to"];
  $ex=explode(",",$branchid);
   $branchid=$ex[0];
   $branchid=str_replace(" ","",$branchid);
   echo "<br>".$branchid;
  

   $to=$ex[3];
   $to = clean(strtolower($to));
  $to = str_replace('state','',$to);
  $to = ucwords($to);




  $fbranchid=$_POST["from"];
  $exf=explode(",",$fbranchid);
   $fbranchid=$exf[0];
   $fbranchid=str_replace(" ","",$fbranchid);
   echo "<br>".$fbranchid;

   $from=$exf[3];
   $from = clean(strtolower($from));
  $from = str_replace('state','',$from);
  $from = ucwords($from);

}else{
  $branchfrom = $pack['sending_branch']; 

  $fbranchid = $pack['sending_branch_id']; 

  $from=$pack['sending_branch_state'];

// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


  $branchto=$pack['reciving_branch'];

  $branchid=$pack['reciving_branch_id'];

  $to = $pack['reciving_branch_state'];


}
 
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
        }
      // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


    if (empty($_POST["name"])) {
        $nameErr = "First name is !";
        $error=true;
      } else {
        $name = clean($_POST["name"]);
          
      }

    // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


     
      if (empty($_POST["add"])) {
        $addErr = "Adress is !";
        $error=true; 
       } else {
         $add = clean($_POST["add"]);
              
       }
 
      // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

     
       
 
       // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
     //  PACKAGE INFORMATION
$weight=$_POST['weight']  ;
$height=$_POST['height'] ; 
$width=$_POST['width'] ; 
$price=$_POST['price'] ; 

// $driver=$_POST['driver'] ;







if ($_POST['stat']=="1") {
$status='2';
}else {
  $status=$_POST['stat'];
}

    $id=$_POST['id'];




if ($pack['item_status'] != 1) {
  if ($_POST["driver"]=='Not Assigned') {
    $driver=$_POST["driver"];
  }
elseif (strlen($_POST["driver"])<9) {
  $driver=$_POST["driver"];
  }else {
    $error=false;    
    $driver=$_POST["driver"];
    $exp=explode(",",$driver);
    $driver=clean($exp[3]);
    }
  }else {
    $driver='Not Assigned';
  }  
};




if ($error==false AND isset($_POST['submit'])) {
  
$getnumber=$conn->query("SELECT * FROM d_orders WHERE tracking_number='$id'");

$snumber=$getnumber->fetch_assoc();
$senderphone=$snumber['sender_number'];
        // echo $status ;  echo $driver. "   " .$error  ;

$sql=$conn->query("UPDATE d_orders SET item_status='$status', reciving_branch_state='$to',	sending_branch_state='$from', sending_branch_id='$fbranchid', sending_branch='$branchfrom', reciver_name='$name' ,reciver_number='$phone', reciver_address='$add', reciving_branch='$branchto',item_weight='$weight',item_height='$height',item_width='$width',item_price='$price',reciving_branch_id='$branchid', delivery_truck_number='$driver' WHERE tracking_number='$id';");
if ($pack['item_status'] == 1) {


  $sql2=$conn->query("INSERT INTO item_status SET tracking_number='$id', dstatus='2', sender_number='$senderphone' ;");

}
echo $error;

?>

</p>
<div class="modal show"  data-aos="zoom-in" data-aos-delay="100" tabindex="1" style="display:block">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><?php
?></span>
        </button>
      </div>
      <div class="modal-body">
        <p> Package Infrmation Has Been Updatated Successfully </p>
      </div>
        <a href="vieworders.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
    </div>
  </div>  
</div>
<div class="modal-backdrop fade show"></div>
<?php
} 
?>