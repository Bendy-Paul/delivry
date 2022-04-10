<?php
include 'config.php';


$adminid=$_SESSION['adminid'];
    session_destroy();

    $conn->query("DELETE FROM dadmin WHERE userid='$adminid'");

    header("location:adminlog.php");

?>