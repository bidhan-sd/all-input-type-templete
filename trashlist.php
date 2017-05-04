<?php include 'inc/header.php'; ?>
	<div class="panel-heading">
		<h2 class="text-center">Trashlist List </h2>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<tr>
				<th>Serial</th>
				<th>Name</th>
				<th>Email</th>
				<th>Subject</th>
				<th>Action</th>
			</tr>
			<tr>
				<td width="10px">01</td>
				<td width="10px">Bidhan sutradhar</td>
				<td width="10px">Bidhanvk@gmail.com</td>
				<td width="10px">Mathematic, Bangla, Engilish</td>
				<td width="10px">
					<a class="btn btn-info" data-toggle="modal" data-target="#myModal">View</a>
					<a class="btn btn-default" href="restore.php">Restore</a>
					<a class="btn btn-danger" href="deleteforever.php?id=1" onclick="return confirm('Are you sure to delete forever ?')">Delete forever</a>
				</td>
			</tr>
			<tr>
				<td width="10px">01</td>
				<td width="10px">Bidhan sutradhar</td>
				<td width="10px">Bidhanvk@gmail.com</td>
				<td width="10px">Mathematic, Bangla, Engilish</td>
				<td width="10px">
					<a class="btn btn-info" data-toggle="modal" data-target="#myModal">View</a>
					<a class="btn btn-default" href="restore.php">Restore</a>
					<a class="btn btn-danger" href="deleteforever.php?id=1" onclick="return confirm('Are you sure to delete forever ?')">Delete forever</a>
				</td>
			</tr>
			<tr>
				<td width="10px">01</td>
				<td width="10px">Bidhan sutradhar</td>
				<td width="10px">Bidhanvk@gmail.com</td>
				<td width="10px">Mathematic, Bangla, Engilish</td>
				<td width="10px">
					<a class="btn btn-info" data-toggle="modal" data-target="#myModal">View</a>
					<a class="btn btn-default" href="restore.php">Restore</a>
					<a class="btn btn-danger" href="deleteforever.php?id=1" onclick="return confirm('Are you sure to delete forever ?')">Delete forever</a>
				</td>
			</tr>
			<tr>
				<td width="10px">01</td>
				<td width="10px">Bidhan sutradhar</td>
				<td width="10px">Bidhanvk@gmail.com</td>
				<td width="10px">Mathematic, Bangla, Engilish</td>
				<td width="10px">
					<a class="btn btn-info" data-toggle="modal" data-target="#myModal">View</a>
					<a class="btn btn-default" href="restore.php">Restore</a>
					<a class="btn btn-danger" href="deleteforever.php?id=1" onclick="return confirm('Are you sure to delete forever ?')">Delete forever</a>
				</td>
			</tr>
		</table>
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Sutdent Indivisual information</h4>
					</div>
					<div class="modal-body">
						<label> Name &nbsp;&nbsp;&nbsp; :</label><span> Bidhan Sutradhar </span><br/>
						<label> Email &nbsp;&nbsp;&nbsp; : </label><span> bidhanvk@gmail.com </span><br/>
						<label> Website : </label><span> http://www.imbidhan.com </span><br/>
						<label> Country : </label><span> Bangladesh </span><br/>
						<label> Subject : </label><span> Computer </span><br/>
						<label> Gender  : </label><span> Male </span><br/>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div> 
		<ul class="pagination">
		   <li><a href="#" aria-label="Previous"><span aria-hidden="true">First</span></a></li>
		   <li><a href="#">1</a></li>
		   <li><a href="#">2</a></li>
		   <li><a href="#">3</a></li>
		   <li><a href="#">4</a></li>
		   <li><a href="#">5</a></li>
		   <li><a href="#" aria-label="Previous"><span aria-hidden="true">Next</span></a></li>
		</ul>
	</div>
<?php include 'inc/footer.php'; ?>