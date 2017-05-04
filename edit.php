<?php include 'inc/header.php'; ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Update Student Information <a class="btn btn-success pull-right" href="view.php">Back</a></h2>
	</div>
	<div class="panel-body">
		<form action="" method="POST">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input class="form-control" type="text" name="name" id="name" value="Bidhan Sutradhar">
			</div>
			<div class="form-group">
				<label for="email">Student Email</label>
				<input class="form-control" type="email" name="email" id="email" value="Bidhan@gmail.com">
			</div>			
			<div class="form-group">
				<label for="website">Website</label>
				<input class="form-control" type="website" name="website" id="website" value="http://www.imbidhan.com">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input class="form-control" type="password" name="password" id="password" value="12345">
			</div>
			<div class="form-group">
			  <label for="country">Select Country </label>
			  <select class="form-control" id="country" name="country">
			    <option>Select Country</option>
			    <option selected="selected">Bangladesh</option>
			    <option>India</option>
			    <option>Canada</option>
			    <option>Singapur</option>
			    <option>Australia</option>
			  </select>
			</div>
			<div class="form-group">
				<label>Subject</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Bangla" checked="checked">Ban</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Mathematic" checked="checked">Math</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="English" checked="checked">Eng</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Physic" checked="checked">Phy</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Computer Science" checked="checked">Cse</label>
			</div>
			<div class="form-group">
				<label>Gender</label>
				<label class="radio-inline"><input type="radio" name="gender" value="Male" checked="checked">Male</label>
				<label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
				<label class="radio-inline"><input type="radio" name="gender" value="others">Other</label>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="submit" value="Update">

			</div>
			<span class="text-center">Last Update </span> <label>10/10/2010</label>
		</form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>
