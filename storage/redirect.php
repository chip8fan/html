<?php
	session_start();
	if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
		echo $_SESSION["username"];
		echo $_SESSION["password"];
	} else {
		header("Location: login.php");
	}
?>
