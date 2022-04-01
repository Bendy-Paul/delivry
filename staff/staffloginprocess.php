
<?php 


// include 'config.php';   


// include 'adminlogback.php';

// isset($_SESSION['success']) ? header("location:cart.php"):'';


// include 'header.php';


// session_start();

include '../admin/config.php';   




$value=$pass=$data="";






if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


    $value = clean($_POST["value"]);
  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


    $pass = clean($_POST["pass"]);
    
    
  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


    $check=$conn->query("SELECT * FROM dstaff WHERE (dphone='$value' OR demail='$value') AND dstaffid=$pass");
    if ($check->num_rows>0) {
       
       
                                
                        $row = $check->fetch_assoc();

                        // print_r($row);

                        // echo"<pre>";
                        // print_r($row);
                        // echo"</pre>";

// REGISTRATION OF SESSIONS                        
                        $_SESSION['staffname']=$row['dfname'];
                        $_SESSION['stafflast']=$row['dlname'];
                        $_SESSION['staffnumber']=$row['dphone'];
                        $_SESSION['staffstate']=$row['dstate'];
                        $_SESSION['staffemail']=$row['demail'];
                        $_SESSION['staffGender']=$row['dgender'];
                        $_SESSION['staffid']=$row['dstaffid'];
                        $_SESSION['staffdate']=$row['ddatesign'];
                        $_SESSION['staffstatus']=$row['dstatus'];
                        $_SESSION['staffoffice']=$row['dbranch'];
                        $_SESSION['staffofficeid']=$row['branchid'];

                        $_SESSION['loginsuccess'] = true;

// END OF SESSION REGISTRATION




        header('Location:staff.php');
        

    }else {
        $data="User Data Does not exist try check input and try again";
        // echo $_SESSION['name'];
    };

}

// isset($_SESSION['loginsuccess']) ? header("location:staff.php"):'';



?>