 <!DOCTYPE html>
<html>

<title>Delivery Website</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head></head>

   
<?php  

include 'header.php';

?>
<style>
  #nothero {
    width: 98%;
    height: 50vh;
    margin:auto;
    background: url(../delivery4.jpg) top center;
    background-size: cover;
    position: relative;
}

.small-box {
    border-radius: 0.25rem;
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    display: block;
    margin-bottom: 20px;
    position: relative;
    text-align:justify;
    
}

.small-box .icon>i.fa, .small-box .icon>i.fab, .small-box .icon>i.fad, .small-box .icon>i.fal, .small-box .icon>i.far, .small-box .icon>i.fas, .small-box .icon>i.ion {
    font-size: 70px;
    top: 20px;
}
.small-box .icon>i {
    font-size: 90px;
    position: absolute;
    right: 15px;
    top: 15px;
    opacity: 0.6;
    transition: transform .3s linear;
}


.main{
        margin-left:300px ;margin-right:5px;
        margin-top:40px;
        font-family: "Verdana", sans-serif;
        
}
       } 

     
@media (max-width: 990px){
.small-box .icon {
    display: none;
    margin:auto;
}
.small-box{
  margin-left:auto;
  margin-right:auto;
  width:100%;
  text-align:center;

}

.main{
         margin-left:0px;
         margin-right:0px;
         margin-top:50px;

    }
    .btm{
      left:0rem;
      width:100%;
    }
}

    
@media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;margin-right:0px;
    }
}
</style>

<body class="main">
    <!-- <form class="d-flex">
      <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav> -->


<!-- Top me
<!-- Overlay effect when opening sidebar on small screens -->
<!-- <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div> -->


<!-- WELCOME HEADER -->

<section  id="nothero" class="d-flex justify-content-center align-items-center w3-text-ingigo">
    <div class="container position-relative sub-head" data-aos="zoom-in" data-aos-delay="100">
    <div class="w3-container w3-text-indigo" id="showcase" data-aos="fade-up">
    <h1><b>Welcome <?php echo $_SESSION['adname']." ".$_SESSION['adlast'];?></b></h1>
    <br>
    <p class="sub-head">Email: <?php echo $_SESSION['ademail']?></p>
    <hr style="width:50px;border:2px solid ;" class="w3-round">

    <p class="sub-head">Staff ID: <?php echo $_SESSION['adminid']?></p>
    <hr style="width:50px;border:2px solid " class="w3-round">
  </div>
    </div>
  </section>

<!-- END OF WELCOME HEADER   -->

  
      </div>
      </div>
  </div>

    <br>
    <br>
    <br>


    <!-- COMPANY INFORMATION -->
    
    <div class="row w3-text-indigo w3-container" data-aos="fade-buttom">
    
    <h1 class="w3-text-indigo"><b>Company info</b></h1>
    <hr class="w3-round">

    <div class="row w3-center">

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
    

    <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  shadow-sm border">
              <div class="inner">
                <h1> <?php echo $conn->query("SELECT * FROM office_branch")->num_rows; ?></h1>

                <p>Total Branches</p>
              </div>
              <div class="icon">
                <i class="fa fa-building"></i>
                <br>
              </div>
            </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

          </div> <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  shadow-sm border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM delivery_trucks")->num_rows; ?></h1>

                <p>Total Delivery Trucks</p>
              </div>
              <div class="icon">
                <i class="fa fa-truck"></i>
                <br>
              </div>
            </div>
          </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

          <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  shadow-sm border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM dproject WHERE dstatus='Registered'")->num_rows; ?></h1>

                <p>Total Customers</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
                <br>
              </div>
            </div>
          </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

          <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo shadow-sm border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders")->num_rows ?></h1>

                <p>Total Parcels</p>
              </div>
              <div class="icon">
                <i class="fa fa-box"></i>
                <br>
              </div>
            </div>
          </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

           <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo shadow-sm border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM dstaff WHERE dwork='Worker'")->num_rows; ?></h1>

                <p>Total Staff</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
                <br>
              </div>
            </div>
          </div>
          
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

