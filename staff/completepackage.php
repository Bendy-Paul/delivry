<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include 'header.php';
// include 'cancelpackage.php';
?>

<style>
     @media only screen and (max-width: 990px) {
    .main{
         margin-left:0px;margin-right:0px;
    }

}

.table{
    font-size:13px;
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
                
            <!-- SEARCH BAR -->
            <h4>Search:</h4>
 
<span><input type="search" class="cd-search table-filter form-control" data-table="order-table" style="width:100%" class="form-control" placeholder="search orders"></span>
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
						<th>Sender Name</th>
						<th>Sender Number</th>
						<th>Reciver Name</th>
						<th>Reciver Number</th>
						<th>Item Status</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody id="myMenu">
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM d_orders WHERE item_status='1'; ");
                    $status="";
					while($row= $qry->fetch_assoc()):
                        switch ($row['item_status'] ) {
                            case '1':
                                $status= "<span class='w3-center badge badge-info'>pending</span>";
                                break;
                            }
                        // echo print_r($row);
                        
?>


                         <!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->



					<tr>

                        <td><b><?php echo $row['tracking_number'] ?></b></td>
						<td><b><?php echo $row['sender_name']; ?></b></td>
						<td><b><?php echo $row['sender_number'] ?></b></td>
						<td><b><?php echo $row['reciver_name'] ?></b></td>
						<td><b><?php echo $row['reciver_number'] ?></b></td>
                        <!-- <td><b><?php echo $row['reciving_branch'] ?></b></td> -->
                        <td class="w3-center"><b><?php echo $status;?></b></td>
						<td class="text-center">
						<a href="updatepackage.php?tracking_number=<?php echo $row['tracking_number'] ?>" class="btn btn-secondary btn-flat"> <i class="fas fa-edit"></i></a>
		                   
	                      </div>
						</td>
					</tr>	
                    <!-- <--&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&- -->

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

</p>

<script src="../bootstrap4/js/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap4/js/popper.min.js"></script>
    <script src="../bootstrap4/js/bootstrap.js"></script>
    <script src="../bootstrap4/js/bootstrap.min.js"></script>    


<script src="search.js">
    (function() {
	'use strict';

var TableFilter = (function() {
 var Arr = Array.prototype;
		var input;
  
		function onInputEvent(e) {
			input = e.target;
			var table1 = document.getElementsByClassName(input.getAttribute('data-table'));
			Arr.forEach.call(table1, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, filter);
				});
			});
		}

		function filter(row) {
			var text = row.textContent.toLowerCase();
       //console.log(text);
      var val = input.value.toLowerCase();
      //console.log(val);
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = onInputEvent;
				});
			}
		};
 
	})();

  /*console.log(document.readyState);
	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
      console.log(document.readyState);
			TableFilter.init();
		}
	}); */
  
 TableFilter.init(); 
})();
</script>
</body>
</html>
