<!-- INSERT INTO ditem_cat SET ditem_name='ipad', ditem_id='0004', ditem_brand='IOS Company',ditem_price='250,000', 
ditem_pic='C:\xampp\htdocs\project\img\ipad.jpeg', ditem_catig='Gadjets' ,ditem_status='Available' -->
<!DOCTYPE html>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="index1.css"> -->
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
   

    <!-- <link rel="stylesheet" href="login.css"> -->


    <body>
    
<!-- <pre><?php print_r($_POST)?></pre> -->



<?php 




include 'adminregback.php';   

isset($_SESSION['adminsuccess']) ? header("location:admin.php"):'';


?>

<style>

form{
    background-color: white;
    width: 50%;
    /* border-style: groove; */
    border-radius: 2%;
    /* border: 5px solid rgb(11, 147, 226); */
}

body{
    /* background:  linear-gradient(to right , , rgb(182, 244, 247));; */
}

/* h1{
    text-align:center;
    color:rgb(51, 51, 255);
    text-shadow: 3px 2px rgb(11, 147, 226);
} */

   .form{
    background-color:white;
    border-radius: 2%;
    width:50%;
    /* border:2px,solid,red; */
    /* border-style: double; */
  } 

    .form-control{
      /* border-radius: 5px; */
      border: 1px solid rgb(51, 51, 255);
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
    color:rgb(11, 147, 226);
  }
  select{
    border: 3px solid rgb(11, 147, 226);
  }
</style>

<!-- REGISTRATION FORM -->


<form class="container form" method="POST"  action="#">
    <h2>Admin Registration Page!</h2>
    <br><br>

    <!-- NAME INPUT -->

   <div class="row">
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

   <div class="form-group column col-6">
    <label for="text">Enter Firstname:</label>
    <input type="text" class="form-control" id="text" placeholder="Eg.Paul" name="name">
    <span class="text-danger fade show"><?php echo $nameErr;
    //  echo $error;
    ?></span>
  </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


    <div class="form-group column col-6">
    <label for="text">Enter Lastname:</label>
    <input type="text" class="form-control" id="text" placeholder="Eg.John" name="lname">
    <span class="text-danger fade show"><?php echo $lnameErr;?></span>
  </div>
   </div>
<!-- END OF NAME INPUT -->

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  <div class="form-group">
    <label for="pwd">Phone Number:</label>
    <input type="text" class="form-control" id="pwd" placeholder="Eg.11122233344" name="phone">
    <span class="text-danger fade show"><?php echo $phonee;?></span>
  </div>
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


  <div class="form-group">
    <label for="email">Enter Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Eg.example@exam.com" name="email">
    <span class="text-danger fade show"><?php echo $emailErr;?></span>
  </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


<div class="form-group">
    <label for="state">Enter Office State</label>
     <input id="" name="state" class="form-control">
     <span class="text-danger fade show"><?php echo $stateE;?></span>

  </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


<!-- BIRTH INFORMATION     -->


  <h4>Enter Birth Information:</h4>
<br>

  <div class="row">
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  <div class="col-sm-4">
    
    <label for="exampleFormControlSelect1">Enter Year of Birth:</label>
    <select class="form-control" id="exampleFormControlSelect1" name="year">
    <?php
  $x = 1970;
  
  while($x <= 2022) {
      echo "<option> $x </option><br>";
      $x++;
  }
  ?>
    </select>
  </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  
  <div class="col-sm-4">
  <label for="exampleFormControlSelect2">Enter month of Birth:</label>
    <select class="form-control" id="exampleFormControlSelect2"  name="month">
        <option>January</option>
        <option>Febuary</option>
        <option>March</option>
        <option>April</option>
        <option>May</option>
        <option>June</option>
        <option>July</option>
        <option>August</option>
        <option>September</option>
        <option>October</option>
        <option>November</option>
        <option>December</option>
      </select>
  </div>
  
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  
  <div class="col-sm-4">
  <label for="exampleFormControlSelect1">Enter Day of Birth:</label>
    <select class="form-control" id="exampleFormControlSelect1" name="day">
    <?php
  $x = 1;
  
  while($x <= 31) {
      echo "<option> $x </option><br>";
      $x++;
  }
  ?>
  </select>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  </div>
  </div> 
  <!-- END OF BIRTH INFORMATION    -->
  <br>

  <!-- USER GENDER INFORMATION -->


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

  <!-- END OF GENDER INFORMATION -->
  

  <!-- PASSWORD INFORMATOIN -->
<div class="row">
 
  <div class="form-group column col-6">
    <label for="pwd ">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
    <span class="text-danger fade show"><?php echo $passErr;?></span>
  </div>
  
  <div class="form-group column col-6">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Please confirm password"name="cpass">
    <span class="text-danger fade show"><?php echo $cpassErr;?></span>
  </div>

</div>
<!-- END OF PASSWORD INFORMATION -->

  <button type="submit" class="btn btn-primary" name="submit" style="background-color:rgb(51, 51, 255)">Register</button>
  <br><br><br><br>
  

  <!-- LOGIN LINK -->
<p>if you already <a href="adminlog.php" style="color:rgb(51, 51, 255)"><strong>CLICK HERE</strong></a> to log in</p>
<!-- END OF LOGIN LINK -->

</form>



</body>
</html>