</div>

<!-- END OF COMPANY INFORMATION -->
<div class="row">
<h1 class="w3-text-indigo"><b>Package info</b></h1>
          <hr class="w3-round">


<!-- PACKAGE INFORMATION -->
          

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


          <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE item_status='1'")->num_rows; ?></h1>

                <p>Item Pending</p>
              </div>
              <div class="icon">
                <i class="fa fa-undo-alt"></i>
                <br>
              </div>
            </div>
          </div>
          
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
          
          <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo  border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE item_status='2'")->num_rows; ?></h1>

                <p>Item Accepted by Courier</p>
              </div>
              <div class="icon">
                <i class="fa fa-warehouse"></i>
                <br>
              </div>
            </div>
          </div>
          
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
          

                      <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE item_status='3'")->num_rows; ?></h1>

                <p>Shipped</p>
              </div>
              <div class="icon">
                <i class="fa fa-route"></i>
                <br>
              </div>
            </div>
          </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


                      <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE item_status='4'")->num_rows; ?></h1>

                <p>In-Transit</p>
              </div>
              <div class="icon">
                <i class="fa fa-clipboard-list"></i>
                <br>
              </div>
            </div>
          </div>
          
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
          
          
          <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE item_status='5'")->num_rows; ?></h1>

                <p>Out To pickup Station</p>
              </div>
              <div class="icon">
                <i class="fa fa-shipping-fast"></i>
                <br>
              </div>
            </div>
          </div>

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


                      <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE item_status='6'")->num_rows; ?></h1>

                <p>Arrived At Pickup Station</p>
              </div>
              <div class="icon">
                <i class="fa fa-clipboard-check"></i>
                <br>
              </div>
            </div>
          </div>


            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

                     
                      <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE item_status='7'")->num_rows; ?></h1>

                <p>Ready to Pickup</p>
              </div>
              <div class="icon">
                <i class="fa fa-box"></i>
                <br>
              </div>
            </div>
          </div>


            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->


                      <div class="col-12 col-sm-6 col-md-4 w3-text-white">
            <div class="small-box w3-indigo border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE item_status='8'")->num_rows; ?></h1>

                <p>Picked-up</p>
              </div>
              <div class="icon">
                <i class="fa fa-box-open"></i>
                <br>
              </div>
            </div>
          </div>
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
         
                  </div>

      </div>

      </div>
      <!-- END OF PACKAGE INFORMATION -->
  <br>
  <br>

  <div class="row" style="width:100%">
    

  <!-- UNSUCCESSFULL PACKAGES -->

            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  <div class="col-sm-6 col-md-4 w3-text-white" style="width:50%">
            <div class="small-box w3-red border">
              <div class="inner">
                <h1><?php echo $conn->query("SELECT * FROM d_orders WHERE item_status='9'")->num_rows; ?></h1>

                <p>Unsuccessfull Delivery</p>
              </div>
              <div class="icon">
                <i class="fa fa-times"></i>
                <br>
              </div>
            </div>
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

<!-- SUCCESSFULL PACKAGES -->


          </div>  <div class="col-sm-6 col-md-4 w3-text-white" style="width:50%">
            <div class="small-box w3-green border">
              <div class="inner">
                <h1><?php 
                $picked_up=$conn->query("SELECT * FROM d_orders WHERE item_status='8'")->num_rows;
                echo $picked_up ?></h1>
                <p>Successfull Delivery</p>
              </div>
              <div class="icon">
                <i class="fa fa-box-open"></i>
                <br>
              </div>
            </div>
          </div>
            <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

  </div>
  <!-- Contact -->
<!-- End page content -->
</div>

<!-- W3.CSS Container -->




<script>

</script>


</body>
</html>
