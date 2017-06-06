<?php 

	if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['token']) && !empty($_GET['token'])){
	    session_start();
	    // Verify data
	    mysql_connect("localhost", "dreambdn_bUsr", "vxFF%Izl63^#") or die(mysql_error());
	    mysql_select_db("dreambdn_bDB") or die(mysql_error());
	    
	    $email     = filter_var($_GET['email'], FILTER_SANITIZE_STRING);
	    $token     = filter_var($_GET['token'], FILTER_SANITIZE_STRING);
	    
	    $email = mysql_escape_string($_GET['email']);
	    $token = mysql_escape_string($_GET['token']);
	    
        $sql =  "SELECT email, token, active FROM users WHERE email='".$email."' AND token='".$token."'";
	    $search = mysql_query($sql) or die(mysql_error());
	    $result = mysql_fetch_assoc($search);
	    if($result['email'] === $email && $result['token'] === $token){
    	    if($result['email'] === $email && $result['token'] === $token && $result['active'] == 1){
    			$_SESSION['message'] = "<span style='color:red;font-weight:bold'>Account already activated!</span> ";
    		    header("location:signin.php");
    		}else{
    		    if($result['email'] === $email && $result['token'] === $token && $result['active'] == 0){
        		    mysql_query("UPDATE users SET active='1' WHERE email='".$email."' AND token='".$token."' AND active='0'") or die(mysql_error());
        			$_SESSION['message'] = "<span style='color:green;font-weight:bold'> Account activated !</span> ";
        			header("location:signin.php");
    		    }
    		}
	    }else{
    		$_SESSION['message'] = "<span style='color:red;font-weight:bold'>You given invlaid url!</span> ";
    	    header("location:signin.php");
	    }
	}else{
		session_start();
		header("Location: signup.php");
	}

?>