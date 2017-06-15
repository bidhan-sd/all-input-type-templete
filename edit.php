<?php
	session_start();
	if(empty($_SESSION['userinfo'])){
        header ("Location: signin.php");
	}
	$userId = $_SESSION['userinfo']['userId'];

?>
<?php include 'inc/header.php'; ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Update Student Information <a class="btn btn-success pull-right" href="view.php">Back</a></h2>
	</div>
	<div class="panel-body">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input class="form-control" type="text" name="name" id="name">
			</div>
			<div class="form-group">
				<label for="email">Student Email</label>
				<input class="form-control" type="email" name="email" id="email">
			</div>			
			<div class="form-group">
				<label for="website">Website</label>
				<input class="form-control" type="website" name="website" id="website">
			</div>
			<div class="form-group">
			  <label for="country">Select Country </label>
			  <select class="form-control" id="country" name="country">
			    <option>Select Country</option>
			    <option value="Bangladesh">Bangladesh</option>
			    <option value="India">India</option>
			    <option value="Canada">Canada</option>
			    <option value="Singapur">Singapur</option>
			    <option value="Australia">Australia</option>
			  </select>
			</div>
			<div class="form-group">
				<label>Subject</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Bangla">Bangla</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="English">English</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Mathematic">Mathematic</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Physic">Physic</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Computer">Computer</label>
			</div>
			<div class="form-group">
				<label>Gender</label>
				<label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
				<label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
				<label class="radio-inline"><input type="radio" name="gender" value="others">Other</label>
			</div>
			<div class="form-group">
				<label>Avatar</label>
				<label class="radio-inline"><input type="file" name="image"/></label>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="submit" value="Add Student">
				<input class="btn btn-primary" type="reset" name="reset" value="Reset Data">
			</div>			
		</form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>
