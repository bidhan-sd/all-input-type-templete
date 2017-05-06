<!DOCTYPE html>
<html lang="en">
    <head> 
    	<title>imbidhan.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="inc/main.css">
		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
	    <script src="inc/jquery.min.js"></script>
	    <script language="javascript">
			$(document).ready(function(){
				$(".refresh").click(function () {
					$(".imgcaptcha").attr("src","captcha.php?_="+((new Date()).getTime())); 
				});
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Imbidhan.com</h1>
	               		<hr/>
	               	</div>
	            </div> 
				<div class="main-login main-center">