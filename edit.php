<?php
	session_start();
	if(empty($_SESSION['userinfo'])){
        header ("Location: signin.php");
	}
	$userId = $_SESSION['userinfo']['userId'];

    if(isset($_GET['id']) && isset($_GET['userId'])){
        $id = $_GET['id'];
        $userId = $_GET['userId'];
    }
?>
<?php include 'inc/header.php'; ?>

<?php
    $link = mysql_connect("localhost", "root", "");
    mysql_select_db("crud", $link);
    $sql = "SELECT * FROM addstudent WHERE id='$id' && userId='$userId'";
    $query = mysql_query($sql, $link);
    $result =  mysql_fetch_assoc($query);
    



?>


<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Update Student Information <a class="btn btn-success pull-right" href="view.php">Back</a></h2>
	</div>
	<div class="panel-body">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input class="form-control" type="text" name="name" id="name" value="<?php echo $result['name']; ?>">
			</div>
			<div class="form-group">
				<label for="email">Student Email</label>
				<input class="form-control" type="email" name="email" id="email" value="<?php echo $result['email']; ?>">
			</div>			
			<div class="form-group">
				<label for="website">Website</label>
				<input class="form-control" type="website" name="website" id="website" value="<?php echo $result['website']; ?>">
			</div>
			<div class="form-group">
			  <label for="country">Select Country </label>
			  <select class="form-control" id="country" name="country">
			    <option>Select Country</option>
			    <option value="Bangladesh"  <?php if($result['country'] == "Bangladesh") echo "selected" ?> >Bangladesh</option>
			    <option value="India"  <?php if($result['country'] == "India") echo "selected" ?> >India</option>
			    <option value="Canada"  <?php if($result['country'] == "Canada") echo "selected" ?> >Canada</option>
			    <option value="Singapur"  <?php if($result['country'] == "Singapur") echo "selected" ?> >Singapur</option>
			    <option value="Australia"  <?php if($result['country'] == "Australia") echo "selected" ?> >Australia</option>
			  </select>
			</div>
			<div class="form-group">
				<label>Subject</label>
				<?php
                    $subArray = explode("," , $result['subject']);
                ?>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Bangla" <?php if(in_array("Bangla",$subArray)) echo "checked" ; ?> >Bangla</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="English" <?php if(in_array("English",$subArray)) echo "checked" ; ?> >English</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Mathematic" <?php if(in_array("Mathematic",$subArray)) echo "checked" ; ?> >Mathematic</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Physic" <?php if(in_array("Physic",$subArray)) echo "checked" ; ?> >Physic</label>
				<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="Computer" <?php if(in_array("Computer",$subArray)) echo "checked" ; ?> >Computer</label>
			</div>
			<div class="form-group">
				<label>Gender</label>
				<label class="radio-inline"><input type="radio" name="gender" value="Male"  <?php if($result['gender'] == "Male") echo "Checked" ?>>Male</label>
				<label class="radio-inline"><input type="radio" name="gender" value="Female" <?php if($result['gender'] == "Female") echo "Checked"; ?> />Female</label>
				<label class="radio-inline"><input type="radio" name="gender" value="Others" <?php if($result['gender'] == "Others") echo  "Checked"; ?>>Other</label>
			</div>
			<div class="form-group">				
				<label class="radio-inline"><img src="<?php echo $result['image']; ?>" width="100" width="100"></label><br/>
				<label>Previous avatar</label>
			</div>
			<div class="form-group">
				<label>Avatar</label>
				<label class="radio-inline"><input type="file" name="image"/></label>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="submit" value="Update">
				<input class="btn btn-primary" type="reset" name="reset" value="Reset">
			</div>			
		</form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>
