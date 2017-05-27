<?php 
	session_start();
    if(isset($_POST['registation'])){
        $error = '';
        $success = '';

        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirm_password']) || empty($_POST['captchacode']) ){
			$error = "<span style='color:red;font-weight:bold'>Require field can't be empty...</span>";
        }else{

        	$name     = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        	$email    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

        	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$error = "<span style='color:red;font-weight:bold'>Email address Invalid.</span>";
        	}else{
				if ($username == trim($username) && strpos($username, ' ') == true) {
				    $error = "<span style='color:red;font-weight:bold'>Username shouldn't content space.</span>";
				}else{
					if(strlen($_POST['password']) > 8 || strlen($_POST['confirm_password']) > 8){
					//preg_match('/^[a-zA-Z0-9]*([a-zA-Z][0-9]|[0-9][a-zA-Z])[a-zA-Z0-9]$/', $_POST['password'])
						if($_POST['password'] == $_POST['confirm_password']){
							if($_SESSION['captchacode'] == $_POST['captchacode']){

								$link = mysql_connect("localhost", "root", "");
								mysql_select_db("crud", $link);
								$sql = mysql_query("SELECT * FROM users WHERE username='$username' OR email='$email'");
								$result = mysql_fetch_assoc($sql);
								$row = mysql_num_rows($sql);
								if($row>0){
									$error = "<span style='color:red;font-weight:bold'>Username or Email already taken.</span>";
								}else{


									$name     = mysql_real_escape_string($_POST['name'], $link);
									$email    = mysql_real_escape_string($_POST['email'], $link);
									$username = mysql_real_escape_string($_POST['username'], $link);
									$token    = sha1($username);
									$date     = date('Y-m-d');
									$uniqId   = uniqid();

									$hass_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
									$sql = "INSERT INTO users (userId,name,username,email,password,user_role,token,active,created_at,updated_at,deleted_at) VALUES ('$uniqId','$name','$username','$email','$hass_password','1','$token','0','$date','','')";
									$result = mysql_query($sql);
									if($result){
										$path = realpath(__DIR__);
										$to = $email;
										$subject = 'Signup | Verification';
										$message = 
										'Thanks for signing up!
										Your account has been created, you can login with the following credentials after you have activated 
										your account by pressing the url below.
										Please click this link to activate your account:
										<a href="http://dreambd.net/$path/verify.php?email='.$email.'&token='.$token.'">Click For Varify</a>
										';
										mail($to,$subject,$message);
										$success = "<span style='color:green;font-weight:bold'>Please verify it by clicking the activation link that has been send to your email</span>";
									}else{
										$error = "<span style='color:red;font-weight:bold'>Insertion Failed.</span>";
									}
								}
							}else{
								$error = "<span style='color:red;font-weight:bold'>Capcha code dosen't match.</span>";
							}
						}else{
							$error = "<span style='color:red;font-weight:bold'>Password and conform password dosen't match.</span>";
						}					      		
					}else{
						$error = "<span style='color:red;font-weight:bold'>Password must be given 8 character.</span>";
					}
				}
        	}
		}
    }
?>
<?php 
include_once 'inc/admin/header.php';
?>
	<form action="" method="POST">
	<?php 
		if(isset($success)){ echo $success; }
		if(isset($error)){ echo $error; }
	 ?>
		<div class="form-group">
			<label for="name" class="control-label">Your Name</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
			</div>
		</div>

		<div class="form-group">
			<label for="email" class="control-label">Your Email</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
			</div>
		</div>

		<div class="form-group">
			<label for="username" class="control-label">Username</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
			</div>
		</div>

		<div class="form-group">
			<label for="password" class="control-label">Password</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
				<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
			</div>
		</div>

		<div class="form-group">
			<label for="confirm_password" class="control-label">Confirm Password</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
				<input type="password" class="form-control" name="confirm_password" id="confirm_password"  placeholder="Confirm your Password"/>
			</div>
		</div>

		<div class="form-group">			
			<label for="captchacode" class="control-label">Captcha</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user-secret" aria-hidden="true"></i></span>
				<input class="form-control" type="text" name="captchacode" id="captchacode" placeholder="Enter Code">
			</div>			
		</div>

		<div class="form-group">
			<img src="captcha.php" class="imgcaptcha"/>&nbsp;&nbsp;&nbsp;
			<img style="cursor: pointer;" src="img/refresh.png" alt="reload" class="refresh"/><br/>
		</div>

		<div class="form-group">
			<input type="submit" name="registation" value="Register" class="btn btn-primary btn-block login-button">
		</div>
		<div class="login-register">
			<span style="font-size: 13px; font-weight: bold;">Already you have an account</span>
	        <a style="font-size: 15px;font-weight: bold;" href="signin.php">Sign In</a> <br/>
	    </div>
	</form>
<?php include_once 'inc/admin/footer.php'; ?>