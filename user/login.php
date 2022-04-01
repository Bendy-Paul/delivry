 
<?php 
// include 'config.php';   

include 'loginerr.php';


// header_remove("location:cart.php");
isset($_SESSION['userregister']) ? header("location:cart.php"):'';




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <link rel="stylesheet" href="../project/bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="../project/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
   

    <link rel="stylesheet" href="4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../3/w3.css">  
   <link rel="stylesheet" href="login.css">

   <link rel="stylesheet" href="../project/bootstrap4/css/bootstrap.css">
   <link rel="stylesheet" href="../project/bootstrap4/css/bootstrap.min.css">

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

<body id="main" class="w3-light-grey">
 
    <main id="main">

    <br><br>
    <br><br>
    <br><br><br><br>

<form class="container form w3-card-2" method="POST"  action="login.php">
    <h1>Login</h1>
    <br><br>
    <div class="form-group">
    <label for="text" style="color:indigo">Phone Number or Email:</label>
    <input type="text" class="form-control" id="text" name="value">
    <span class="text-danger fade show"><?php  echo $data; ?></span>
  </div>

    <div class="form-group">
    <label for="text" style="color:indigo">password:</label>
    <input type="password" class="form-control" id="text" name="pass">


    <br><br>

    <button type="submit" class="btn" style="background:indigo; color:white; float:right">Submit</button>
    <a href="dashboard.php" class="btn" style="background:indigo; color:white">Back To Home</a>
  <br><br>
  
<p style="color:indigo">If you don't <a href="register.php"><strong>CLICK HERE</strong> </a> to register</p>


  </div>
<?php include 'header.php';
 ?>
</form>

</main>
</body>
</html>