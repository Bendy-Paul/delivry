
<?php 


// include 'config.php';   


// include 'adminlogback.php';

// isset($_SESSION['success']) ? header("location:cart.php"):'';


// include 'header.php';


// session_start();

include 'config.php';   




$value=$pass=$data="";






if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


    $value = clean($_POST["value"]);
  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


    $pass = md5(clean($_POST["pass"]));
    
    
  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&


    $check=$conn->query("SELECT * FROM dadmin WHERE (dphone='$value' OR demail='$value') AND dpass='$pass'");
    if ($check->num_rows>0) {
       
       
                                
                        $row = $check->fetch_assoc();


                        // echo"<pre>";
                        // print_r($row);
                        // echo"</pre>";

// REGISTRATION OF SESSIONS
                        $_SESSION['adlast']=$row['dlname'];
                        $_SESSION['adnumber']=$row['dphone'];
                        $_SESSION['adstate']=$row['dstate'];
                        $_SESSION['ademail']=$row['demail'];
                        $_SESSION['adGender']=$row['dgender'];
                        $_SESSION['adname']=$row['dname'];
                        $_SESSION['adminid']=$row['userid'];
                        $_SESSION['date']=$row['ddatesign'];
                        $_SESSION['dob']=$row['ddob'];
                        $_SESSION['adminsuccess'] = true;

// END OF SESSION REGISTRATION




        header('Location:admin.php');
        

    }else {
        $data="User Data Does not exist try check input and try again";
        // echo $_SESSION['name'];
    };

}

isset($_SESSION['adminsuccess']) ? header("location:admin.php"):'';



?>