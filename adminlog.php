<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">

<?php 
include 'loginproccess.php';

(isset($_SESSION['adminsuccess']) and $_SESSION['adminsuccess'] == true) ? header("location:admin.php"):'';

?>
    
<style>

form{
    background-color: white;
    width: 50%;
    /* border-style: groove; */
    border-radius: 2%;
    /* border: 5px solid indigo; */
}

body{
    /* background:  linear-gradient(to right , , rgb(182, 244, 247));; */
}

   .form{
    background-color:white;
    border-radius: 2%;
    width:50%;
    /* border:2px,solid,red; */
    /* border-style: double;}  */
   }
    .form-control{
      /* border-radius: 5px; */
      border: 2px solid indigo;
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
  select{
    border: 3px solid indigo;
  }
</style>

<body style="background">
  



    <br><br>
    <br><br>

    <!-- LOGIN FORM -->

<form class="container form" method="POST"  action="adminlog.php">
    <h1>Login</h1>


            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

            <!-- EMAIL OR PHONE NUMBER -->
    <div class="form-group">
    <label for="text" style="color:indigo">Phone Number or Email:</label>
    <input type="text" class="form-control" id="text" name="value">
    <span class="text-danger fade show"></span>
  </div>

  <!-- END OF EMAIL/PHONE NUMBER INPUT -->

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
<!-- PASSWORD -->
    <div class="form-group">
    <label for="text" style="color:indigo">password:</label>
    <input type="password" class="form-control" id="text" name="pass">

<!-- END OF PASSWORD INPUT -->
    <br><br>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <br><br>

  <!-- LINK TO REGISTER PAGE -->
  
<p style="color:indigo">If you don't <a href="adminreg.php"><strong>CLICK HERE</strong> </a> to register</p>

<!-- END OF REJISTER PAGE LINK -->
  </div>

</form>

<!-- END OF FORM -->
</body>
</html>