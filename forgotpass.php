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
                $sql    = "SELECT * FROM users WHERE email='$email' LIMIT 1 ";
			    $query  = mysql_query($sql, $link);
			    if(mysql_num_rows($query) == 1){			    	
			    	$result = mysql_fetch_assoc($query);
			    	$userId = $result['userId'];
			    	$passwordToken = $result['passwordToken'];
					//To make user the email address is correct we will send email 			    	
					if($passwordToken != ""){
						$error = "<span style='color:red;font-weight:bold'>Please check your address we have already send you a password reset link !</span>";						
					}else{
						$randomCode = time().rand(50000,100000);
						$randomCode = str_shuffle($randomCode);
						$link   = mysql_connect("localhost", "root", "");
					    mysql_select_db("crud", $link);
					    $sql = "UPDATE `users` SET `passwordToken`='$randomCode' WHERE userId='$userId' ";
					    if(mysql_query($sql)){
					    	$to = $email;
					        $subject = "Reset | Password";
					        $txt = "Please click on the given link or copy url to reset your password
					        <a href='resetpassword.php?email=$email&userId=$userId&passwordtoken=$randomCode'>Click</a>";
					        $headers = "From: info@imbidhan.com" . "\r\n" .
					        "CC: somebodyelse@example.com";
					        /*$mail = mail($to,$subject,$txt,$headers);
					        if($mail){
							    $success = "<span style='color:green;font-weight:bold'>Please confirm your email to reset your password!</span>";
					        }*/
					        echo $txt;
					    }
					}			    	
			    }else{
			    	$error = "<span style='color:red;font-weight:bold'>Email address not exists !</span>";
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