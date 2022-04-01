


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index1.css">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
   

    <link rel="stylesheet" href="login.css">

    <link rel="stylesheet" href="../project/bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="../project/bootstrap4/css/bootstrap.min.css">

<body>




<?php 
    // print_r($_POST);

// include 'header.php';
?>



<?php 




include 'registerErr.php';   


isset($_SESSION['userregister']) ? header("location:cart.php"):'';


?>

<style>
nav{
  background-color:white;

}
</style>
   
<style>
   .form{
    background-color:white;
    border-radius: 2%;
    width:50%;
    border:1px,solid,red;
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
</style>

<br><br><br><br>
<form class="container form" method="POST"  action="#">
    <h1>Registration Page!</h1>
    <br><br>
    <div class="form-group">
    <label for="text">Enter Firstname:</label>
    <input type="text" class="form-control" id="text" placeholder="Eg.Paul" name="name">
    <span class="text-danger fade show"><?php echo $nameErr;
     echo $error;
    ?></span>
  </div>

    <div class="form-group">
    <label for="text">Enter Lastname:</label>
    <input type="text" class="form-control" id="text" placeholder="Eg.John" name="lname">
    <span class="text-danger fade show"><?php echo $lnameErr;?></span>
  </div>

  <div class="form-group">
    <label for="pwd">Phone Number:</label>
    <input type="text" class="form-control" id="pwd" placeholder="Eg.11122233344" name="phone">
    <span class="text-danger fade show"><?php echo $phonee;?></span>
  </div>zz

  <div class="form-group">
    <label for="email">Enter Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Eg.example@exam.com" name="email">
    <span class="text-danger fade show"><?php echo $emailErr;?></span>
  </div>



    <br>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Enter Address:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="add" ></textarea>
    <span class="text-danger fade show"><?php echo $addErr;?></span>
  </div>


  

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
    <span class="text-danger fade show"><?php echo $passErr;?></span>
  </div>
  
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Please confirm password"name="cpass">
    <span class="text-danger fade show"><?php echo $cpassErr;?></span>

  </div>

  <div class="form-check">
    <h4>Enter Gender:</h4>
  <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" checked>
  <label class="form-check-label" for="exampleRadios1">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
  <label class="form-check-label" for="exampleRadios2">
    Female
  </label></div><br>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <a href="dashboard.php" class="btn btn-primary">Back To Home</a>

  <br><br><br><br>
  
<p>if you already <a href="login.php"><strong>CLICK HERE</strong></a> to log in</p>


</form>



</body>
</html>





