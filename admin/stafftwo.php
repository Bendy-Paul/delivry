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


    <body class="main" class="w3-light-grey">
    

<!-- <pre><?php print_r($_POST)?></pre> -->



<?php 




include 'staffback.php';   



?>

<style>
    
h1{
    text-align:center;
    /* color:rgb(51, 51, 255); */
    /* text-shadow: 3px 2px rgb(11, 147, 226); */ 
}

   .form{
    background-color:white;
    border-radius: 2%;
    width:80%;
    border:2px,solid,red;
    /* border-style: double;*/
}  
    .form-control{
      /* border-radius: 5px; */
      border: 3px solid rgb(11, 147, 226);
       width: 100%;
       /* color:rgb(141, 232, 235);; */
    }

@media (max-width: 1000px) {
     body{
     background-color:white;
    }
    
  }

  a{
    color:rgb(11, 147, 226);
  }

         
  @media only screen and (max-width: 990px) {
    #main{
         margin-left:0px;margin-right:0px;
    }
}

</style>

<!-- START OF PAGE FORM -->
<form class="container form" method="POST"  action="" data-aos="fade-left">
    <h1>Staff Registration Page</h1>
    <br><br><br>
    <div class="form-group">
    <label for="text">Enter Firstname:</label>
    <input type="text" class="form-control" id="text" placeholder="Eg.Paul" name="name" value="<?php echo $name;  ?>">
    <span class="text-danger fade show"><?php echo $nameErr;
    //  echo $error;
    ?></span>
  </div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

    <div class="form-group">
    <label for="text">Enter Lastname:</label>
    <input type="text" class="form-control" id="text" placeholder="Eg.John" name="lname"value="<?php echo $lname;  ?>">
    <span class="text-danger fade show"><?php echo $lnameErr;?></span>
  </div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  <div class="form-group">
    <label for="pwd">Phone Number:</label>
    <input type="text" class="form-control" id="pwd" placeholder="Eg.11122233344" name="phone" value="<?php echo $phone;  ?>">
    <span class="text-danger fade show"><?php echo $phonee;?></span>
  </div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  <div class="form-group">
    <label for="email">Enter Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Eg.example@exam.com" name="email" value="<?php echo $email;  ?>">
    <span class="text-danger fade show"><?php echo $emailErr;?></span>
  </div>
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->



    <br>

    
  <div class="form-group">
    <label for="text"  >Register Worker As:</label>
    <select id="text" class="form-control" name="status">
    <option value="Staff" >Staff</option>
    <option value="Driver" >Driver</option>
    <!-- <option value="Receptionist" >Receptionist</option> -->
    <option value="Manager" >Manager</option>
    <!-- <option value="Ma" ><input type="text" placeholder="Others"></input></option> -->
        
        <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

    </select>
  </div>


          <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


  <div class="form-group">
    <label for="state">Enter Office Branch</label>
     <select class="form-control"  name="staffbranch" id="state" onclick="checkName()">
        
      
       <?php
      
       $dstaffstate = $_GET['staffstate'];
       $dstaffstate = clean(strtolower($dstaffstate));
       $dstaffstate = str_replace('state','',$dstaffstate);
       $dstaffstate = str_replace(' ','',$dstaffstate);
       $dstaffstate = ucwords($dstaffstate);
       // $staffstate;

       
 
       $qry = $conn->query("SELECT * FROM office_branch WHERE dstate='$dstaffstate'; ");
       if ($qry->num_rows<1) {
?>
<option value="">There Is No Available Office in This State</option>
<?php
       }else {
         
       
           while($row= $qry->fetch_assoc()){
       ?>
      <option value="<?php echo $row['branch_code'].", ". $row['office_address'].", ".$row['city'] ;?>"><?php echo $row['branch_code'].", ". $row['office_address'].", ".$row['city'] ;?></option>
       <?php
       }};
       ?>
     </select>
             <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

     
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
            <!--// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  </label></div><br>
  <button type="submit" style="float:right" class="btn btn-primary" name="submit" data-toggle="modal" data-target="#exampleModal">Submit</button> 
  <a href="staffnext.php" style="float:left" type="submit" class="btn btn-danger" name="submit">Back</a>
  <br><br><br><br>
  
  <!-- <?php echo $dstaffstate;  ?> -->


</form>

<!-- END OF PAGE FORM -->


</body>
</html>
