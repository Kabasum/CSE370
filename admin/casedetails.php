<?php 
 $get_id = $_GET['id']; 
 $status = $_GET['status']; 
 require_once('dbconnect.php');
 include('header.php');

?>

<div class="container-fluid">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		
	
</div>

<div class="container-fluid">
	<?php include('menubar.php') ?>
	<div class="col-md-2"></div>
	<div class="col-md-8">

		<a href="investigation.php<?php echo '?edit='.$get_id; ?>"  class="btn btn-info" style="margin-bottom:20px"><i class="icon-print icon-large"></i> Investigation Statement</a>

		<a href="assigncase.php<?php echo '?caseid='.$get_id; ?>"  class="btn btn-info" style="margin-bottom:20px"><i class="icon-print icon-large"></i> <?php if($status=='' or $status=='Not Yet' ){echo 'Assign This Case to CID Officer';} else{echo 'Change CID Officer';}?></a>
		</script>
		<div class="panel panel-success" id="outprint">
			<div class="panel panel-success">
			 	<div class="panel-heading">
			 		<h3 class="panel-title">Case Details</h3>
			 	</div>
			<div class="panel-body">
			 <br />
			
			 <div class="panel panel-success">
			 	<div class="panel-heading">
			 		
			 		<h3 class="panel-title"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Case File</h3>
			 	</div>
			 	<div class="panel-body">
			 		<?php
			 		$query=mysqli_query($dbcon,"select * from complainant where case_id='$get_id'");
		while($row = mysqli_fetch_array($query)){
			?>
			 			 <table class="table">
			 			 	<tr>
			 			 		<td>Case ID:</td><td><?php echo $get_id?></td>
			 			 	</tr>
			 			 	<tr>
			 			 		<td>Name:</td><td><?php echo $row['comp_name']?></td>
			 			 	</tr>
			 			 	<tr>
			 			 		<td>Gender:</td><td><?php echo $row['gender']?></td>
			 			 	</tr>
			 			 	<tr>
			 			 		<td>Age:</td><td><?php echo $row['age']?></td>
			 			 	</tr>
			 			 	
			 			 	<tr>
			 			 		<td>Victim ID:</td><td><?php echo $row['Vctim ID']?></td>
			 			 	</tr>
			 			 	<tr>
			 			 		<td>Phone:</td><td><?php echo $row['Phone number']?></td>
			 			 	</tr>
			 			 	
			 			 	<tr>
			 			 		<td>Crime Location:</td><td><?php echo $row['loc']?></td>
			 			 	</tr>
			 			 	
			 			 	
			 			 <?php
			 			 }
			 			 ?>
			 			 	
			 			 </table>
			 			
			 	</div>
			 </div>

			 <div class="panel panel-success">
			 	<div class="panel-heading">
			 		<h3 class="panel-title">
			 			
			 		Case Details</h3>
			 	</div>
			 	<div class="panel-body">
			 		<table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
							    <tr>
							    	<th>
							        	<center>
							       			Catagory
							        	</center> 
							        </th>
							        <th>
							        	<center>
							       			Description
							        	</center> 
							        </th>
							        <th>
							        	<center>
							        		Time 
							        	</center>
						        	</th>
							       
						        	<th>
							        	<center>
							        		Police
							        	</center>
						        	</th>
						        	 <th>
							        	<center>
							        		Status
							        	</center>
						        	</th>
							    </tr>
							</thead>
						    <tbody>
						    	<?php
						    	$sn=0;
			 		$query=mysqli_query($dbcon,"select * from case_table where case_id='$get_id'");
		while($row = mysqli_fetch_array($query)){
			$sn++;
			?>
						    	<tr><td><?php echo $row['catagory']?></td>
						    		<td><?php echo $row['description']?></td>
						    		<td><?php echo $row['created date']?></td>
						    		
						    		<td><?php echo $row['pnid']?></td>
						    		<td><?php echo $row['police']?></td>
						    		<td><?php echo $row['status']?></td>
						    		
						    	</tr>
<?php }
?>
</tbody>
						</table>

</div>
			 </div>
				
			 	
			 	</div>
			 </div>
				
						    
						   
				
			</div>
		</div>
	</div>
	<center>
		<a href="caseview.php" class="btn btn-success">Return Home
			<span class="glyphicon glyphicon-backward" aria-hidden="true"></span>
		</a>
	</center>
	<div class="col-md-2"></div>
</div>

<?php include('scripts.php') ?>


<script type="text/javascript">

    function window_print(){
		var _head = $('head').clone();
		var _p = $('#outprint').clone();
		var _html = $('<div>')
		_html.append("<head>"+_head.html()+"</head>")
		_html.append("<h3 class='text-center'>CRIME RECORDS MANAGEMENT SYSTEM</h3>")
		_html.append(_p)
		console.log(_html.html())
		var nw = window.open("","_blank","width:900;height:800")
			nw.document.write(_html.html())
			nw.document.close()
			nw.print()
			setTimeout(() => {
				nw.close()
			}, 500);
	}
	</script>
</body>
</html>

