<?php
	$link=mysqli_connect("localhost","root","") or die("Cannot connect to the localhost");
	mysqli_select_db($link,"gaminggear") or die("Cannot connect to the database");
	mysqli_set_charset($link, "utf8");

?>
