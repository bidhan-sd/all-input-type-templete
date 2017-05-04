<?php include_once 'inc/admin/header.php'; ?>
	<form class="form-horizontal" method="post" action="#">
		<div class="form-group">
			<label for="email" class="control-label">Your Email</label>						
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
			</div>						
		</div>
		<div class="form-group">
			<label for="password" class="control-label">Password</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
				<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
			</div>
		</div>	
		<div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" name="remember" value="remember">Remember Me</label>
		</div>
		<div class="form-group ">
			<input class="btn btn-primary btn-lg btn-block login-button" type="submit" name="login" value="Login">
		</div>
		<div class="login-register">
			<a style="font-size: 15px;font-weight: bold;" href="signup.php">Create Account</a> <br/>
	        <a style="font-size: 15px;font-weight: bold;" href="forgotpass.php"> Forgot your password ? </a>
	     </div>
	</form>
<?php include_once 'inc/admin/footer.php'; ?>