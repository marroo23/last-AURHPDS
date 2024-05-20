<?php
	@session_start();

	$conn = new mysqli("localhost", "root", "", "pms");
	if ($conn->connect_errno) {
		echo $conn->connect_error;
	}
?>