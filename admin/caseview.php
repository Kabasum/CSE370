<?php 
//require_once('session_login.php');
include('dbconnect.php');
include('header.php');

 ?>

 
<br />
<div class="container-fluid">
	<?php include('menubar.php');?>
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<div class="panel panel-success">
			<div class="panel panel-success">
			 	<div class="panel-heading">
			 		<h3 class="panel-title">
			 			Case List
			 		</h3>
			 	</div>
<div id="trans-table">
<table id="myTable-trans" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>S/N</th>
	        
	         <th>Case ID</th>
	        <th ><center>Catagory</center></th>
	        <th><center>Time </center></th>
	         <th><center>Police</center></th>
	        <th><center>Status</center></th>
	        <th><center>Description</center></th>
	    </tr>
	</thead>
    <tbody>
    	<?php
		// The serial number variable
		$sn=0;
		$query=mysqli_query($dbcon,"select * from case_table");
		while($row = mysqli_fetch_array($query)){
		$id = $row['case_id'];
		$status=$row['status'];
		$sn++;
		?>
		<tr>
       
        <td><?php echo $sn;?></td>
       
        <td><?php echo $row['case_id'];?></td> 
		<td><?php echo $row['catagory'];?></td>
		<td><?php echo $row['creating date']; ?></td> 
		<td><?php echo $row['pnid']; ?></td> 
		<td><?php echo $row['police']; ?></td>
			<td><?php echo $row['status']; ?></td>
		
		<td class="empty" width="">
			<a data-placement="left" title="Click to view" id="view<?php echo $id;?>" href="casedetails.php<?php echo '?id='.$id; ?>&status=<?php echo $row['status'] ?>" class="btn btn-success">Details<i class="icon-pencil icon-large"></i></a>
           
		
			
		</td>
		</tr>
	<?php } ?>    
    </tbody>
</table>
</div>
</div>

	</div>
	<div class="col-md-1"></div>
</div>


<?php include('scripts.php'); ?>


	

<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-trans').DataTable();
	});
</script>
</body>
</html>