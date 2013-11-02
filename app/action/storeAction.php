<?php
ob_start();
print_r($_POST);
$act= myUri(2);

if($act=='new')
{
foreach($_POST as $n=>$v)$$n=@addslashes( $v );
	$det=addslashes(json_encode($_POST['det']));
	$sql="Insert into `{$prefix}store` (str_code,str_name,str_detail) values
	('$str_code','$str_name','$det');";
	echo $sql;
	$q=query($sql);
}

if($act=='update')
{	
	foreach($_POST as $n=>$v)$$n=@addslashes( $v );
	$det=addslashes(json_encode($_POST['det']));
	$sql="UPDATE   `{$prefix}store` SET  `str_name` =  '$str_name',
`str_detail` =  '$det'  WHERE  `str_id` ='$str_id';";
	echo $sql;
	$q=query($sql);
	

}

$post=ob_get_contents();	
ob_end_clean(); 
$a=array($post);
if(@isset($err)) $a['err']=$err;
echo json_encode($a);