<?php 
	if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['token']) && !empty($_GET['token'])){
	    // Verify data
	    $email = mysql_escape_string($_GET['email']);
	    $token = mysql_escape_string($_GET['token']);
	    mysql_connect("localhost", "root", "") or die(mysql_error());
	    mysql_select_db("curd") or die(mysql_error());
	    $search = mysql_query("SELECT email, token, active FROM users WHERE email='".$email."' AND token='".$token."' AND active='0'") or die(mysql_error()); 
		$match  = mysql_num_rows($search);
		if($match > 0){
	    	mysql_query("UPDATE users SET active='1' WHERE email='".$email."' AND token='".$token."' AND active='0'") or die(mysql_error());
			$success = " <span style='color:green;font-weight:bold'>Your account has been activated, you can now login</span> ";
		}else{
		    $error = "<span style='color:red;font-weight:bold'>The url is either invalid or you already have activated your account.</span> ";
		}

	}else{
		session_start();
		header("Location: signup.php");
	}

?>