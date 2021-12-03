<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['phone']);
	unset($_SESSION['fullname']);
	unset($_SESSION['uid']);
	unset($_SESSION['email']);
	header('Location: user_login.php?s='.urlencode("<b>You have successfully logged out!</b>")); exit;
?>
