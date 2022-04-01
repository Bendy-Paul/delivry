<?php

// session_start();

// include 'config.php';   


include 'config.php';


$value=$pass=$data="";


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

    $value = clean($_POST["value"]);


    $pass = md5(clean($_POST["pass"]));
    
    


    $check=$conn->query("SELECT * FROM dproject WHERE (dphone='$value' OR demail='$value') AND dpass='$pass'");
    if ($check->num_rows>0) {
        echo 'blue';
       
        // echo"<pre>";
        // print_r($row);
        // echo"<pre>";

        
$row = $check->fetch_assoc();



$_SESSION['last']=$row['dlname'];
$_SESSION['number']=$row['dphone'];
$_SESSION['address']=$row['dadd'];
$_SESSION['email']=$row['demail'];
$_SESSION['Gender']=$row['dgender'];
$_SESSION['name']=$row['dname'];
$_SESSION['userid']=$row['userid'];

       
        $_SESSION['userregister']= true;



        $session=$_SESSION['userregister'];
        header('Location:cart.php');


    }else {
        $data="User Data Does not exist try check input and try again";
        // echo $_SESSION['name'];
    };

}



// ($_SESSION['success']= true) ? header("location:cart.php"):'';


?>