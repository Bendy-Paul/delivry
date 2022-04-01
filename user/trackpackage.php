

<?php

include 'config.php';


($_SESSION['userregister']!= true) ? header("location:login.php"):'';

$numb=$_SESSION['number'];

$conn->query("UPDATE item_status SET view='Yes' WHERE sender_number='$numb' ");

include 'header.php';

$T_N="";



if ($_SERVER["REQUEST_METHOD"] == "POST" ){
    
   $T_N=$_POST['track_number'];


}
// ($_SESSION['userregister']!= true) ? header("location:login.php"):'';


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<style>
   
  #nothero {
    width: 98%;
    height: 50vh;
    margin:auto;
    background: url(../delivery4.jpg) top center;
    background-size: cover;
    position: relative;
}

.small-box {
    border-radius: 0.25rem;
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    display: block;
    margin-bottom: 20px;
    position: relative;
    text-align:justify;
    width:25%;
    /* left:7%; */
    margin:auto
    
}

.small-box .icon>i.fa, .small-box .icon>i.fab, .small-box .icon>i.fad, .small-box .icon>i.fal, .small-box .icon>i.far, .small-box .icon>i.fas, .small-box .icon>i.ion {
    font-size: 70px;
    top: 20px;
}
.small-box .icon>i {
    font-size: 90px;
    position: absolute;
    right: 15px;
    top: 15px;
    opacity: 0.6;
    transition: transform .3s linear;
}


.icon2{
    font-size: 50vh;
    /* position: absolute; */
    margin:auto;
    /* right: 15px; */
    /* top: 15px; */
    opacity: 0.9;
    /* transition: transform .3s linear; */
}

     
@media (max-width: 990px){
.small-box .icon {
    display: none;
    margin:auto;
}
.small-box{
  margin-left:auto;
  margin-right:auto;
  width:100%;
  text-align:center;

}
}

#id{
    display:none;
}

#error{
    /* padding:89px; */
    /* background-color: red; */
    position: relative;
    display:none;
}

.class{
  margin:auto;
}

</style>


<body class="main">
<form method="POST" class="" action="">

<div class="col-lg-12 ">
<br><br><br><br>
<br><br>
	<div class="card w3-card-2 card-primary">

		<div class="card-body">
			<div class="d-flex w-100 px-1 py-2 justify-content-center align-items-center">
				<label for="">Enter Tracking Number</label>
				<div class="input-group col-sm-8">
                    <input type="text" name="track_number" id="ref_no" class="form-control" value="<?php echo $T_N;?>">
                    <div class="input-group-append">
                    <button type="submit" name="track-btn" class="btn btn-sm btn-primary btn-gradient-primary">
                            <i class="fa fa-search"></i>
                        </button>
                        <button type="submit" class="btn btn-sm btn-danger btn-gradient-danger" id="id">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
			</div>
		</div>
	</div>
</form>

</div>

<div data-aos="fade-left" class="w3-center w3-text-red">
<h3 id="error" >
  <br><br><br>
