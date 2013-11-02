<?php
if($_POST['username']&&$_POST['password'])
{
	foreach($_POST as $n=>$v)$$n=strip_tags(trim($v));
	$sql="select * from {$prefix}user where user_name like '%".addslashes($username)."%'
	and user_password = '".md5($password)."'";
	$q= query($sql);
	if( num_rows($q)!=0)
	{ 
		$row=fetch($q);
		$_SESSION[$prefix.'username'] = $row['user_name'];
		$_SESSION[$prefix.'userid'] = $row['user_id'];
		$_SESSION[$prefix.'password'] = md5($password);
		

		echo "ok";
	}else{
		echo "Tolong periksa kembali input anda";
	}
 
}else{
	

}
/*
CREATE TABLE IF NOT EXISTS `raja_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_realname` varchar(40) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
)
*/