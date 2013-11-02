<?php
ob_start();
 
$act= myUri(2);

if($act=='new')
{
foreach($_POST as $n=>$v)$$n=@addslashes( $v );
	
	$phone=addslashes(json_encode($_POST['phone']));
	$det='';
	 
	$id=auto_id();
	 
	$ar=array(k_id=>$id, 'k_code'=>$k_code , 'k_name'=>$k_name , 'k_stat'=>$k_stat , 'k_price'=>$k_price , 'k_date'=>$k_date , 'k_source'=>$k_source ); 
	dbInsert("{$prefix}kurs",$ar);	 
	
}

if($act=='update')
{
	foreach($_POST as $n=>$v)$$n=@addslashes( $v );
	//$err='not yet'; 
	
	$phone=addslashes(json_encode($phone1));
	$sql="UPDATE   `{$prefix}kurs` SET  
 k_code ='".addslashes($k_code).",
 k_name ='".addslashes($k_name).",
 k_stat ='".addslashes($k_stat).",
 k_price ='".addslashes($k_price).",
 k_date ='".addslashes($k_date).",
 k_source ='".addslashes($k_source)."
WHERE   `k_id` =$k_id;";
	 query($sql); 
	
}

//==================OTHER ADD HERE===========

$post=ob_get_contents();	
ob_end_clean(); 
$a=array($post);
if(@isset($err)) $a['err']=$err;
echo json_encode($a);