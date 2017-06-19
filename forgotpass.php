<?php
	if(isset($_POST['resetpassword']) ){

		$error = '';
        $success = '';

		if(empty($_POST['email'])){
			$error = "<span style='color:red;font-weight:bold'>Email field can't be empty !</span>";
		}else{
        	$email  = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        	 	$error = "<span style='color:red;font-weight:bold'>Email address Invalid.</span>";
        	}else{
        		$link   = mysql_connect("localhost", "root", "");
                          mysql_select_db("crud", $link);
                $email  = mysql_real_escape_string($email, $link);
                $sql    = "SELECT * FROM users WHERE email='$email'";
			    $query  = mysql_query($sql, $link);
			    $result = mysql_fetch_assoc($query);
			    $row    = mysql_num_rows($query);
			    if($row > 0){

			    }
        	}
		}
	}
?>
<?php include_once 'inc/admin/header.php'; ?>

	<form class="form-horizontal" method="POST" action="">
		<div class="form-group">
			<label for="">Enter your email address for search</label>
			<?php 
	            if(isset($success)){echo $success;}
	            if(isset($error)){echo $error;}
	        ?>
	        <br/>
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