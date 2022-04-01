<?php
session_start();

// include 'acnt.php';

$conn= new mysqli("localhost", "root", "", "project");

function clean($data){
    GLOBAL $conn;
    $data=trim($data);
    $data=strip_tags($data);
    $data=htmlentities($data);
    $data= $conn->real_escape_string($data);
    return $data;
};




// $check=$conn->query("SELECT * FROM dproject WHERE (dphone='$value' OR demail='$value') AND dpass='$pass'");
// ($_SESSION['userregister']!= true) ? header("location:login.php"):'';

?>