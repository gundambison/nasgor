<?php
$prefix="raja_";
$mysqli = new mysqli("localhost", "root", "", "work_hero");

	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

$siteUrl="";	
 
//===============
include($appFolder.'/lib/myFunc.php');
include($appFolder.'/lib/database.php'); 

include($appFolder.'/lib/session.php');  
include($appFolder.'/lib/login.php');  