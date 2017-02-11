<?php
	session_start();
	unset($_SESSION["Passed"]);
	unset($_SESSION["admin"]);
	unset($_SESSION["super"]);
	exit("<script>top.location.href='../../user/login.html'</script>");
?>