
<?php 
include 'config.php';

  

// header_remove();


$value=$pass=$data="";

if ($_SERVER['REQUEST_METHOD']=="POST") {

  // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


    $value = clean($_POST["value"]);
    // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


    $pass = md5(clean($_POST["pass"]));
    
    
    // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

    $check=$conn->query("SELECT * FROM dproject WHERE demail='$value' AND dpass='$pass'");
    if ($check->num_rows>0) {
$row = $check->fetch_assoc();


// USER INFORMATION REGISTRATION

              $_SESSION['userlname']=$row['dlname'];
              $_SESSION['userphone']=$row['dphone'];
              $_SESSION['useremail']=$row['demail'];
              $_SESSION['userfname']=$row['dname'];
              $_SESSION['userid']=$row['userid'];
              $_SESSION['add']=$row['dadd'];

        header('Location:newpackage2.php?user=yes');

// END OF GETTING USER INFOTMATION

    }else {
        $data="User Data Does not exist try check input and try again";
        // echo $_SESSION['name'];
    };

  }

// isset($_SESSION['adminsuccess']) ? header("location:admin.php"):'';
// include 'config.php';   

?>
  
<?php 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../3/w3.css">  
<link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
<link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
<link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
<link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">

<style>
   .form{
    background-color:white;
    border-radius: 2%;
    width:50%;
    /* border:2px,solid,red; */
    /* border-style: double; */
  } 

    .form-control{
      /* border-radius: 5px; */
      border: 3px solid indigo;
       width: 100%;
       /* color:rgb(141, 232, 235);; */
    }

@media (max-width: 1000px) {
     body{
     background-color:white;
    }
    .form{
        width: 99%;
    }
  }

  a{
    color:indigo;
  }
  form{
    background-color: white;
    width: 50%;
    /* border-style: groove; */
    border-radius: 2%;
    /* border: 5px solid indigo; */
}

</style>

<body class="main" class="w3-light-grey">
 
    <main id="main">

    <br><br>
    <br><br>
    <br><br><br><br>


    <!-- FIRST FORM FOR USER REGISTRATION -->

<form class="container form w3-card-2" method="POST"  action="">
    <h1>Package Registration</h1>
    <br><br>

                  <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

    <div class="form-group">
    <label for="text" style="color:indigo">Senders Email:</label>
    <input type="text" class="form-control" id="text" name="value">
    <span class="text-danger fade show"><?php  echo $data; ?></span>
  </div>

                <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

    <div class="form-group">
    <label for="text" style="color:indigo">Senders Password:</label>
    <input type="password" class="form-control" id="text" name="pass">

              <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

    <br><br>
<!-- BUTTON TO SUBMIT THIS FORM -->
    <button type="submit" class="btn" style="background:indigo; color:white; float:right">Submit</button>
<!-- BUTTON TO SEND USER BACK TO HOME PAGE -->
    <a href="admin.php" class="btn" style="background:indigo; color:white">Back To Home</a>
  <br><br>
  
<p style="color:indigo">If you don't <a href="newpackage2.php?user=no"><strong>CLICK HERE</strong> </a> to register</p>


  </div>

</form>

</main>
</body>
</html>