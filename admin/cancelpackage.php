
<?php
include 'config.php';


    $tracking=$_GET['track'];

        $conn->query("UPDATE d_orders SET item_status='9' WHERE tracking_number=$tracking;");
        header("location:vieworders.php");

?>