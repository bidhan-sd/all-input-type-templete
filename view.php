<?php
	session_start();
	if(empty($_SESSION['userinfo'])){
        header ("Location: signin.php");
	}
	$userId = $_SESSION['userinfo']['userId'];
	require_once 'urlencryptor.php';

?>
<?php include 'inc/header.php'; ?>

	<div class="panel-heading">
		<h2 class="text-center">Student List</h2>
		<?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-bordered table-condensed">
			<thead>
				<tr>
					<th width="5%">Serial</th>
					<th width="15%">Name</th>
					<th width="15%">Email</th>
					<th width="10%">Country</th>
					<th width="10%">Gender</th>
					<th width="10%">Avatar</th>				
					<th width="20%">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$link = mysql_connect("localhost", "root", "");
				mysql_select_db("crud", $link);
				
				//User input
				$page    = isset($_GET['page']) ? (int)$_GET['page'] : 1;
				$perPage = isset($_GET['per-page']) &&  $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;

				//Positioning
				$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

				$sql = "SELECT * FROM addstudent WHERE userId='$userId' AND is_deleted='0' ORDER BY id DESC LIMIT {$start}, {$perPage}";
				$query   = mysql_query($sql, $link);
				//row count
				$rowQuery = "SELECT * FROM addstudent WHERE is_deleted = 0";
				$query1   = mysql_query($rowQuery, $link);
				$total     = mysql_num_rows($query1);
				$pages   = ceil($total / $perPage);
				
			?>
			<?php
				$i = 1;
				while($value = mysql_fetch_assoc($query))
				{
			?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['country']; ?></td>
					<td><?php echo $value['gender']; ?></td>
					<td><img src="<?php echo $value['image']; ?>" width="70px" height="40px" /></td>
					<td>
						<a class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $i; ?>">View</a>
						<?php 
							$id     = urlencode(encryptor('encrypt', $value['id']));
							$userId = urlencode(encryptor('encrypt', $value['userId']));
						?>
						<a class="btn btn-default btn-lg" href="edit.php?id=<?php echo $id;?>&userId=<?php echo $userId;?>">Edit</a>
						<a class="btn btn-danger btn-lg" href="delete.php?id=<?php echo $value['id'];?>&userId=<?php echo $value['userId'];?>" onclick="return confirm('After deleting data will be store into recycle bin ?')">Remove</a>
					</td>
					<!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $i; ?>" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Sutdent Indivisual information</h4>
								</div>
								<div class="modal-body">
									<label class="pull-right"><img width="150px" height="80px" src="<?php echo $value['image']; ?>"></label>
									<label> Name &nbsp;&nbsp;&nbsp; :</label><span> <?php echo $value['name']; ?> </span><br/>
									<label> Email &nbsp;&nbsp;&nbsp; : </label><span> <?php echo $value['email']; ?> </span><br/>
									<label> Website : </label><span> <?php echo $value['website']; ?> </span><br/>
									<label> Country : </label><span> <?php echo $value['country']; ?> </span><br/>
									<label> Subject : </label><span> <?php echo $value['subject']; ?> </span><br/>
									<label> Gender  : </label><span> <?php echo $value['gender']; ?> </span><br/>
									<span class="text-center"><label>Create Date :</label> </span> <?php echo $value['created_at']; ?>
									
									<span  class="pull-right">
										<a href="pdf.php">Save as pdf </a> || <a href="xl.php">Save as Xl </a>
									</span>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div> 
				</tr>
			<?php $i++; } ?>
			</tbody>
		</table>

		<?php if($pages > 0){ // This condition apply for if have no data for pagination ?>
			<ul class="pagination">
			   <li><a href="?page=1&per-page=5" aria-label="Previous"><span aria-hidden="true">First</span></a></li>
			    <?php  for($x = 1; $x <= $pages; $x++): ?>
			   		<li <?php if($page === $x) {echo 'class="active"' ; } ?> ><a href="?page=<?php echo $x ;?>&per-page=<?php echo $perPage; ?>" ><?php echo $x; ?></a></li>
				<?php endfor; ?>
			   <li><a href="?page=<?php echo $pages; ?>&per-page=5" aria-label="Previous"><span aria-hidden="true">Last</span></a></li>
			</ul>
		<?php } ?>
	</div>
<?php include 'inc/footer.php'; ?>