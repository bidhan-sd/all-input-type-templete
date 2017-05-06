<?php 
	session_start();
    if(isset($_POST['registation'])){
        $error = '';
        $success = '';
        if(isset($_POST['captchacode']) AND !empty($_POST['captchacode'])){
            if($_SESSION['captchacode'] == $_POST['captchacode']){
                $success = "<span style='color:green;font-weight:bold'>Your capcha is successfully processed...</span>";
            }else{
                $error = "<span style='color:red;font-weight:bold'>Sorry Incorrect captcha entered...</span>";
            }
        }else{
        	$error = "<span style='color:red;font-weight:bold'>You have not entered captcha...</span>";
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
			<label for="confirm" class="control-label">Confirm Password</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
				<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
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