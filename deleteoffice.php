<?php
include 'config.php';


$branch=$_GET['branch_code'];
// $location=$_GET['name'];

$order=$conn->query("SELECT * FROM d_orders WHERE ( sending_branch_id='$branch' OR reciving_branch_id='$branch' ) AND item_status!='8'");

while ($cancel_pachage=$order->fetch_assoc()) {
    $sql2=$conn->query("INSERT INTO item_status SET tracking_number=".$cancel_pachage['tracking_number'].", dstatus=9 sender_number=".$cancel_pachage['sender_number'].";");
};


$conn->query("UPDATE dstaff SET dbranch='pending' WHERE branchid='$branch'");
$conn->query("UPDATE d_orders SET item_status='9' WHERE sending_branch_id='$branch' AND item_status!='8'");
$conn->query("UPDATE d_orders SET item_status='9' WHERE reciving_branch_id='$branch' AND item_status!='8'");
    $conn->query("DELETE FROM office_branch WHERE branch_code='$branch'");
    $sql2=$conn->query("INSERT INTO item_status SET tracking_number='$number', dstatus=$status, sender_number='$sender' ;");


    header("location:viewoffice.php");

?>