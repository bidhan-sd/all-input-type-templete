<?php
	session_start();
	if(empty($_SESSION['userinfo'])){
        header ("Location: signin.php");
	}
	$userId = $_SESSION['userinfo']['userId'];
    require_once 'urlencryptor.php';

    if(isset($_GET['id']) && isset($_GET['userId'])){        
        $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
        $id = mysql_real_escape_string($id);
        $id = htmlspecialchars($id, ENT_IGNORE, 'utf-8');//The htmlspecialchars() function converts some predefined characters to HTML entities.
        $id = strip_tags($id);//The strip_tags() function strips a string from HTML, XML, and PHP tags.
        $id = stripslashes($id);//Remove the backslash:
        
        $userId = filter_var($_GET['userId'], FILTER_SANITIZE_STRING);//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
        $userId = mysql_real_escape_string($userId);
        $userId = htmlspecialchars($userId, ENT_IGNORE, 'utf-8');//The htmlspecialchars() function converts some predefined characters to HTML entities.
        $userId = strip_tags($userId);//The strip_tags() function strips a string from HTML, XML, and PHP tags.
        $userId = stripslashes($userId);//Remove the backslash:

        $id = urldecode($id);
        $id = encryptor('decrypt', $id);
        $userId = urldecode($userId);
        $userId = encryptor('decrypt', $userId);
        $link = mysql_connect("localhost", "root", "");
                mysql_select_db("crud", $link);
        $sql = "SELECT * FROM addstudent WHERE id='$id' AND userId='$userId'";
        $query   = mysql_query($sql, $link);
        $total     = mysql_num_rows($query);
        if(!$total > 0){
            header("location: 404.php");
        }
        
    }     
?>
<?php
    if(isset($_POST['update'])){
        $error = '';
        $success = '';
        $name     = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $website  = filter_var($_POST['website'], FILTER_SANITIZE_URL);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "<span style='color:red;font-weight:bold'>Email address Invalid.</span>";
        }else{
            if(!filter_var($website, FILTER_VALIDATE_URL)){
                $error = "<span style='color:red;font-weight:bold'>Website address Invalid.</span>";
            }else{
                if(!$_FILES['image']['name']){
                    $link = mysql_connect("localhost", "root", "");
                    mysql_select_db("crud", $link);

                    $name     = mysql_real_escape_string($name, $link);
                    $email    = mysql_real_escape_string($email, $link);
                    $website  = mysql_real_escape_string($website, $link);
                    $country  = $_POST['country'];
                    $subjects = implode(",",$_POST['subject']);
                    $gender   = $_POST['gender'];
                    $udate     = date('Y-m-d');
                    $id       = $_POST['id'];
                    $userId   = $_POST['userId'];

                    $sql = "UPDATE `addstudent` SET `name`='$name',`email`='$email',`website`='$website',`country`='$country',`subject`='$subjects',`gender`='$gender',`updated_at`='$udate' WHERE id = '$id' AND userId='$userId' ";
                    $result = mysql_query($sql);
                    if($result){
                        $error = "<span style='color:green;font-weight:bold'>Student info updated Successflly.</span>";
                    }else{
                        $error = "<span style='color:red;font-weight:bold'>Updated Failed.</span>";
                    }
                }else{
                    $allowed      =  array('gif','png' ,'jpg');
                    $filename     = $_FILES['image']['name'];
                    $templocation = $_FILES['image']['tmp_name'];
                    $filesize     = $_FILES['image']['size'];
                    $filekb       = ceil($filesize/1024);

                    $ext            = pathinfo($filename, PATHINFO_EXTENSION);//Find out File extension
                    $fileformate    = strtolower($ext);
                    $unique_image   = substr(md5(time()), 0, 10).'.'.$fileformate;
                    $uploaded_image = "uploads/".$unique_image;

                    if(!in_array($fileformate,$allowed) ) {
                        $error = "<span style='color:red;font-weight:bold'>Image format must be jpg,png,gif,jpeg.</span>";
                    }else{
                        if($filekb > 1048576){//1048576 == 2mb
                            $error = "<span style='color:red;font-weight:bold'>File size must be content within 2 mb.</span>";
                        }else{

                            $link = mysql_connect("localhost", "root", "");
                            mysql_select_db("crud", $link);

                            $name     = mysql_real_escape_string($name, $link);
                            $email    = mysql_real_escape_string($email, $link);
                            $website  = mysql_real_escape_string($website, $link);
                            $country  = $_POST['country'];
                            $subjects = implode(",",$_POST['subject']);
                            $gender   = $_POST['gender'];
                            $udate     = date('Y-m-d');
                            $id       = $_POST['id'];
                            $userId   = $_POST['userId'];
                            
                            $privousImage = $_POST['previousimage'];
                            unlink($privousImage);
                            move_uploaded_file($templocation, $uploaded_image);
                            $sql = "UPDATE `addstudent` SET `name`='$name',`email`='$email',`website`='$website',`country`='$country',`subject`='$subjects',`gender`='$gender',`image` ='$uploaded_image',`updated_at`='$udate' WHERE id = '$id' AND userId='$userId' ";

                            $result = mysql_query($sql);
                            if($result){
                                $error = "<span style='color:green;font-weight:bold'>Student info updated Successflly.</span>";
                            }else{
                                $error = "<span style='color:red;font-weight:bold'>Updated Failed.</span>";
                            }
                            
                        }
                    }
                }
            }
        }
    }
?>

<?php
    $link = mysql_connect("localhost", "root", "");
    mysql_select_db("crud", $link);
    $sql = "SELECT * FROM addstudent WHERE id='$id' && userId='$userId'";
    $query = mysql_query($sql, $link);
    $result =  mysql_fetch_assoc($query);
?>

<?php include 'inc/header.php'; ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Update Student Information <a class="btn btn-success pull-right" href="view.php">Back</a></h2>
		<?php 
            if(isset($success)){ echo $success; }
            if(isset($error)){ echo $error; }
        ?>
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
				<label class="radio-inline"><input type="radio" name="gender" value="others" <?php if($result['gender'] == "others") echo  "Checked"; ?>>Other</label>
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
				<input class="btn btn-primary" type="submit" name="update" value="Update">
				<input class="btn btn-primary" type="reset" name="reset" value="Reset">
				<input type="hidden" name="id" value="<?php echo $result['id']; ?>">		
			    <input type="hidden" name="userId" value="<?php echo $result['userId']; ?>">
			    <input type="hidden" name="previousimage" value="<?php echo $result['image']; ?>">
			</div>
					
		</form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>
