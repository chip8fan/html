<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!is_dir($_SERVER["REMOTE_ADDR"])) {
	mkdir($_SERVER["REMOTE_ADDR"], 0777);
}
move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER["REMOTE_ADDR"] . "/" . $_FILES["file"]["name"]);
header("Location: " . $_SERVER["REMOTE_ADDR"]);
die();
?>
