<?php
include 'config.php';


$branch=$_GET['office'];
$location=$_GET['name'];


$conn->query("UPDATE dstaff SET dbranch='pending' WHERE dbranch='$location'");
    $conn->query("DELETE FROM office_branch WHERE branch_code='$branch'");

    header("location:viewoffice.php");

?>