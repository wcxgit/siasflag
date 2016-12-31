<?php
	session_start();
	unset($_SESSION["Passed"]);
	unset($_SESSION["user"]);
	exit("<script>top.location.href='../../user/login.html'</script>");
?>