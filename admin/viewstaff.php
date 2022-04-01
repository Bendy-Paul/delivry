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
     @media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;margin-right:0px;
    }

}

.table{
    font-size:12.7px;
}
.modal{
    font-size:14.8px;
    float: left !important;

}
</style>

<body class="main" class="w3-light-grey">

<br><br>
<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
<div class="row">
  <h3>Search:</h3>
      <span><input type="search" class="cd-search table-filter form-control" data-table="order-table" style="width:100%" class="form-control" placeholder="search staff"></span>
</div>		
	</div>
    <br>
<a class="btn btn-block btn-sm btn-default btn-flat border-primary btn-primary" href="newpackage1.php"><i class="fa fa-plus"></i> Add New</a>

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
						<th>Staff</th>
						<!-- <th>Email</th> -->
						<th>State <br>of <br>operation</th>
						<!-- <th>Phone Number</th> -->
						<th>Position</th>
						<th>Office <br>Branch</th>
                        <!-- <th>Staff ID</th> -->
                        <!-- <th>Gender</th> -->
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM dstaff WHERE dwork='Worker' ORDER BY dstate ASC; ");
					while($row= $qry->fetch_assoc()):

?>





					<tr>
                    <td><b><?php echo $row['dstaffid'] ?></b></td>
						<td><b><?php echo $row['dfname']." ".$row['dlname']; ?></b></td>
						<!-- <td><b><?php echo $row['demail'] ?></b></td> -->
						<td><b><?php echo $row['dstate'] ?></b></td>
						<!-- <td><b><?php echo $row['dphone'] ?></b></td> -->
                        <td><b><?php echo $row['dstatus'] ?></b></td>
                        <td><b><?php echo $row['dbranch'] ?></b></td>
						<!-- <td><b><?php echo $row['dgender'] ?></b></td> -->

						<td class="text-center">
                          
                        <div class="btn-group"> <button value="<?php echo $row['dstaffid']?>" name="name" class="btn btn-info btn-flat view_parcel" data-toggle="modal" data-target="#<?php echo $row['dstaffid']?>"> <i class="fas fa-eye"></i> </button>
						<a href="updatestaff.php?staffvalue=<?php echo $row['dstaffid'] ?>" class="btn btn-secondary btn-flat"> <i class="fas fa-edit"></i></a>
		                    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#<?php echo $row['dstaffid']."2"?>">
		                    <i class="fas fa-trash"></i>
		                    </button>
	                      </div>
						</td>
					</tr>	

          <tr>
            <td style="colspan=12;display:none" class="display">there is no data</td>
          </tr>
					

          <script src="search.js"></script>





          <!-- MODAL TO VIEW STAFF INFORMATION -->
					<div class="modal fade" id="<?php echo $row['dstaffid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Staff Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body w3-left-align w3-padding-large w3-border w3-round ">
      <div class="w3-card-2 card-primary  w3-padding-large w3-round w3-leftbar w3-border-blue"><h3><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-blue"></i><?php     echo $row['dfname']." ".$row['dlname']; ?></h3></div><br>
      
      <div class="w3-card-2 card-primary  w3-padding-large  w3-border w3-round w3-leftbar w3-border-blue ">
      <p><i class="fa  fa-address-card fa-fw fa-lg w3-margin-right w3-text-blue"></i><?php echo $row['dstaffid']?></p>

      <hr style="width:100%;">


    <p><i class="fa fa-map-marked-alt fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $row['dstate']?></p><hr style="width:100%;">

    <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $row['dphone']?></p><hr style="width:100%;">

    <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $row['dstatus']?></p><hr style="width:100%;">

    <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $row['demail']?></p><hr style="width:100%;">

    <p><i class="fa fa-map-marker-alt fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $row['dbranch']?></p><hr style="width:100%;">

    <p><i class="fa fa-venus-mars fa-fw w3-margin-right w3-large w3-text-blue"></i><?php echo $row['dgender']?></p><hr style="width:100%;">




    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>



<!-- MODAL TO DELETE STAFF -->
<div class="modal fade" id="<?php echo $row['dstaffid']."2" ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			Are You Sure You Want to Delete This Staff you Will Not Be Able To Acsess There Data Again</div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
        <a href="deletestaff.php?staffid=<?php echo $row['dstaffid'] ?>" class="btn btn-danger"> <i class="fas fa-check"></i> </a>
      </div>
    </div>
  </div>
</div>



				<?php endwhile; ?>
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

<style>
	.modal{
		float:left !important;
	}
</style>
</body>
</html>
