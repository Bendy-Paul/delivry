<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="main">
<?php

$error=false;

$brandE=$plateE=$modelE="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (strlen($_POST['brand'])<2) {
        $brandE = "Car brand is too short to be registered";
        $error=true;
}else {
    $brand = clean(ucwords(str_replace(' ','-',$_POST["brand"])));
    $brand = strtolower($brand);
    $brand = ucwords($brand);
}
// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


if (strlen($_POST['plate_number'])>7||strlen($_POST['plate_number'])<6) {
    $plateE = "Invalid Length For Plate Number";
    $error=true;
}else {
$plate_number = clean(ucwords(str_replace(' ','-',$_POST["plate_number"])));
$plate_number = strtoupper($plate_number);

$check=$conn->query("SELECT * FROM delivery_trucks WHERE dcar_id='$plate_number';");
if ($check->num_rows>0) {
    $plateE = "This Plate number has already been registered ";
    $error=true;
   $plate_number = $plate_number;}
// $city = ucwords($city);
}
// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


if (strlen($_POST['car_model'])<3||strlen($_POST['car_model'])>14) {
    $modelE = "Invalid Length For Car Model";
    $error=true;
}else {
$car_model = clean(ucwords(str_replace(' ','-',$_POST["car_model"])));
// $plate_number = strtoupper($plate_number);
$car_model = strtolower($car_model);
$car_model = ucwords($car_model);
}

// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
$dstate=$_POST['state'];

}


if ($error==false && isset($_POST["save"]) ) {
  
    $sql=$conn->query("INSERT INTO delivery_trucks SET delivery_state='$dstate', carbrand='$brand', dcar_id='$plate_number', carmodel='$car_model';");
    
    // $row = $check->fetch_assoc();
}
?>

</body>
</html>