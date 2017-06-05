<?php
session_start();
if (isset($_SESSION['userinfo'])) {
	session_destroy();
    unset($_SESSION['userinfo']);
    header('location: signin.php');
}