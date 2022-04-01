<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include 'header.php' ;
?>



  <style>
	  
.table{
    font-size:12.7px;
}

@media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;margin-right:0px;
    }
}
  </style> 

<body class="main" class="w3-light-grey">

<br><br>
<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
      <div class="row">  
            <h4>Search:</h4>
 
<span><input type="search" class="cd-search table-filter form-control" data-table="order-table" style="width:100%" class="form-control" placeholder="search office terminals"></span>
</div>		
	</div>
    <br>
<a class="btn btn-block btn-sm btn-default btn-flat border-primary btn-primary" href="newbranch.php"><i class="fa fa-plus"></i> Add New</a>

		</div>
		<div class="card-body w3-responsive">

    <table class="table w3-table-all table-bordered cd-table order-table table" id="myTable" id="list">

				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup> -->
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Postal Code</th>
						<th>Office Adress</th>
						<th>Office  <br>City</th>
						<th>Office State</th>
						<th>Manager Contact</th>
            <th>Date <br>of <br>establishment</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM office_branch");
					while($row= $qry->fetch_assoc()):


?>
					<tr>
                     <td><b><?php echo $i++ ?></b></td>
                    <td><b><?php echo $row['branch_code'] ?></b></td>
						<!-- <td><b><?php echo $row['dfname']." ".$row['dlname']; ?></b></td> -->
						<td><b><?php echo $row['office_address'] ?></b></td>
						<td><b><?php echo $row['city'] ?></b></td>
						<td><b><?php echo $row['dstate'] ?></b></td>
                        <td><b><?php echo $row['contact'] ?></b></td>
                       
                        
                        <td><b>
                        <?php
                        $d=strtotime($row['date']);
                        echo date("l F d Y", $d);
                        ?></b></td>
                       
						<!-- <td><b><?php echo $row['dgender'] ?></b></td> -->

						<td class="text-center">
                          
                        <div class="btn-group"> 
							<button value="<?php echo $row['dstaffid']?>" name="name" class="btn btn-info btn-flat view_parcel"data-toggle="modal" data-target="#<?php echo $row['branch_code']?>"> <i class="fas fa-edit"></i> </button>
		                    <button type="button" class="btn btn-danger btn-flat"data-toggle="modal" data-target="#<?php echo $row['branch_code']?>del">
		                    <i class="fas fa-trash"></i>
		                    </button>
	                      </div>
						</td>
					</tr>	
					




                    
   
<!-- MODAL TO EDIT OFFICE INFORMATION -->
					<div class="modal fade" id="<?php echo $row['branch_code']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit office information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body w3-left-align w3-padding-large w3-border w3-round ">
	  <form action="officeback.php" id="form" method="GET">
        <div class="row">
          <div class="col-md-12">
            <div id="msg" class=""></div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Office Address</label>
                <textarea name="adress" id="" cols="30" rows="1" class="form-control"><?php echo $row['office_address'] ?></textarea>
                <!-- <p class=w3-text-red><?php echo $adressE ?></p> -->
              </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Office City</label>
                <textarea name="city" id="" cols="30" rows="1" class="form-control" disabled><?php echo $row['city'] ?></textarea>
                <!-- <p class=w3-text-red><?php echo $cityE ?></p> -->
                
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Office State</label>
                <textarea name="state" id="" cols="30" rows="1" class="form-control" value="" disabled><?php echo $row['dstate'] ?></textarea>
                <!-- <p class=w3-text-red><?php echo $stateE ?></p> -->

              </div>
              <div class="col-sm-6 form-group " style="display:none">
                <label for="" class="control-label">Zip Code/ Postal Code</label>
                <textarea name="branch_code" id="" cols="30" rows="1" class="form-control"><?php echo $row['branch_code'] ?></textarea>

              </div> 
              
              <div class="col-sm-6 form-group " style="display:none">
                <label for="" class="control-label">Zip Code/ Postal Code</label>
                <textarea name="city" id="" cols="30" rows="1" class="form-control"><?php echo $row['city'] ?></textarea>
                <!-- <p class=w3-text-red><?php echo $zip_codeE ?></p> -->

              </div>
            <!-- </div> -->

              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Contact #</label>
                <input type="tel" name="contact" class="form-control" value="<?php echo $row['contact'] ?>"></input>
                <!-- <p class=w3-text-red><?php echo $phonee ?></p> -->
                
              </div>
            </div>

          </div>
        </div>

        <div class="card-footer border-top border-info w3-blue ">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<button class="btn btn-flat bg-gradient-secondary mx-1 w3-text-white"data-dismiss="modal">Cancel</button>
        <button href="officeback.php?branch_code=<?php echo $row['branch_code']?>" class="btn btn-flat  bg-gradient-primary mx-2 w3-text-white" name="submit">Save</button>
      </div>
  	</div>
          </div>

    
<!--     
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> -->
      
      </form>
    </div>
     
    </div>
  </div>
</div>
</div>

<!-- MODAL TO DELETE AN OFFICE -->
<div id="<?php echo $row['branch_code']?>del" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete office</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
Are You Sure You Want to Delete this office all the staff in this branch will be set to pending</div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
        <a href="officeback.php?branch_code=<?php echo $row['branch_code']?>&name=<?php echo $row['branch_code'].", ". $row['office_address'].", ".$row['city']; ?>" class="btn btn-danger"> <i class="fas fa-check"></i> </a>
    </div>
</div>
  </div>
</div>

				<?php  endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="card-footer w3-center">
<div class="card-tools">
    
<span colspan="8" style="margin:auto">End Of List</span>

</div>
</div>

<script src="search.js"></script>

</body>
</html>