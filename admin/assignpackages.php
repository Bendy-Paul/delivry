<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php   include 'header.php';
 ?>
<body class="main" onclick="w3.addClass('h2','marked')" >

<?php
      // echo $row['dstaffid'];  
$from=$_GET['start'];
$to=$_GET['end'];
$plate=$_GET['plate_number'];
?>
<a href="#show<?php echo $plate ?>case" ><i class="btn btn-primary w3-text-white" style="position:fixed"><i class=" fa fa-arrow-down  "></i></i></a>


<h1 class="w3-center w3-text-indigo">Available Packages Going From <?php echo $from?> To <?php echo $to?></h1>
<hr>

<br><br><br>    



<?php
      // echo $row['dstaffid'];                    

$available_package= $conn->query("SELECT * FROM d_orders WHERE (item_status!=1 OR	item_status!=8 OR item_status!=9) AND delivery_truck_number='Not Assigned' AND sending_branch_state='$from' AND reciving_branch_state='$to' ;");

$limit= $conn->query("SELECT * FROM d_orders WHERE delivery_truck_number='$plate' AND (item_status!=8 OR item_status!=9) ;")->num_rows;

echo $limit;
$n=$limit;

$increase=1;

while ($limit<25 && $assign=$available_package->fetch_assoc() ) {
if ( $available_package->num_rows>0 ){
 
?>

<style>

.main{
        margin-left:300px ;margin-right:5px;
        margin-top:40px;
        font-family: "Verdana", sans-serif;
        
}

  
@media only screen and (max-width: 430px) {
   
   .check{
     padding-left:30%
   }
   
     }

          
.soap{
  font-family: "Lobster", serif;

}
</style>

<div style="display:none;font-size:0px">
  
<?php



if ($_SERVER["REQUEST_METHOD"] == "POST" && $n<25) {

  $tn=$assign['tracking_number'];
  
  
if ($_POST["$tn"] !="") {
  $tr_numb=$assign['tracking_number'];

  $plateN=$_POST['plateN'];


  $n=$n+1;

if (isset($_POST['assign'])&&$n<25) {

    $n=$n+1;


  $sql=$conn->query("UPDATE d_orders SET  delivery_truck_number='$plateN' WHERE tracking_number='$tr_numb';");
}

}

}
?>

</div>

<form action="" class="form" method="POST">


<span>
  
<?php
if($increase=="1"){
?>
<span class="w3-right"><h4>
Select All
<input type="checkbox" id="<?php echo $assign['tracking_number'] ?>">
</h4></span>
<?php
}
?>

<h3 class="soap"><?php echo $increase ?></h3>


<script>
  
$(document).ready(function() {
    $('#<?php echo $assign['tracking_number'] ?>').click(function() {
        var checked = this.checked;
        $('input[type="checkbox"]').each(function() {
        this.checked = checked;
    });
    })
});



</script>


<div class="w3-padding-large">

<h2 class="soap w3-center w3-text-indigo"><?php echo $assign['tracking_number'] ?></h2>

<b class=" w3-text-indigo">Package Name:</b>
  <h6><?php echo $assign['package_name'] ?></h6>
<b class=" w3-text-indigo">Destination:</b>
  <h6><?php echo $assign['reciving_branch'] ?></h6>
<b class=" w3-text-indigo">Date Of Registration:</b>
  <h6><?php
              $d=strtotime($assign['registration_date']);
              echo date("l F d Y", $d);?></h6>            
<b class=" w3-text-indigo">Item Weight:</b>
  <h6><?php echo $assign['item_weight'] ?> Grams</h6>



<span class="w3-right"><h5 class="w3-text-indigo">
Select Package 
<input  type="checkbox" name="<?php echo $assign['tracking_number']?>" value="<?php echo $assign['tracking_number']; ?>">
</h5></span>


<input type="hidden" id="open" value="<?php echo $plate ?>" name="plateN">

<!-- <span style="left:40px"> -->
<!-- <label class="contain"> -->
<!-- &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->

  <!-- <span class="checkmark" style="float:right"></span> -->
<!-- </label> -->

<br><br>

</div>
<hr style="width:100%">


<?php
}

$increase=$increase+1;

}
?>
</span>