Invalid Tracking Number
</h3>
</div>
</div>
</div>
</div>
</div>
<div data-aos='fade-left' data-aos-delay='0'>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" ){
 if (isset($_POST['track-btn'])) {

    ?>

<script>

document.getElementById("id").style.display = "inline"

</script>
    <?php
$T_N=$_POST['track_number'];
$T_N=str_replace(" ","",$T_N);

    $getitem = $conn->query("SELECT * FROM item_status WHERE tracking_number='$T_N' AND  sender_number=$numb ORDER BY ddate ASC");
if ($getitem->num_rows>0) {
    echo "<br>"."<br>"."<br>" ;
    $num=0;

while ($get_item_status=$getitem->fetch_assoc()) {


    
    $d=strtotime($get_item_status['ddate']);
    $date=date("l F d Y", $d);
    $time=date("h:i:sa", $d);


    switch ($get_item_status['dstatus']) {
        case '1':
            $status= "
            <div class='small-box w3-white w3-padding-large border'>
            <div class='inner'>
                <p class='w3-text-indigo'>This Package Is Pending </p>
              <div class='icon'>
              <i class='fa fa-undo-alt'></i>

            <span  class='w3-text-indigo'><b>Date:</b> $date <b> <br>At: </b>$time</span>
            <br>
          </div>
            </div></div> ";
            break;
        case '2':
            $status= "
            <div class='small-box w3-white w3-padding-large border'>
            <div class='inner'>
                <p class='w3-text-indigo'>Collected by delivery company</p>
              <div class='icon'>
              <i class='fa fa-warehouse'></i>

            <span class='w3-text-indigo'><b>Date:</b> $date <b> <br>At: </b>$time</span>
            <br>
          </div>
            </div></div>";
            break;
        case '3':
            $status= "
            
            <div class='small-box w3-white w3-padding-large border'>
            <div class='inner'>
                <p class='w3-text-indigo'>Package Has Been Shipped</p>
              <div class='icon'>
              <i class='fa fa-route'></i>

            <span class='w3-text-indigo'><b>Date:</b> $date <b> <br>At: </b>$time</span>
            <br>
          </div>
            </div></div>
";            break;
        case '4':
            $status= "
            
            
            <div class='small-box w3-white w3-padding-large border'>
            <div class='inner'>
                <p class='w3-text-indigo'>Package Is In Transit</p>
              <div class='icon'>
              <i class='fa fa-clipboard-list'></i>

            <span class='w3-text-indigo'><b>Date:</b> $date <b> <br>At: </b>$time</span>
            <br>
          </div>
            </div></div>
";      
            break;
        case '5':
             $status= "
                         
            <div class='small-box w3-white w3-padding-large border'>
            <div class='inner'>
                <p class='w3-text-indigo'>Package Is Out for Delivery</p>
              <div class='icon'>
              <i class='fa fa-shipping-fast'></i>

            <span class='w3-text-indigo'><b>Date:</b> $date <b> <br>At: </b>$time</span>
            <br>
          </div>
            </div></div>
";      
             break; 
                
         case '6':
            $status= "
                  
            <div class='small-box w3-white w3-padding-large border'>
            <div class='inner'>
                <p class='w3-text-indigo'>Package Has Arrived At Pickup Station</p>
              <div class='icon'>
              <i class='fa fa-clipboard-check'></i>

            <span class='w3-text-indigo'><b>Date:</b> $date <b> <br>At: </b>$time</span>
            <br>
          </div>
            </div></div>
";   
             break;
        case '7':
            $status= "
                              
            <div class='small-box w3-white w3-padding-large border'>
            <div class='inner'>
                <p class='w3-text-indigo'>Package Is Ready for Pickup</p>
              <div class='icon'>
              <i class='fa fa-box'></i>

            <span class='w3-text-indigo'><b>Date:</b> $date <b> <br>At: </b>$time</span>
            <br>
          </div>
            </div></div>
";   
            break;
        case '8':
            $status= "                       
            <div class='small-box w3-white w3-padding-large border'>
            <div class='inner'>
                <p class='w3-text-indigo'>Package Has Been Picked-up</p>
              <div class='icon'>
              <i class='fa fa-box-open text-success'></i>

            <span class='w3-text-indigo'><b>Date:</b> $date <b> <br>At: </b>$time</span>
            <br>
          </div>
            </div></div>
";   
            break;
        case '9':
            $status= "            
            <div class='small-box w3-white w3-padding-large border'>
            <div class='inner'>
                <p class='w3-text-indigo'>Package Delivery Was Unsuccessfull</p>
              <div class='icon'>
              <i class='fa fa-times text-danger'></i>

            <span class='w3-text-indigo'><b>Date:</b> $date <b> <br>At: </b>$time</span>
            <br>
          </div>
            </div></div>
";   
            break;
        }

    echo "
   
    <div>$status 
    <div class='class w3-indigo'style='width:1%;margin:auto;padding-left:0.2rem;padding-bottom:4rem;'></div>

    </div>
    

    
    ";
    



$num=$num+0;

}

}

else {
   ?>
   <script>
   document.getElementById("error").style.display = "inline"
   
   </script>
<?php
}

}
}

?>
</div>

</body>
</html>