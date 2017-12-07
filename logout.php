<?php
	session_start();
	session_destroy();
	unset($_SESSION['ACCESS_TYPE']);
	header("location: index.php");
?>