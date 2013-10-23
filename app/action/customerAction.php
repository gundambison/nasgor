<?php
ob_start();
 print_r($_POST);
$act= myUri(2);

if($act=='new')
{
foreach($_POST as $n=>$v)$$n=@addslashes( $v );
	
	$phone=addslashes(json_encode($_POST['phone']));
	$det='';
	 
	$id=auto_id();
	$sql="insert into `{$prefix}customer` 
	(cus_id, cus_code,cus_name,cus_phone,cus_detail) 
	values
	('$id','$cus_code','$cus_name','$phone','$det');";
	echo $sql;
	if(!isset($err))
	{		
		$q=query($sql);
	}
	
	foreach($_POST['address'] as $v)
	{
		$id2=auto_id("{$prefix}customeraddress");
		$ar=array('cadr_id'=>$id2, 'cadr_cus'=>$id,'cadr_address'=>$v);
		dbInsert("{$prefix}customeraddress",$ar);
	} 
	
}

if($act=='update')
{
	foreach($_POST as $n=>$v)$$n=@addslashes( $v );
	//$err='not yet';
	$phone0=$_POST['phone'];$phone1=array();
	foreach($phone0 as $v)
	{
		trim($v)!=''?array_push($phone1,$v):'';
	}
	
	$phone=addslashes(json_encode($phone1));
	$sql="UPDATE   `{$prefix}customer` SET  `cus_name` =  '$cus_name',
`cus_phone` =  '$phone',
`cus_detail` =  '$detail' WHERE   `cus_id` =$cus_id;";
	 query($sql);
//============UPDATE ALAMAT
	foreach($_POST['cus_addr'] as $id2=>$v)
	{
		$v=addslashes($v);
		$sql="update `{$prefix}customeraddress` SET cadr_address ='$v'
		where cadr_id = $id2";
		$q=query($sql);
	}
	
//============TAMBAH ALAMAT
	foreach($_POST['addr'] as $v)
	{
		if(trim($v)!='')
		{
			$id2=auto_id("{$prefix}customeraddress");
			$ar=array('cadr_id'=>$id2, 'cadr_cus'=>$cus_id,'cadr_address'=>$v);
			dbInsert("{$prefix}customeraddress",$ar);	
		}
		
	} 
	
}


$post=ob_get_contents();	
ob_end_clean(); 
$a=array($post);
if(@isset($err)) $a['err']=$err;
echo json_encode($a);