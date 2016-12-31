<?php
	session_start();
	unset($_SESSION["Passed"]);
	unset($_SESSION["user"]);
	header("Location:../index.php");	
?>