<?php
if($available_package->num_rows=='0'  && $plate!=="None") {
  ?>

  <style> 
.icon2{
    font-size: 38vh;
    /* position: absolute; */
    margin:auto;
    /* right: 15px; */
    /* top: 15px; */
    opacity: 0.9;
    /* transition: transform .3s linear; */
}

  </style>

<div class="icon2 w3-text-indigo w3-center">

    <i  class="fa fa-box-open w3-center" style="margin:auto"></i><br>
    <h3>Ther Are No Available Packages Going To <?php echo " $to From $from "?> At This Time</h3>

</div>
  
<?php
}
?>
<br>

<i> Note that this driver can only be assigned <?php echo 25-$limit ?> more packages</i>

<br><br>
      <div class="w3-padding-small">
<span  style="right:0px"><button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
</span>

<span style="float:right"><input type="submit"  name="assign" class="btn btn-primary" value="Assign">
</span>
</form>


<div id="show<?php echo $plate ?>case">
  <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit delectus incidunt laborum error eligendi aliquam doloribus totam natus vitae. Eos sit officia, ratione facilis aliquid architecto, ipsum aspernatur repellat delectus modi alias tempore mollitia voluptas voluptatem natus, debitis corrupti beatae. Provident laborum vitae, tempora corrupti et recusandae nulla dicta. Fugit dolorem nobis magnam repellendus magni consectetur soluta exercitationem cum odit vero, esse velit voluptates. Alias illum officia quia labore harum dicta suscipit, aspernatur enim recusandae facilis esse veritatis temporibus excepturi pariatur praesentium consequuntur tempore deserunt deleniti vel, est in! Error nostrum veniam ullam provident iusto aliquid aperiam laborum ipsa voluptas ex labore, consequuntur architecto incidunt quasi asperiores ad dolor facere, nobis, odit natus magnam tempore assumenda placeat hic? Laboriosam possimus cumque quos voluptates quod error sint eligendi, dolor ullam deleniti sequi nobis dolorem tenetur, saepe itaque. Reiciendis, vitae illo unde iste ratione similique autem ad amet molestiae natus nulla iusto sit eum itaque quasi perspiciatis in. Doloremque repellendus nulla officia sed eveniet, sunt, culpa ullam, aut enim ea corporis numquam blanditiis delectus nisi quae mollitia porro reiciendis vitae consequatur eligendi neque atque cupiditate omnis optio! Molestiae ea quisquam cupiditate commodi provident facere et eligendi sit, quis vitae ipsa ex corporis atque amet laudantium! Exercitationem perspiciatis quae, laboriosam veniam hic repudiandae incidunt, quos, temporibus ut odio molestiae fugiat doloribus. Reiciendis, laborum nobis. Maxime obcaecati pariatur iste aliquam inventore est enim saepe! Nemo et qui numquam molestiae incidunt, velit fuga ad aperiam laboriosam nobis blanditiis quod at praesentium earum reiciendis quos quibusdam sunt provident omnis accusantium! Eligendi deserunt fugiat harum inventore tempore, dignissimos sint illum officiis? Iste sequi soluta maiores deleniti, doloribus nobis accusantium sed quidem. Dolorum, modi autem. Unde, placeat velit qui natus quae rem laboriosam sint est sapiente quaerat harum quam itaque vel impedit consectetur. Nulla incidunt debitis dignissimos nam explicabo fuga officiis sit ducimus vel fugiat qui omnis temporibus, similique officia quasi aut facilis esse nemo voluptatibus numquam provident. Facilis error rem ipsam obcaecati repellendus voluptatum, vel, impedit sit, illo nesciunt minima ut eos magni. Quis quasi tempore distinctio cum quod dolor consequuntur eaque. -->
</div>
<br><br>

</body>
</html>