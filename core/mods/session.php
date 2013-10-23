<?php
session_start();

function sess_value($nm)
{
	if(isset($_SESSION[$nm]))
	{	
		return $_SESSION[$nm];
	}else{
		return false;
	}
}

function sess_add($ar)
{
	foreach($ar as $nm=>$val)
	{
		$_SESSION[$nm]=trim($val);
		
	}
	
	return 1;

}

function sess_data()
{ 
	return $_SESSION;
	
}