<?php
$prefix="raja_";
$mysqli = new mysqli("localhost", "root", "", "work_hero");

	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}