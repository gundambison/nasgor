<?php
function checkLogin()
{
global $prefix;
	$user=sess_value($prefix.'username');
	$pass=sess_value($prefix.'password');
	if($user && $pass)
	{
		$sql="select * from {$prefix}user where user_name like '".addslashes($user)."'
		and user_password ='".addslashes($pass)."'";
		$q= query($sql);
		if( num_rows($q)!=0)
		{ 
			$row=fetch($q);
			$_SESSION[$prefix .'username'] = $row['user_name'];
			$_SESSION[$prefix .'userid'] = $row['user_id'];
			$_SESSION[$prefix .'password'] = $row['user_password'];
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}