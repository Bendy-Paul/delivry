
<?php 
include 'header.php';

  



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   .form{
    background-color:white;
    border-radius: 2%;
    width:80%;
    /* border:2px,solid,red; */
    /* border-style: double; */
  } 

    .form-control{
      /* border-radius: 5px; */
      /* border: 3px solid indigo; */
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
    /* width: 0%; */
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

<form class="container form" method="POST"  action="verifyuser.php">
    <h1>Package Registration</h1>
    <br><br>

                  <!-- // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

    <div class="form-group">
    <label for="text" style="color:indigo">Senders Email:</label>
    <input type="text" class="form-control" id="text" name="value">
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