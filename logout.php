<?php
	if(isset($_SESSION['username'])){
		unset($_SESSION['username']);
	}
	if(isset($_SESSION['password'])){
		unset($_SESSION['password']);
	}
	header('Location: admin.php?s='.urlencode("<b>You have successfully logged out!</b>")); exit;
?>
