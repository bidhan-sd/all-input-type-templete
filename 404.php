<?php
	session_start();
	if(empty($_SESSION['userinfo'])){
        header ("Location: signin.php");
	}
?>
<?php include 'inc/header.php'; ?>
<style type="text/css">
	.wrapper{text-align: center;background: #ddd;}
	.wrapper p{font-size: 30px;color: red;font-weight: bold;line-height: 50px;padding-top: 20px;}
	.wrapper h1{font-size: 123px;font-weight: bold;margin-top: 20px;margin-bottom: 30px;}
	.wrapper button{border: none;background: red;width: 50px;height: 28px;margin-bottom: 20px;}
	.wrapper button a{color: #fff;font-weight: bold;text-decoration: none;}
	.four{color:#97BA16;}
</style>
	<div class="wrapper">
		<p>OOP! Couldn't find anythings</p>
		<h1><span class="four">4</span>0<span class="four">4</span></h1>
		<button><a href="view.php">Back</a></button>
	</div>
<?php include 'inc/footer.php'; ?>