<?php include_once 'inc/admin/header.php'; ?>
	<form class="form-horizontal" method="post" action="#">

		<div class="form-group">
			<label for="name" class="control-label">Your Name</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
			</div>
		</div>

		<div class="form-group">
			<label for="email" class="control-label">Your Email</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
			</div>
		</div>

		<div class="form-group">
			<label for="username" class="control-label">Username</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
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
			<label for="confirm" class="control-label">Confirm Password</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
				<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
			</div>
		</div>

		<div class="form-group">			
			<label for="captcha" class="control-label">Captcha</label>
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user-secret fa-lg" aria-hidden="true"></i></span>
				<input class="form-control" type="text" placeholder="Enter Code" id="captcha" name="captcha" class="inputcaptcha">				
			</div>
			
		</div>

		<div class="form-group">
			<img src="img/capcha.png" class="imgcaptcha" alt="captcha"/>
			<img src="img/refresh.png" alt="reload" class="refresh" />
		</div>

		<div class="form-group">
			<button type="button" class="btn btn-primary btn-lg btn-block login-button">Register</button>
		</div>
		<div class="login-register">
			<span style="font-size: 13px; font-weight: bold;">Already you have an account</span>
	        <a style="font-size: 15px;font-weight: bold;" href="signin.php">Sign In</a> <br/>
	    </div>
	</form>
<?php include_once 'inc/admin/footer.php'; ?>