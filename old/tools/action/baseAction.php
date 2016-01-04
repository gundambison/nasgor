<?php
ob_start();
 
$act= myUri(2);

if($act=='new')
{
foreach($_POST as $n=>$v)$$n=@addslashes( $v );
	
	$phone=addslashes(json_encode($_POST['phone']));
	$det='';
	 
	$id=auto_id();
	 
	$ar=array(%tableinsert%); 
	dbInsert("{$prefix}%nama%",$ar);	 
	
}

if($act=='update')
{
	foreach($_POST as $n=>$v)$$n=@addslashes( $v );
	//$err='not yet'; 
	
	$phone=addslashes(json_encode($phone1));
	$sql="UPDATE   `{$prefix}%nama%` SET  %tableupdate%
WHERE   `%prefnama%_id` =$%prefnama%_id;";
	 query($sql); 
	
}

//==================OTHER ADD HERE===========

$post=ob_get_contents();	
ob_end_clean(); 
$a=array($post);
if(@isset($err)) $a['err']=$err;
echo json_encode($a);