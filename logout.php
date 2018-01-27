<?php
	session_start();
	session_destroy();
	unset($_SESSION['ACCESS_TYPE']);
	unset($_SESSION['LOGIN_ACCESS']);
	header("location: index.php");
?>