<?php
	session_start();
	if(empty($_SESSION['userinfo'])){
        header ("Location: signin.php");
	}
	$userId = $_SESSION['userinfo']['userId'];

    if(isset($_GET['id']) && isset($_GET['userId'])){        
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        
        $userId = filter_var($_GET['userId'], FILTER_SANITIZE_STRING);//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
        $userId = mysql_real_escape_string($userId);
        $userId = htmlspecialchars($userId, ENT_IGNORE, 'utf-8');//The htmlspecialchars() function converts some predefined characters to HTML entities.
        $userId = strip_tags($userId);//The strip_tags() function strips a string from HTML, XML, and PHP tags.
        $userId = stripslashes($userId);//Remove the backslash:
    } 

    $link = mysql_connect("localhost", "root", "");
    mysql_select_db("crud", $link);
    $sql = "UPDATE `addstudent` SET `is_deleted`='0' WHERE id = '$id' AND userId='$userId' ";
    $query = mysql_query($sql, $link);
    $_SESSION['message'] = "<span style='color:green;font-weight:bold'> Data Restore Successfully</span> ";
    header("location: view.php");

?>