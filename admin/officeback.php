
<?php
include 'viewoffice.php';


            $zip_codeE=$city=$adress=$adressE=$phoneE=$phonee=$cityE="one";

            $error=false;
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
            
              $code=$_GET['branch_code'];           

   
            
              $qry4 = $conn->query("SELECT * FROM office_branch WHERE branch_code='$code'");
              $see=$qry4->fetch_assoc();

            echo $see['contact'];
            
              if (strlen($_GET['adress'])<1) {
                     $error=true;
                    $adressE="Address length is too short <br>";
                     }else {
                   $adress = clean($_GET["adress"]);
                   $check=$conn->query("SELECT * FROM office_branch WHERE office_address='$adress'");
                   if ($check->num_rows>0 && $adress != $see['office_address']) {
                     $error=true;
                    $adressE="Address has already been registered <br>";
                     $adress = clean(ucfirst($_GET["adress"]));
                   }
                 }
                
                
                 if (strlen($_GET['contact'])<1||strlen($_GET['contact'])>12||strlen($_GET['contact'])<10) {
                  $error=true;
                 $phoneE="Invalid Length For contact number <br>";
                  }else {
                    $contact = clean($_GET["contact"]);
                    $check=$conn->query("SELECT * FROM office_branch WHERE contact='$contact'");
                    if ($check->num_rows>0 && $contact!=$see['contact']) {
                      $error=true;
                     $phoneE="Contact Has Alreary Been Used By Another Office Branch <br>";
                      $contact = clean($_GET["contact"]);
                    }
                  }
            
          

              $zip_code = clean($_GET["branch_code"]);

              $city=$_GET["city"];





                      
                 
              if ($error == true) {
                ?>
                <div class="modal show" tabindex="1" style="display:block">
                <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <?php /*echo  $_GET["contact"]." ".$contact;*/?>

                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="w3-text-red"><?php echo $phoneE . $adressE. $error ?> </p>
                  </div>
                    <a href="viewoffice.php" style="width:70%;margin:auto" class="btn btn-danger" data-dismiss="modal">Close</a><br>
                  </div>
                </div>
                </div>
                <div class="modal-backdrop fade show"></div>
              <?php
              }
            }



            $qry = $conn->query("SELECT * FROM office_branch WHERE branch_code='$zip_code'");
            $bran= $qry->fetch_assoc();
  


            // $contact=$see['contact'];
                $brancho=$see['branch_code'].", ". $see['office_address'].", ".$see['city'];
            
                $branch=$zip_code.", ". $adress.", ".$city;
            
              $package =  $zip_code." - ". $adress." - ".$city." - ".$bran['dstate']." state ";
            
                // <?php echo  $zip_code." ".$see['branch_code'] ?>
            <?php
            
            if ($error==false && isset($_GET["submit"]) ) {

              $sql1=$conn->query("UPDATE d_orders SET sending_branch='$package'WHERE sending_branch_id= $zip_code ;");

              $sql2=$conn->query("UPDATE d_orders SET reciving_branch='$package'WHERE reciving_branch_id=$zip_code ;");
              
              $sql=$conn->query("UPDATE office_branch SET office_address='$adress', contact='$contact' WHERE branch_code='$zip_code'");
            
              $sql3=$conn->query("UPDATE dstaff SET dbranch='$branch'WHERE dbranch='$brancho';");
                   echo $code;                                      
            if ($sql) {
            ?>
            
            
            <div class="modal show" tabindex="1" style="display:block">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <p>Office information Has Been updated successfully <?php echo $package?></p>
            </div>
            <a href="viewoffice.php" style="width:70%;margin:auto" class="btn btn-success" data-dismiss="modal">Close</a><br>
            </div>
            </div>
            </div>
            <div class="modal-backdrop fade show"></div>
            <?php
            
            } }?>
            