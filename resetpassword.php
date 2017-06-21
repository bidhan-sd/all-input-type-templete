<?php 

	if(isset($_GET['email']) && isset($_GET['userId']) && isset($_GET['passwordtoken']) ){
	    session_start();
	    // Verify data
	    mysql_connect("localhost", "root", "") or die(mysql_error());
	    mysql_select_db("crud") or die(mysql_error());
	    
	    $email    = filter_var($_GET['email'], FILTER_SANITIZE_STRING);
	    $userId   = filter_var($_GET['userId'], FILTER_SANITIZE_STRING);
	    $passwordtoken   = filter_var($_GET['passwordtoken'], FILTER_SANITIZE_STRING);
	    
	    $email    = mysql_escape_string($_GET['email']);
	    $userId   = mysql_escape_string($_GET['userId']);
	    $passwordtoken   = mysql_escape_string($_GET['passwordtoken']);
	    
        $sql =  "SELECT * FROM users WHERE email='$email' AND userId='$userId' AND active=1 AND passwordToken='$passwordtoken'";
	    $search = mysql_query($sql) or die(mysql_error());
	    $result = mysql_fetch_assoc($search);

	    if($result['email'] === $email && $result['userId'] === $userId && $result['passwordToken'] === $passwordtoken){

    	 ?>
		<?php 
			include_once 'inc/admin/header.php';
			//Change Password dynamic code.
			if(isset($_POST['changepassword'])){

				$error = '';
		        $success = '';

		        $email = $_POST['email'];
		        $userId = $_POST['userId'];
		        $passwordtoken = $_POST['passwordtoken'];

				if(empty($_POST['newpassword']) || empty($_POST['confirmpassword']) ){
					$error = "<span style='color:red;font-weight:bold'>Require field can't be empty...</span>";
		        }else{
		        	if(strlen($_POST['newpassword']) > 8 || strlen($_POST['confirmpassword']) > 8){
		        		if($_POST['newpassword'] == $_POST['confirmpassword']){

		        			$hass_password = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
		        			mysql_connect("localhost", "root", "") or die(mysql_error());
	    					mysql_select_db("crud") or die(mysql_error());
		        			$sql = "UPDATE `users` SET `password`='$hass_password', `passwordToken`='' WHERE userId='$userId' AND email = '$email' AND passwordToken = '$passwordtoken'";		        			
							$result = mysql_query($sql);
							if($result){
								session_start();
								$_SESSION['message'] = "<span style='color:green;font-weight:bold'>Your password is reset now you can login by new password.</span>";
								header("location: signin.php");
							}
		        		}else{
							$error = "<span style='color:red;font-weight:bold'>New password and Conform password dosen't match.</span>";
						}
		        	}else{
						$error = "<span style='color:red;font-weight:bold'>Password must be given 8 character.</span>";
					}
		        }

			}

		?>
		<?php 
			if(isset($success)){ echo $success; }
			if(isset($error)){ echo $error; }
	    ?>
		<form class="form-horizontal" action="" method="POST">

		<input type="hidden" name="email" value="<?php echo $email; ?>" />
		<input type="hidden" name="userId" value="<?php echo $userId; ?>" />
		<input type="hidden" name="passwordtoken" value="<?php echo $passwordtoken; ?>" />

			<div class="form-group">
				<label for="email" class="control-label">New Password</label>						
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
					<input type="password" class="form-control" name="newpassword" placeholder="Enter new passwrod"/>
				</div>						
			</div>
			<div class="form-group">
				<label for="email" class="control-label">Confirm Password</label>						
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
					<input type="password" class="form-control" name="confirmpassword" placeholder="Enter confirm passwrod"/>
				</div>						
			</div>
			<div class="form-group ">
				<input class="btn btn-primary btn-block login-button" type="submit" name="changepassword" value="Change Password">
			</div>
		</form>

		<?php 

		include_once 'inc/admin/footer.php'; 

	    }else{
    		$_SESSION['message'] = "<span style='color:red;font-weight:bold'>You given invlaid url!</span> ";
    	    header("location:signin.php");
	    }
	}else{
		session_start();
		header("Location: 404.php");
	}


?>