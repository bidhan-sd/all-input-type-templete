<?php include_once 'inc/admin/header.php'; ?>
	<form class="form-horizontal" method="post" action="#">
		<div class="form-group">
			<label for="">Enter your email address for search</label>
			<label for="email" class="control-label">Your Email</label>						
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
			</div>						
		</div>
		<div class="form-group ">
			<input class="btn btn-primary btn-block login-button" type="submit" name="resetpassword" value="Reset Password">
		</div>
		<div class="login-register">
            <a style="font-size: 15px;font-weight: bold;" href="signin.php"> Already have email and password ? </a>
         </div>
	</form>
<?php include_once 'inc/admin/footer.php'; ?>