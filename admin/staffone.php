
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<?php include 'header.php'?>

<style>

    
h3{
    text-align:center;
    /* margin: auto;
    color:rgb(51, 51, 255); */
    /* text-shadow: 3px 2px rgb(11, 147, 226); */
}

form{
    background-color: white;
    width: 90%;
    /* border-style: groove; */
    /* border-radius: 2%; */
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
    width:80%;
    border:2px,solid,red;
    margin:auto;
    /* border-style: double;*/
}  
    .form-control{
      /* border-radius: 5px; */
      border: 3px solid rgb(11, 147, 226);
       width: 80%;
       margin:auto;

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

         
  @media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;margin-right:0px;
    }
}

  
</style>


<body class="main" class="w3-light-grey">

<br><br>

<!-- START OF PAGE FORM -->
    <form action="stafftwo.php" class="form w3-card-2 w3-center" data-aos="zoom-in">
        
  <div class="form-group">
    <h3>Enter Worker state</h3>

    
  <br>
  <br>
  <br>

     <!-- <select id="state" class="form-control "  name="staffstate" id="state" onclick="checkName()"> -->
     <input type="text" placeholder="eg.Rivers" id="state" class="form-control"  name="staffstate" required></input>

  </div>



  <br>
  <br>
  <br>


  <button class="btn btn-primary w3-center" type="submit" action="admin.php">Continue Registration</button>

  <br>
  <br>

    </form>
<!-- END OF PAGE FORM -->
</body>
</html>